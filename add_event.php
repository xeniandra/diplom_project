<?php
    session_start();
    require_once "php\connection.php";
    require_once "php\check_session.php";
    $queryClients = mysqli_query($link, "SELECT `id_client`, `fio_client` FROM `clients`");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link type="image/x-icon" rel="shortcut icon" href="img\logo.png">
    <title>Добавление события</title>
</head>
<body>
    <header>z
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
            <a href="events.php" class="menu">СОБЫТИЯ</a>
        </nav>
        <div class="container">
            <h3 class="enter">Добавление события</h3>
            <form action="php\add_event.php" method="POST">
                <label for="type">Тип:</label>
                <select name="type" id="" class="log" required>
                    <option value="1" selected>Исходящий звонок</option>
                    <option value="2">Входящий звонок</option>
                    <option value="3">Email</option>
                    <option value="4">Заказ</option>
                    <option value="5">Задача</option>
                </select>
                <label for="theme">Тема:</label>
                <input type="text" class="log" name="theme" placeholder="Введите тему..." required>
                <label for="client">Клиент:</label>
                <select name="client" id="" class="log" required>
                    <?php
                    while($client = mysqli_fetch_assoc($queryClients)){
                        $id = $client['id_client'];
                        $fio = $client['fio_client'];
                        ?>
                        <option value="<?=$id?>"><?=$fio?></option>
                    <?}?>
                </select>
                <label for="begin-date">Дата:</label>
                <input type="date" class="log" name="date" placeholder="Введите дату..." required>
                <label for="priority">Приоритет:</label>
                <select name="priority" id="" class="log" required>
                    <option value="1" selected>Высокий</option>
                    <option value="2">Средний</option>
                    <option value="3">Низкий</option>
                </select>
                <label for="status">Статус:</label>
                <select name="status" id="" class="log" required>
                    <option value="1" selected>Запланировано</option>
                    <option value="2">Состоялось</option>
                    <option value="3">Не состоялось</option>
                </select>
                <input type="submit" value="Добавить">
            </form>
        </div>
    </main>
    <footer>
        <p class="comp">&copy; Все права защищены OOO "Comp-City"</p>
    </footer>
</body>
</html>