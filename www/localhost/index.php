<?php
// phpinfo();

$dsn = 'mysql:host=mysql80;port=3306;charset=utf8;dbname=mysql';
$user = 'root';
$password = 'root';
$pdo = new PDO($dsn,$user,$password);
var_dump($pdo);
