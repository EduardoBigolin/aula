<?php
require("./pdo.inc.php");
$user = $_POST['user'];
$password = $_POST['password'];

$userQuery = $conect->prepare('SELECT * FROM users WHERE username = ? AND senha = ?');
$userQuery->bindParam(1, $user);
$userQuery->bindParam(2, $password);

$userQuery->execute();

if ($userQuery->rowCount() != 1) {
    header("location: signIn.php?erro=1");
    die;
}
$userData = $userQuery->fetch(PDO::FETCH_OBJ);
session_start();
$_SESSION['auth'] = $userData['name'];
header('location: welcome.php');
die;