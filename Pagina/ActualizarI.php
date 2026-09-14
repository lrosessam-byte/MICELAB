<?php
$hostAc = 'localhost';
$dbAc   = 'Inventariomp';
$userAc = 'root';
$passAc = '';
$charsetAc = 'utf8mb4';

$dsn = "mysql:host=$hostAc;dbname=$dbAc;charset=$charsetAc";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $userAc, $passAc, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>