<?php
global $link;
include_once '../../db.php';

if ($_POST['update_category']){
    if (empty($_POST['name'])) {
        $_SESSION['error'] = 'Ведите поле';
        header('Location: /edit/category?update_category='.$_GET['category_id']);
        die();
    };
}
$name = $_POST['name'];
$update_at = date('y-m-d, h:i:s');
$id = $_GET['category_id'];

$link->query("update categories set name='$name', update_at='$update_at' where id='$id'" );
header('Location: /edit/category?update_category='.$_GET['category_id']);