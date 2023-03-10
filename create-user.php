<?php
require('pdo.inc.php');
$name = $_POST['name'] ?? false;
$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;
$isAdmin = $_POST['isAdmin'] ?? false ;
$userName = $_POST['userName'] ?? false;

$password_hash = password_hash($password, PASSWORD_BCRYPT);

if($isAdmin == 'on'){
    $isAdmin = 1;
}

$sql = $conect->prepare('INSERT INTO users (name, email, username, senha, admin) VALUES (:name,:email,:username,:password, :isAdmin)');
$sql->bindParam(':name', $name);
$sql->bindParam(':email', $email);
$sql->bindParam(':password', $password_hash);
$sql->bindParam(':username', $userName);
$sql->bindParam(':isAdmin', $isAdmin);

$sql->execute();