<?php
include_once __DIR__ . '/../admin/include/config.php';

if (!$con) {
    echo "Database connection failed.\n";
    exit;
}

// Add city column if it doesn't exist
$resCity = mysqli_query($con, "SHOW COLUMNS FROM inquiries LIKE 'city'");
if (mysqli_num_rows($resCity) == 0) {
    $alterCity = mysqli_query($con, "ALTER TABLE inquiries ADD COLUMN city VARCHAR(255) DEFAULT NULL AFTER email");
    if ($alterCity) {
        echo "Column 'city' added successfully.\n";
    } else {
        echo "Failed to add column 'city': " . mysqli_error($con) . "\n";
    }
} else {
    echo "Column 'city' already exists.\n";
}

// Add doctor_name column if it doesn't exist
$resDoc = mysqli_query($con, "SHOW COLUMNS FROM inquiries LIKE 'doctor_name'");
if (mysqli_num_rows($resDoc) == 0) {
    $alterDoc = mysqli_query($con, "ALTER TABLE inquiries ADD COLUMN doctor_name VARCHAR(255) DEFAULT NULL AFTER city");
    if ($alterDoc) {
        echo "Column 'doctor_name' added successfully.\n";
    } else {
        echo "Failed to add column 'doctor_name': " . mysqli_error($con) . "\n";
    }
} else {
    echo "Column 'doctor_name' already exists.\n";
}
?>
