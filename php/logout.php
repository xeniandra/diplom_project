<?php
session_start();
unset($c_login);
unset($c_password);

unset($_SESSION['login']);
unset($_SESSION['role']);
unset($_SESSION['id_user']);
session_destroy();

header('Location: ../index.php');
exit();
?>