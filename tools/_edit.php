<?php
require_once "./_dbconection.php";

$_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$edit = $pdo->prepare("UPDATE todo SET done = :done WHERE id = :id ");
$id = $_GET['id'] ?? '';

$todo = $pdo->prepare("SELECT * FROM todo WHERE id = :id");
$todo->bindValue(':id', $id);
$todo->execute();
$result = $todo->fetch();
if($result['done'] == 1){
    $newDone = 0;

}else{
    $newDone =1;
}

if($id){ 
    $edit->bindValue(':id', $id);
    $edit->bindValue(':done', $newDone);
    $edit->execute();

}

header('Location: /');