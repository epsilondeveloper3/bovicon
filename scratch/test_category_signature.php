<?php
$secret_key = "7442f649c48a20f98ce5273d091d6e7875f3c446e449460f7442f64";
$company_id = "dlvp";

// Step 1: Get Guest Token
$nonce = (string)rand(100000, 999999);
$sig = md5("undefined" . $secret_key . $nonce);
$guest_res = file_get_contents("https://apis.sovaaka.com/api/v1/auth/guest", false, stream_context_create([
    "http" => [
        "method" => "POST",
        "header" => "Origin: https://www.pathvets.in\r\n" .
                    "Referer: https://www.pathvets.in/\r\n" .
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n" .
                    "companyId: " . $company_id . "\r\n" .
                    "x-signature: " . $sig . "\r\n" .
                    "x-nonce: " . $nonce
    ]
]));
$guest_data = json_decode($guest_res, true);
$token = $guest_data['guestToken'] ?? '';

// Test Case 1: cityId as string "1"
echo "Testing cityId as string \"1\":\n";
test_category($token, $secret_key, $company_id, ["cityId" => "1"]);

// Test Case 2: cityId as integer 1
echo "\nTesting cityId as integer 1:\n";
test_category($token, $secret_key, $company_id, ["cityId" => 1]);

// Test Case 3: No parameters (does it work?)
echo "\nTesting no parameters:\n";
test_category($token, $secret_key, $company_id, []);

function test_category($token, $secret_key, $company_id, $params) {
    $url = "https://apis.sovaaka.com/api/v1/dlpl/wrapper/gateway/onexviewmstrs/v1/category/list";
    
    // Generate signature
    $params_str = "";
    if (!empty($params)) {
        ksort($params);
        $params_str = json_encode($params, JSON_UNESCAPED_SLASHES);
    }
    
    $nonce = (string)rand(100000, 999999);
    $signature_base = $token . $secret_key . $nonce . "" . $params_str;
    $sig = md5($signature_base);
    
    $query_url = $url;
    if (!empty($params)) {
        $query_url .= "?" . http_build_query($params);
    }
    
    $res = file_get_contents($query_url, false, stream_context_create([
        "http" => [
            "header" => "Origin: https://www.pathvets.in\r\n" .
                        "Referer: https://www.pathvets.in/\r\n" .
                        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\n" .
                        "companyId: " . $company_id . "\r\n" .
                        "data-area-id: " . $company_id . "\r\n" .
                        "x-auth-token: " . $token . "\r\n" .
                        "x-signature: " . $sig . "\r\n" .
                        "x-nonce: " . $nonce
        ]
    ]));
    
    echo "URL: $query_url\n";
    echo "Signature base: $signature_base\n";
    echo "Response: $res\n";
}
