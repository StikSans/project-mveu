<?php
session_start();
$host = 'localhost';
$user_name = 'root';
$password = 'root';
$database = 'boda';

$link = mysqli_connect($host, $user_name, $password, $database);
