<?php
// backend/db.php
$db_file = __DIR__ . '/database.json';

// Initialize the flat-file JSON database if it doesn't exist
if (!file_exists($db_file)) {
    file_put_contents($db_file, json_encode([]));
}

function get_all_leads() {
    global $db_file;
    $data = file_get_contents($db_file);
    $leads = json_decode($data, true) ?? [];
    // Sort descending by created_at (newest first)
    return array_reverse($leads);
}

function insert_lead($lead) {
    global $db_file;
    $data = file_get_contents($db_file);
    $leads = json_decode($data, true) ?? [];
    
    $lead['id'] = count($leads) + 1;
    $lead['created_at'] = date('Y-m-d H:i:s');
    
    $leads[] = $lead;
    return file_put_contents($db_file, json_encode($leads, JSON_PRETTY_PRINT));
}
?>
