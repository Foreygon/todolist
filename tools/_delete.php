<?php 
require_once "./_dbconection.php";

$_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$delete = $pdo->prepare("DELETE FROM todo WHERE id = :id ");
$id = $_GET['id'] ?? '';
if($id){ 
    $delete->bindValue(':id', $id);
    $delete->execute();
}

header('Location: /');