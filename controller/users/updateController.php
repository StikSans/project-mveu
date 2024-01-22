<?php
global $link;
include_once '../../db.php';
$error = [];


if($_POST['edit_user']) {
    if (empty($_POST['login'])) errorReg('Ведите логин', $error);
    if (empty($_POST['name'])) errorReg('Ведите имя', $error);
    if (empty($_POST['sur_name'])) errorReg('Ведите фамилию ', $error);
    if (empty($_POST['sex'])) errorReg('Выберите пол', $error);
    if ($error){
        header('Location: /edit/user?edit_user_id='.$_GET['edit_user_id']);
        die();
    }
}
$user_id = $_GET['edit_user_id'];
$login = $_POST['login'];
$name = $_POST['name'];
$sur_name = $_POST['sur_name'];
$sex = $_POST['sex'];
$update_at = date('y-m-d, h:i:s');

$link->query("update users set login='$login', name='$name', sur_name='$sur_name', sex='$sex', update_at='$update_at' where id='$user_id'");

header('Location: /edit/user?edit_user_id='.$_GET['edit_user_id']);
die();

function errorReg($text, &$error): void
{
    $error[] = $text;
    $_SESSION['error'] = $error;
}
