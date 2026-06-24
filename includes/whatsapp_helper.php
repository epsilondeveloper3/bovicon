<?php
/**
 * WhatsApp Business API Helper for BOVICAN Website Inquiries
 * Uses Epsilon Technology WhatsApp Cloud API
 */

if (!function_exists('send_whatsapp_inquiry')) {
    /**
     * Sends a WhatsApp template message (contact_form) to the configured admin phone number.
     * 
     * @param string $name Name of the customer ({{1}})
     * @param string $city City of the customer ({{2}})
     * @param string $phone Customer's contact phone number ({{3}})
     * @param string $doctor_name Reference doctor's name ({{4}})
     * @param string $detail Additional detail / message ({{5}})
     * @return array Results of the API calls per recipient number
     */
    function send_whatsapp_inquiry($name, $city, $phone, $doctor_name, $detail) {
        $api_url = "https://whatsapp.epsilon-technology.com/api/external/send-message";
        $api_key = "epsilon_7d3a86d88c9feede7651f07b620cb1a1";
        $template_name = "contact_form";
        
        // Recipient WhatsApp numbers (with country code, without '+' prefix)
        // Default to the Bovican contact number
        $recipient_numbers = ["919638159696"];

        // Clean and prepare parameter values (must not be empty strings)
        $name = trim($name) !== '' ? trim($name) : 'N/A';
        $city = trim($city) !== '' ? trim($city) : 'N/A';
        $phone = trim($phone) !== '' ? trim($phone) : 'N/A';
        $doctor_name = trim($doctor_name) !== '' ? trim($doctor_name) : 'N/A';
        $detail = trim($detail) !== '' ? trim($detail) : 'N/A';

        $results = [];

        foreach ($recipient_numbers as $to) {
            $payload = [
                "messaging_product" => "whatsapp",
                "to" => $to,
                "type" => "template",
                "template" => [
                    "name" => $template_name,
                    "language" => [
                        "code" => "en_US"
                    ],
                    "components" => [
                        [
                            "type" => "body",
                            "parameters" => [
                                ["type" => "text", "text" => $name],
                                ["type" => "text", "text" => $city],
                                ["type" => "text", "text" => $phone],
                                ["type" => "text", "text" => $doctor_name],
                                ["type" => "text", "text" => $detail]
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
            curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 seconds timeout so we don't hang the request
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
                "x-api-key: " . $api_key
            ]);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $err = curl_error($ch);
            curl_close($ch);

            if ($err) {
                error_log("BOVICAN WhatsApp Error for recipient $to: " . $err);
                $results[$to] = ['success' => false, 'error' => $err];
            } else {
                $resp_decoded = json_decode($response, true);
                if ($http_code === 200 || $http_code === 201) {
                    $results[$to] = ['success' => true, 'response' => $resp_decoded];
                } else {
                    error_log("BOVICAN WhatsApp failure for recipient $to: HTTP Code $http_code. Response: $response");
                    $results[$to] = ['success' => false, 'code' => $http_code, 'response' => $response];
                }
            }
        }

        return $results;
    }
}
