<?php
session_start();

$user = 'root';
$password = 'root';
$db = 'onlineeditor';
$host = 'localhost';
$port = 8889;

$conn = new mysqli($host,$user,$password,$db);

?>