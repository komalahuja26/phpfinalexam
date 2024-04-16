<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Game...</title>
</head>
<body>
<?php
require 'include/auth.php';

$gameId = $_GET['gameId'];

if (is_numeric($gameId)) {
    require 'include/db.php';

    $sql = "DELETE FROM examgames WHERE gameId = :gameId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':gameId', $gameId, PDO::PARAM_INT);
    $cmd->execute();

    $db = null;
}

header('location:games.php');
?>
</body>
</html>
