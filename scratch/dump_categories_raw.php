<?php
$secret_key = "7442f649c48a20f98ce5273d091d6e7875f3c446e449460f7442f64";
$company_id = "dlvp";

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

// Try fetching with cityId = 1, 2, 3 etc. Let's see raw response of city list or category list
// Let's first fetch city list to see valid cities!
// We saw: CITY_LIST: "/dlpl/wrapper/gateway/onexviewmstrs/v1/city/list"
$city_url = "https://apis.sovaaka.com/api/v1/dlpl/wrapper/gateway/onexviewmstrs/v1/city/list";
$nonce = (string)rand(100000, 999999);
$sig = md5($token . $secret_key . $nonce);
$city_res = file_get_contents($city_url, false, stream_context_create([
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
echo "City List Response:\n" . $city_res . "\n\n";
