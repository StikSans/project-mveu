<?php
global $link;
include_once '../../db.php';
if ($_GET['del_category']){
    $id = $_GET['del_category'];
    $link->query("delete from categories where id=$id");
    header('Location: /category');

}