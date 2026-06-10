<?php
// PHP Script to generate credentials and scrape PathVets tests & categories

$secret_key = "7442f649c48a20f98ce5273d091d6e7875f3c446e449460f7442f64";
$company_id = "dlvp";
$data_area_id = "dlvp";

// Step 1: Get Guest Token using "undefined" coercion
echo "Fetching guest token...\n";
$guest_url = "https://apis.sovaaka.com/api/v1/auth/guest";
$nonce = (string)rand(100000, 999999);
$signature_base = "undefined" . $secret_key . $nonce; 
$signature = md5($signature_base);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $guest_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Origin: https://www.pathvets.in",
    "Referer: https://www.pathvets.in/",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
    "companyId: " . $company_id,
    "x-signature: " . $signature,
    "x-nonce: " . $nonce
]);

$guest_res = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200 || !$guest_res) {
    echo "Failed to get guest token. Code: $http_code. Response: $guest_res\n";
    exit;
}

$guest_data = json_decode($guest_res, true);
$guest_token = $guest_data['guestToken'] ?? '';
if (!$guest_token) {
    echo "Guest token not found in response: $guest_res\n";
    exit;
}
echo "Guest Token Obtained: $guest_token\n\n";

// Helper function to make signed API requests
function make_signed_get_request($url, $params, $token, $secret, $company, $data_area) {
    // Sort params and decode components
    $sorted_params = [];
    if (!empty($params)) {
        ksort($params);
        foreach ($params as $k => $v) {
            $sorted_params[$k] = (string)$v;
        }
    }
    $params_str = !empty($sorted_params) ? json_encode($sorted_params, JSON_UNESCAPED_SLASHES) : "";
    
    // Generate signature
    $nonce = (string)rand(100000, 999999);
    $signature_base = $token . $secret . $nonce . "" . $params_str; // empty body
    $signature = md5($signature_base);
    
    // Build query url
    $query_url = $url;
    if (!empty($params)) {
        $query_url .= "?" . http_build_query($params);
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $query_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Origin: https://www.pathvets.in",
        "Referer: https://www.pathvets.in/",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
        "companyId: " . $company,
        "data-area-id: " . $data_area,
        "x-auth-token: " . $token,
        "x-signature: " . $signature,
        "x-nonce: " . $nonce
    ]);
    
    $response = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return ['code' => $code, 'data' => json_decode($response, true), 'raw' => $response];
}

// Step 2: Fetch Categories
echo "Fetching categories...\n";
$cat_url = "https://apis.sovaaka.com/api/v1/dlpl/wrapper/gateway/onexviewmstrs/v1/category/list";
$cat_res = make_signed_get_request($cat_url, ["cityId" => "1"], $guest_token, $secret_key, $company_id, $data_area_id);
if ($cat_res['code'] !== 200) {
    echo "Failed to fetch categories. Code: " . $cat_res['code'] . "\nRaw: " . $cat_res['raw'] . "\n";
    exit;
}

$categories = $cat_res['data']['data']['Data']['data'] ?? [];
echo "Fetched " . count($categories) . " categories.\n\n";

// Step 3: Fetch Tests for each page (or all pages)
echo "Fetching tests...\n";
$test_url = "https://apis.sovaaka.com/api/v1/dlpl/wrapper/gateway/onexviewmstrs/v1/test/all";
$all_tests = [];
$page = 1;
$total_pages = 1;

do {
    echo "Fetching page $page...\n";
    $test_res = make_signed_get_request($test_url, [
        "page" => $page,
        "cityId" => "1",
        "mode_type" => 4
    ], $guest_token, $secret_key, $company_id, $data_area_id);
    
    if ($test_res['code'] !== 200) {
        echo "Failed to fetch tests page $page. Code: " . $test_res['code'] . "\nRaw: " . $test_res['raw'] . "\n";
        break;
    }
    
    $data_body = $test_res['data']['data']['Data'] ?? [];
    $total_pages = $data_body['total_pages'] ?? 1;
    $tests_on_page = $data_body['data'] ?? [];
    echo "Found " . count($tests_on_page) . " tests on page $page of $total_pages.\n";
    
    foreach ($tests_on_page as $t) {
        $all_tests[] = $t;
    }
    
    $page++;
} while ($page <= $total_pages);

echo "\nTotal tests fetched: " . count($all_tests) . "\n";

// Save results
$results = [
    'categories' => $categories,
    'tests' => $all_tests
];

file_put_contents("c:\\xampp\\htdocs\\bovicon\\scratch\\pathvets_data.json", json_encode($results, JSON_PRETTY_PRINT));
echo "Saved successfully to scratch/pathvets_data.json\n";
