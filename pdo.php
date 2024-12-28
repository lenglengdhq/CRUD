<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "mysql";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // 设置 PDO 错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "连接成功";
} catch(PDOException $e) {
    echo "连接失败: " . $e->getMessage();
}
?>



