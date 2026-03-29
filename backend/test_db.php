<?php
$db_file = __DIR__ . '/database.sqlite';
echo "File: $db_file\n";
try {
    $pdo = new PDO('sqlite:' . $db_file);
    echo "Connected successfully\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
