<?php
    session_start();
    require_once "php\connection.php";
    require_once "php\check_session.php";
    if (empty($_GET['id'])) {
        header('Location: clients.php');
    }
    $getIdClient = $_GET['id'];
    $queryClient = mysqli_query($link, "SELECT `id_client`, `fio_client`, `phone`, `email`, `address`, `birthday`, `type` FROM `clients` WHERE `id_client` = $getIdClient");
    $client = mysqli_fetch_assoc($queryClient);
    $fio = $client['fio_client'];
    $phone = $client['phone'];
    $email = $client['email'];
    $address = $client['address'];
    $birthday = $client['birthday'];
    $timestamp = strtotime($birthday);
    $birthday = date('d.m.Y', $timestamp);
    $type = $client['type'];
    if($type == 1){
        $type = "Физическое лицо";
    }
    elseif ($type == 2) {
        $type = "Юридическое лицо";
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link type="image/x-icon" rel="shortcut icon" href="img\logo.png">
    <title>Карточка клиента</title>
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
            <h3 class="enter">Карточка клиента</h3>
            <div class="param">
                <div class="parameters">
                    <p class="param">ID:</p>
                    <p class="param">ФИО:</p>
                    <p class="param">Телефон:</p>
                    <p class="param">Email:</p>
                    <p class="param">Адрес:</p>
                    <p class="param">Дата рождения:</p>
                    <p class="param">Тип:</p>
                </div>
                <div class="in-parameters">
                    <p class="in"><?=$getIdClient?></p>
                    <p class="in"><?=$fio?></p>
                    <p class="in"><?=$phone?></p>
                    <p class="in"><?=$email?></p>
                    <p class="in"><?=$address?></p>
                    <p class="in"><?=$birthday?></p>
                    <p class="in"><?=$type?></p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p class="comp">&copy; Все права защищены OOO "Comp-City"</p>
    </footer>
</body>
</html>