<?php
    session_start();
    require_once "php\connection.php";
    require_once "php\check_session.php";
    if(isset($_POST['searchButton'])){
        $search = $_POST['search'];
        $queryClients = mysqli_query($link, "SELECT `id_client`, `fio_client`, `phone`, `email`, `address`, `birthday`, `type` FROM `clients` WHERE concat(`fio_client`, `phone`) LIKE '%$search%'");
    }
    else{
        $queryClients = mysqli_query($link, "SELECT `id_client`, `fio_client`, `phone`, `email`, `address`, `birthday`, `type` FROM `clients`");
    }
    if(mysqli_num_rows($queryClients) <= 0){
        $noResults = 1;
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
    <title>Клиенты</title>
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
            <div class="search search-change">
                <form action="clients.php" method="POST" class="search">
                <input type="text" name="search" class="input-search out" placeholder="Введите клиента..." required>
                <button type="submit" class="search" name="searchButton">Найти</button>
            </form>
            </div>
            <a href="add_client.php" class="menu">ДОБАВИТЬ КЛИЕНТА</a>
            <a href="events.php" class="menu">СОБЫТИЯ</a>
        </nav>
        <div class="clients">
            <table class="clients">
                <tr><th>ID</th><th>ФИО</th><th>Телефон</th><th>Email</th><th>Адрес</th></tr>
                <?php
                while($clients = mysqli_fetch_assoc($queryClients)){
                    $idClient = $clients['id_client'];
                    $fio = $clients['fio_client'];
                    $phone = $clients['phone'];
                    $email = $clients['email'];
                    $address = $clients['address'];
                ?>
                <tr><td><?=$idClient?></td><td><a href="card_client.php?id=<?=$idClient?>" class="fio"><?=$fio?></a></td><td><?=$phone?></td><td><?=$email?></td><td><?=$address?></td></tr>
                <?}?>
               </table>
               <?if($noResults == 1) {?>
               <div class="noResults">
               <p class="nothing">Ничего не найдено, попробуйте еще раз</p>
               <a href="clients.php" class="allClients">Вернуться к списку клиентов</a>

               </div>
               <? } ?>
        </div>
    </main>
    <?php
    if(mysqli_num_rows($queryClients) <= 6){
    ?>
    <footer class = "fix">
    <?}else{?>
        <footer>
    <?}?>
    <p class="comp">&copy; Все права защищены OOO "Comp-City"</p>
    </footer>

</body>
</html>