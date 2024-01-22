<?php
global $link;
include_once '../../db.php';

if ($_POST['create_category']){
    if (empty($_POST['name'])) {
        $_SESSION['error'] = 'Ведите поле';
        header('Location: /category');
        die();
    };
}
$name = $_POST['name'];
$link->query("insert into categories (name) values ('$name')");
header('Location: /category');
