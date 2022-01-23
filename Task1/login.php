<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>#</title> 
<!-- <meta http-equiv="refresh" content="30"> 
 --><link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" media="screen" />
    <style type="text/css">
        body {
    background-color: #3B342D;
    color: #fff;
    font-family: 'Montserrat';
    }
    form {
        margin: auto auto;
        max-width: 400px;
        text-align: center;
    }

    #title-form {
        text-align: center;
        font-size: 24px;
    }
    input {
        font-family: 'Comfortaa', cursive;
        font-weight: 600;
        width: 70%;
        padding: 10px;
        margin: 15px 0;
        box-sizing: border-box;
        outline: none;
        transition: .2s;
    }

    input:focus {
        border-color: #877272;
        box-shadow: 0 0 20px rgba(128, 157, 255, 0.1);
    }

    .search_sub {
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        text-decoration: none;
        color: #000;
        width: 35%;
        padding: 10px;
        margin: 15px 0;
        background-color: #E1AD58;
        transition: .5s;
    }
    </style>
</head>
<body>

<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$connection = mysqli_connect('localhost', 'root', '', 'task3');
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($connection,"SELECT name, password, rules FROM users WHERE name='".mysqli_real_escape_string($connection,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['password'] === $_POST['password'])
    {
        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!!

        session_start();
		$_SESSION['name'] = $_POST['login'];
        $file_data = date('H:i:s j M Y'). " " . $_SESSION['name'] . " Авторизовался" ."\n";
        $file_data .= file_get_contents('authorization.txt');
        file_put_contents('authorization.txt', $file_data);

        // Переадресовываем браузер на страницу проверки нашего скрипта
        if($data['rules'] == "root"){
            header("Location: admintools.php"); exit();
        }
        else header("Location: index.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }

}
?>
<form method="POST" action="" class="entrance">
    <center>
        <h1>Добро пожаловать</h1>
        Логин <input class="full_inp" name="login" type="text" required><br>
        Пароль <input class="full_inp" name="password" type="password" required><br>
        <input class="search_sub" name="submit" type="submit" value="Войти">
    </center>
</form>
</body>
</html>