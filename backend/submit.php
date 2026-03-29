<?php
header("Content-Type: application/json");
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $lead = [
        'name' => htmlspecialchars(strip_tags($_POST['name'] ?? '')),
        'phone' => htmlspecialchars(strip_tags($_POST['phone'] ?? '')),
        'email' => filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL),
        'company' => htmlspecialchars(strip_tags($_POST['company'] ?? '')),
        'budget' => htmlspecialchars(strip_tags($_POST['budget'] ?? '')),
        'timeline' => htmlspecialchars(strip_tags($_POST['timeline'] ?? '')),
        'needs' => htmlspecialchars(strip_tags($_POST['needs'] ?? '')),
        'business' => htmlspecialchars(strip_tags($_POST['business'] ?? '')),
        'details' => htmlspecialchars(strip_tags($_POST['details'] ?? ''))
    ];

    if (empty($lead['name']) || empty($lead['phone']) || empty($lead['email'])) {
        echo json_encode(["status" => "error", "message" => "Name, Phone, and Email are securely required fields."]);
        exit;
    }

    if (insert_lead($lead)) {
        echo json_encode(["status" => "success", "message" => "Quote Requested! ✓"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save lead."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
