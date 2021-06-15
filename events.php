<?php
    session_start();
    require_once "php\connection.php";
    require_once "php\check_session.php";
    $queryEvents = mysqli_query($link, "SELECT `id_event`, `type_event`, `theme_event`, `date_event`,`priority_event`, `status_event`, `id_client` FROM `events` ORDER BY `date_event` DESC");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link type="image/x-icon" rel="shortcut icon" href="img\logo.png">
    <title>События</title>
</head>
<body>
    <header>
        <div class="title">
            <img src="img\logo.png" alt="logo" class="logo">
            <h1 class="title">КлиентУчет</h1>
        </div>
        <div class="name-out">
        <p class="name">Здравствуйте, <?=$_SESSION['fio']?></p>
            <a href="php\logout.php" class="out">Выход</a>
        </div>
    </header>
    <main>
        <nav>
            <a href="clients.php" class="menu">КЛИЕНТЫ</a>
            <a href="add_event.php" class="menu">ДОБАВИТЬ СОБЫТИЕ</a>
        </nav>
        <div class="clients">
            <table class="clients">
                <tr><th>ID</th><th>Тип</th><th>Тема</th><th>Клиент</th><th>Дата</th><th>Приоритет</th><th>Статус</th></tr>
                <?php
                while($events = mysqli_fetch_assoc($queryEvents)){
                    $idEvent = $events['id_event'];
                    $typeEvent = $events['type_event'];
                        if ($typeEvent == 1){
                            $typeEvent = "Исходящий звонок";
                        } elseif ($typeEvent == 2) {
                            $typeEvent = "Входящий звонок";
                        } elseif ($typeEvent == 3) {
                            $typeEvent = "Email";
                        } elseif ($typeEvent == 4) {
                            $typeEvent = "Заказ";
                        } elseif ($typeEvent == 5) {
                            $typeEvent = "Задача";
                        }
                    $date = $events['date_event'];
                    $timestamp = strtotime($date);
                    $dateEvent = date('d/m/Y', $timestamp);
                    $themeEvent = $events['theme_event'];
                    $priorityEvent = $events['priority_event'];
                    if ($priorityEvent == 1){
                        $priorityEvent = "Высокий";
                    } elseif ($priorityEvent == 2) {
                        $priorityEvent = "Средний";
                    } elseif ($priorityEvent == 3) {
                        $priorityEvent = "Низкий";
                    }
                    $statusEvent = $events['status_event'];
                    if ($statusEvent == 1){
                        $statusEvent = "Запланировано";
                    } elseif ($statusEvent == 2) {
                        $statusEvent = "Состоялось";
                    } elseif ($statusEvent == 3) {
                        $statusEvent = "Не состоялось";
                    }
                    $idClient = $events['id_client'];
                    $queryClient = mysqli_query($link, "SELECT `fio_client` FROM `clients` WHERE `id_client` = $idClient");
                    $Client = mysqli_fetch_assoc($queryClient);
                    $fioClient = $Client['fio_client'];
                ?>
                <tr><td><?=$idEvent?></td><td><?=$typeEvent?></td><td><?=$themeEvent?></td><td><a href="card_client.php?id=<?=$idClient?>" class="fio"><?=$fioClient?></a></td><td><?=$dateEvent?></td><td><?=$priorityEvent?></td><td><?=$statusEvent?></td></tr>
                <? } ?>
               </table>
        </div>
    </main>
<?php
    if(mysqli_num_rows($queryEvents) <= 5){
?>
        <footer class = "fix">
<?}else{?>
        <footer>
<?}?>
        <p class="comp">&copy; Все права защищены OOO "Comp-City"</p>
        </footer>

</body>
</html>