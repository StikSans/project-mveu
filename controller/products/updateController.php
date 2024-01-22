<?php
global $link;
include_once "../../db.php";
$error = [];

if ($_POST['update_product']){
    if (empty($_POST['title'])) errorProduct($error, 'Ведите название товара');
    if (empty($_POST['price'])) errorProduct($error, 'Ведите стоимость товара');
    if ($_POST['category_id'] == 'base') errorProduct($error, 'Выберите категорию');
    if ($error) {
        header('Location: /edit/product?update_product='.$_GET['update_product']);
        die();
    }
}

$title = $_POST['title'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$update_at = date('y-m-d, h:i:s');
$id = $_GET['update_product'];

$link->query("update products set title='$title', price='$price', category_id='$category_id', update_at='$update_at' where id=$id");
header('Location: /edit/product?update_product='.$_GET['update_product']);

function ErrorProduct(&$error, $text)
{
    $error[] = $text;
    $_SESSION['error'] = $error;
}