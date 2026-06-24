<?php
$key = "epsilon_e9f521c77ce6264955981baff758e9ca";
$api_url = "https://whatsapp.epsilon-technology.com/api/external/send-message";

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

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "x-api-key: " . $key
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err = curl_error($ch);
curl_close($ch);

echo "HTTP Code: $http_code\n";
echo "Error: $err\n";
echo "Response: $response\n";
