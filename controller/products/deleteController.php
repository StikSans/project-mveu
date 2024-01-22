<?php
global $link;
include_once '../../db.php';
if ($_GET['del_product']){
    $id = $_GET['del_product'];
    $link->query("delete from products where id=$id");
    header('Location: /product');

}