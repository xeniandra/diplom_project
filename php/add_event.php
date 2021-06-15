<?php
    session_start();
    require_once "connection.php";
    require_once "check_session.php";
    $type = $_POST['type'];
    $theme = $_POST['theme'];
    $client = $_POST['client'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $insertEvent = mysqli_query($link, "INSERT INTO `events` (`id_event`, `type_event`, `theme_event`, `date_event`, `priority_event`, `status_event`, `id_client`) VALUES (NULL, '$type', '$theme', '$date', '$priority', '$status', '$client');");
    mysqli_close($link);
    header('Location: ../events.php');
?>