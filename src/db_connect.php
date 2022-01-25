<?php
// echo phpinfo();

$dsn = 'mysql:host=db;dbname=quizy;charset=utf8mb4;';
$user = 'kashiken';
$password = 'password';

try {
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo '接続成功';
} catch (PDOException $e) {
  echo '接続失敗: ' . $e->getMessage();
  exit();
}