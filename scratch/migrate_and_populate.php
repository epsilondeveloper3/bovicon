<?php
// PHP Script to migrate tests table and populate it with scraped PathVets data

include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

echo "Altering tests table schema...\n";

// Add categories column if it doesn't exist
$check_cat = mysqli_query($con, "SHOW COLUMNS FROM tests LIKE 'categories'");
if (mysqli_num_rows($check_cat) == 0) {
    $alter1 = mysqli_query($con, "ALTER TABLE tests ADD COLUMN categories VARCHAR(255) DEFAULT 'General'");
    if ($alter1) {
        echo "Added 'categories' column successfully.\n";
    } else {
        echo "Failed to add 'categories' column: " . mysqli_error($con) . "\n";
    }
} else {
    echo "'categories' column already exists.\n";
}

// Add test_code column if it doesn't exist
$check_code = mysqli_query($con, "SHOW COLUMNS FROM tests LIKE 'test_code'");
if (mysqli_num_rows($check_code) == 0) {
    $alter2 = mysqli_query($con, "ALTER TABLE tests ADD COLUMN test_code VARCHAR(50) UNIQUE DEFAULT NULL");
    if ($alter2) {
        echo "Added 'test_code' column successfully.\n";
    } else {
        echo "Failed to add 'test_code' column: " . mysqli_error($con) . "\n";
    }
} else {
    echo "'test_code' column already exists.\n";
}

// Read JSON data
$json_path = __DIR__ . '/pathvets_data.json';
if (!file_exists($json_path)) {
    echo "JSON file not found at $json_path. Please run scraper script first.\n";
    exit;
}

$data = json_decode(file_get_contents($json_path), true);
$categories = $data['categories'] ?? [];
$tests = $data['tests'] ?? [];

echo "Found " . count($categories) . " categories and " . count($tests) . " tests in JSON.\n";

// Clear existing tests to avoid confusion
mysqli_query($con, "TRUNCATE TABLE tests");
echo "Cleared existing tests table.\n";

$inserted = 0;
$visited_codes = [];

foreach ($tests as $t) {
    $test_code = mysqli_real_escape_string($con, $t['itemid']);
    
    // Skip duplicates
    if (in_array($test_code, $visited_codes)) {
        continue;
    }
    $visited_codes[] = $test_code;
    
    $name = mysqli_real_escape_string($con, $t['itemname']);
    $price = floatval($t['price']);
    
    // Find categories this test belongs to
    $matched_cats = [];
    foreach ($categories as $cat) {
        if (in_array($t['itemid'], $cat['item_ids'])) {
            $matched_cats[] = $cat['name'];
        }
    }
    
    // If no category matched, assign to "General"
    if (empty($matched_cats)) {
        $matched_cats[] = "General";
    }
    $categories_str = mysqli_real_escape_string($con, implode(", ", $matched_cats));
    
    // Process parameters
    $analytes = [];
    if (!empty($t['parameters_analyte'])) {
        foreach ($t['parameters_analyte'] as $a) {
            $analytes[] = trim($a['analyte_name']);
        }
    }
    $parameter_count = count($analytes);
    if ($parameter_count == 0) {
        $parameter_count = 1;
        $analytes[] = $t['itemname']; // Fallback
    }
    $parameters_str = mysqli_real_escape_string($con, implode("\n", $analytes));
    
    $preparation = "No special preparation required";
    $frequency = "Daily";
    
    $query = "INSERT INTO tests (name, preparation, frequency, parameter_count, parameters, price, categories, test_code) 
              VALUES ('$name', '$preparation', '$frequency', $parameter_count, '$parameters_str', $price, '$categories_str', '$test_code')";
              
    if (mysqli_query($con, $query)) {
        $inserted++;
    } else {
        echo "Failed to insert test $name: " . mysqli_error($con) . "\n";
    }
}

echo "Successfully inserted $inserted unique tests into database.\n";
