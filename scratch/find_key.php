<?php
/**
 * Fuzz test Epsilon API keys based on visual ambiguities in the screenshot.
 */

// Key pattern: epsilon_<32 hex chars>
// Base prefix: epsilon_7d3a86
// Visually ambiguous segments:
// 1. After epsilon_7d3a86, we see: d88c9f or d88a9f or d8809f or d88d9f etc.
// 2. feede7651
// 3. f07b62 or 407b62 or 107b62
// 4. 0cb1a1 or dcba1 or 0cba1 or dcb1a1 or 0cb7a1 etc.

$part1 = "7d3a86";
$mid_choices = ["d88c9f", "d8809f", "d88a9f", "d88d9f", "d80c9f", "d889f", "d88cf"];
$part3 = "feede7651";
$part4_choices = ["f07b62", "407b62", "107b62"];
$part5_choices = ["0cb1a1", "dcba1", "0cba1", "dcb1a1", "0cb7a1", "0cbfa1", "0cb141", "0cb171"];

$candidates = [];

foreach ($mid_choices as $mid) {
    foreach ($part4_choices as $p4) {
        foreach ($part5_choices as $p5) {
            $hex = $part1 . $mid . $part3 . $p4 . $p5;
            // Clean up if length is not 32 (hex keys are typically 32 chars)
            if (strlen($hex) === 32) {
                $candidates[] = "epsilon_" . $hex;
            }
        }
    }
}

echo "Generated " . count($candidates) . " candidate API keys.\n";

$api_url = "https://whatsapp.epsilon-technology.com/api/external/send-message";

// Payload
$payload = [
    "messaging_product" => "whatsapp",
    "to" => "919638249696",
    "type" => "template",
    "template" => [
        "name" => "contact_form",
        "language" => ["code" => "en_US"],
        "components" => [
            [
                "type" => "body",
                "parameters" => [
                    ["type" => "text", "text" => "Test"],
                    ["type" => "text", "text" => "Test"],
                    ["type" => "text", "text" => "Test"],
                    ["type" => "text", "text" => "Test"],
                    ["type" => "text", "text" => "Test"]
                ]
            ]
        ]
    ]
];
$json_payload = json_encode($payload);

foreach ($candidates as $index => $key) {
    echo "Trying candidate " . ($index + 1) . "/" . count($candidates) . ": $key ... ";
    
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "x-api-key: " . $key
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code !== 403 || strpos($response, "Invalid API Key") === false) {
        echo "\nSUCCESS!!! Found key: $key\n";
        echo "HTTP Code: $http_code\n";
        echo "Response: $response\n";
        exit;
    } else {
        echo "Invalid\n";
    }
}

echo "Done. No valid key found.\n";
