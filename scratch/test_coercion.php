<?php
$secret_key = "7442f649c48a20f98ce5273d091d6e7875f3c446e449460f7442f64";
$company_id = "dlvp";

$nonces = [(string)rand(100000, 999999), (string)rand(100000, 999999)];

// Test case 1: Empty string
$sig1 = md5($secret_key . $nonces[0]);
// Test case 2: "undefined" literal (due to JS undefined + string)
$sig2 = md5("undefined" . $secret_key . $nonces[1]);

echo "Testing signature 1 (empty string): \n";
test_signature($sig1, $nonces[0], $company_id);

echo "\nTesting signature 2 ('undefined' literal): \n";
test_signature($sig2, $nonces[1], $company_id);

function test_signature($sig, $nonce, $company_id) {
    $guest_url = "https://apis.sovaaka.com/api/v1/auth/guest";
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
        "x-signature: " . $sig,
        "x-nonce: " . $nonce
    ]);

    $guest_res = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "HTTP Code: $http_code\n";
    echo "Response: $guest_res\n";
}
