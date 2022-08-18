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

echo "<p>";
$manager = new MongoDB\Driver\Manager("mongodb://admin:auth123@mongo50:27017");

// 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1, 'name'=>'测试1', 'title' => 'test1']);
$bulk->insert(['x' => 2, 'name'=>'测试2', 'title' => 'test2']);
$manager->executeBulkWrite('test.sites', $bulk);

$filter = ['x' => ['$gt' => 0]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);
foreach ($cursor as $document) {
    print_r($document);
}

echo "<p>";
$obj_cluster = new RedisCluster(NULL, ['redis-cluster:7001', 'redis-cluster:7002', 'redis-cluster:7003'], 1.5, 1.5, true, "auth123");
var_dump($obj_cluster);
$obj_cluster->set("aa", "1");
$obj_cluster->set("bb", "2");
$arr = [];
$arr[] = $obj_cluster->get("aa");
$arr[] = $obj_cluster->get("bb");
var_dump($arr);


