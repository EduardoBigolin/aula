<?php

$password = $_POST['pass'] ?? false;

if($password){
    echo password_hash($password, PASSWORD_BCRYPT);
}

?>

<form action="<?= $_SERVER['PHP_SELF'];?> " method="POST">
    <input type="password" name="pass">
    <button>Criptografar</button>
</form>