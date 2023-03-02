<?php
function con_mysql($servername, $username, $password, $dbname)
{
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    else{
        return $conn;
    }
}
// con_mysql("localhost", "root_0", "", "supermarket");
?>