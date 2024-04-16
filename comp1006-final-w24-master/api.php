<?php
header('Content-Type: application/json');
require 'include/db.php';

$stmt = $pdo->query("SELECT * FROM exampublishers");
$publishers = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($publishers);
?>