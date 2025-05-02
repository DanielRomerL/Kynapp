<?php

$data = json_decode(file_get_contents("php://input"), true);
$prompt = isset($data['message']) ? $data['message'] : '';

if (empty($prompt)) {
    echo json_encode(['response' => 'No se ha recibido un prompt.']);
    exit();
}

$request_data = [
    "model" => "gpt-4o-mini", 
    "messages" => [
        ["role" => "user", "content" => $prompt]
    ]
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\n" .
                    "Authorization: Bearer $api_key\r\n",
        "method" => "POST",
        "content" => json_encode($request_data)
    ]
];

$context = stream_context_create($options);
$response = file_get_contents("https://api.openai.com/v1/chat/completions", false, $context);

if ($response === FALSE) {
    echo json_encode(['response' => 'Error al obtener respuesta de la IA.']);
} else {
    $response_data = json_decode($response, true);
    $ai_response = $response_data['choices'][0]['message']['content'];
    echo json_encode(['response' => $ai_response]);
}

?>
