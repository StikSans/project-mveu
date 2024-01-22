<?php
global $link;
include_once '../../db.php';
$error = [];


if($_POST['create_user']) {
    if (empty($_POST['login'])) errorReg('Ведите логин', $error);
    if (empty($_POST['name'])) errorReg('Ведите имя', $error);
    if (empty($_POST['sur_name'])) errorReg('Ведите фамилию ', $error);
    if (empty($_POST['sex'])) errorReg('Выберите пол', $error);
    if (empty($_POST['pass'])) errorReg('Ведите пароль', $error);
    if ($_POST['pass'] != $_POST['rpass']) errorReg('Пароль не верный', $error);

    $login = $_POST['login'];
    $bd_login = $link->query("select id from users where login='$login'")->fetch_row();

    if($bd_login) errorReg('Такая почта уже зарегистрирована', $error);
    if ($error){
        header('Location: /');
        die();
    }
}

$login = $_POST['login'];
$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$sex = $_POST['sex'];
$pass = $_POST['pass'];

$link
    ->query("insert into users (login, name, sur_name, sex, password) values ('$login', '$name', '$sur_name', '$sex', '$pass')");

header('Location: /');
die();

function errorReg($text, &$error): void
{
    $error[] = $text;
    $_SESSION['error'] = $error;
}