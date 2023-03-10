<?php
require('pdo.inc.php');
$user = $_POST['user'];
$password = $_POST['password'];

$userQuery = $conect->prepare('SELECT * FROM users WHERE username = :user');

$userQuery->bindParam(':user', $user);

$userQuery->execute();

if ($userQuery->rowcount()) {
    $userData = $userQuery->fetch(PDO::FETCH_OBJ);
    if (!password_verify($password, $userData->senha)) {
        header("location: signIn.php?erro=2");
        die;
    }
    session_start();
    $_SESSION['auth'] = $userData->name;
    header('location: welcome.php');
    die;
} else {
    header("location: signIn.php?erro=1");
    die;
}