<?php
global $link;
include_once '../../db.php';
if ($_GET['del_user']){
    $id = $_GET['del_user'];
    $link->query("delete from users where id=$id");
    header('Location: /');

}