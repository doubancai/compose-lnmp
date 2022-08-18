<?php
// phpinfo();

$dsn = 'mysql:host=mysql80;port=3306;charset=utf8;dbname=mysql';
$user = 'root';
$password = 'root';
$pdo = new PDO($dsn,$user,$password);
var_dump($pdo);

echo "<p>";
$redis = new Redis();
$redis->connect('redis62', 6379);
$redis->auth('auth123');
echo "Server is running: " . $redis->ping();

echo "<p>";
$redis = new Redis();
$redis->connect('redis70', 6379);
$redis->auth('auth123');
echo "Server is running: " . $redis->ping();

