<?php
global $link;
include_once "../../db.php";

$error = [];

if ($_POST['create_product']){
    if (empty($_POST['title'])) errorProduct($error, 'Ведите название товара');
    if (empty($_POST['price'])) errorProduct($error, 'Ведите стоимость товара');
    if ($_POST['category_id'] == 'base') errorProduct($error, 'Выберите категорию');
    if ($error) {
        header('Location: /product');
        die();
    }
}
$title = $_POST['title'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$link->query("insert into products (title, price, category_id) values ('$title', '$price', '$category_id')");
header('Location: /product');

function errorProduct(&$error, $text)
{
    $error[] = $text;
    $_SESSION['error'] = $error;
}