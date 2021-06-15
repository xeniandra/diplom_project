<?php
    session_start();
    require_once "php\connection.php";
    require_once "php\check_session.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link type="image/x-icon" rel="shortcut icon" href="img\logo.png">
    <title>Добавление клиента</title>
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
            <a href="events.php" class="menu">СОБЫТИЯ</a>
        </nav>
        <div class="container">
            <h3 class="enter">Добавление клиента</h3>
            <form action="php\add_client.php" method="POST">
                <label for="fio">ФИО:</label>
                <input type="text" class="log" name="fio" placeholder="Введите ФИО..." required>
                <label for="phone">Телефон:</label>
                <input type="tel" class="log" name="phone" placeholder="Введите телефон..." required>
                <label for="email">Email:</label>
                <input type="email" class="log" name="email" placeholder="Введите Email..." required>
                <label for="address">Адрес:</label>
                <input type="text" class="log" name="address" placeholder="Введите адрес..." required>
                <label for="birthday">Дата рождения:</label>
                <input type="date" class="log" name="birthday" placeholder="Введите дату..." required>
                <label for="type-client">Тип:</label>
                <select name="typeClient" id="" class="log" required>
                    <option value="1" selected>Физическое лицо</option>
                    <option value="2">Юридическое лицо</option>
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