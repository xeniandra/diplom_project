<?php
    require_once "php\connection.php";
    if(isset($_POST['sendLogPass'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $queryUser = mysqli_query($link, "SELECT `id_user`, `login`, `password`, `fio` FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        $user = mysqli_num_rows($queryUser);
            if ($user == 1) 
            {
                session_start();
                $message = 0;
                $UserParameters = mysqli_fetch_assoc($queryUser);
                $_SESSION['login'] = $UserParameters['login'];
                $_SESSION['id_user'] = $UserParameters['id_user'];
                $_SESSION['fio'] = $UserParameters['fio'];
                header('Location: clients.php');
                exit();
            }
            else{
                $message = 1;
            }
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
    <title>Авторизация</title>
</head>
<body>
    <header>
        <div class="headerWrap">
            <div class="title">
                <img src="img\logo.png" alt="logo" class="logo">
                <h1 class="title">КлиентУчет</h1>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h3 class="enter">Вход в систему</h3>
            <form action="index.php" method="POST">
                <input type="text" class="log" name="login" placeholder="Введите логин..." required>
                <input type="password" class="log" name="password" placeholder="Введите пароль..." required>
                <input type="submit" value="Войти" name="sendLogPass">
            </form>
            <?php if($message == 1){?>
            <p class="error">Пользователя с такими данными не существует</p>
            <?}?>
        </div>
    </main>
    <footer>
        <p class="comp">&copy; Все права защищены OOO "Comp-City"</p>
    </footer>
</body>
</html>