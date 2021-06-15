<?php
    session_start();
    require_once "connection.php";
    require_once "check_session.php";
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $typeClient = $_POST['typeClient'];
    $insertClient = mysqli_query($link, "INSERT INTO `clients` (`id_client`, `fio_client`, `phone`, `email`, `address`, `birthday`, `type`) VALUES (NULL, '$fio', '$phone', '$email', '$address ', '$birthday', '$typeClient');") or die("Ошибка " . mysqli_error($link));
    mysqli_close($link);
    header('Location: ../clients.php');
?>