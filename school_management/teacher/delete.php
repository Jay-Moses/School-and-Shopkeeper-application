<?php
include '../config/database.php';

if (!isset($_GET['id'])) {
    header('Location: list.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM teachers WHERE id = ?');
$stmt->execute([$id]);

header('Location: list.php');  
?>
