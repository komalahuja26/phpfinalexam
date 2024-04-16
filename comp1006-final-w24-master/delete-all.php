
<?php
session_start();
require 'include/auth.php';
require 'include/db.php';
$pdo = $_SESSION['username'];
if (!empty($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Assuming PDO connection is $pdo
$pdo->exec("DELETE FROM examgames");
header('Location: games.php');
exit();
?>