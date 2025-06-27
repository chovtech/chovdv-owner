<?php

function sendWhatsAppMsg($payload, $key) {
    $json = json_encode($payload);
    $url = "https://wamator.com/api/messages";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'x-api-key: ' . $key,
        'Content-Length: ' . strlen($json)
    ]);

    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    // Prepare log content
    $log = [
        'timestamp' => date("Y-m-d H:i:s"),
        'http_code' => $http_code,
        'curl_error' => $curl_error,
        'payload' => $payload,
        'response' => $result
    ];

    // Append to log file
    file_put_contents('whatsapp_log.json', json_encode($log, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);

    return $result;
}
