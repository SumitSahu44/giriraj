<?php
// Allow CORS and accept JSON input
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

// Get the JSON POST data
$data = json_decode(file_get_contents("php://input"), true);

$to = $data['to'] ?? '';
$subject = $data['subject'] ?? '';
$body = $data['body'] ?? '';

if (!$to || !$subject || !$body) {
    http_response_code(400);
    echo json_encode(["message" => "Missing required fields"]);
    exit;
}

// Additional headers
$headers = "From: sumitkumarsahu141@gmail.com\r\n";
$headers .= "Reply-To: sumitkumarsahu141@gmail.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo json_encode(["message" => "Email sent successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Email failed to send"]);
}
?>
