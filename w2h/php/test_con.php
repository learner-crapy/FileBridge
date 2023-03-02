<?php
	include "con_mysql.php";
	include_once "ReadFile.php";
	$arr = read_file("./LOGIN.txt");


	$conn = con_mysql($arr["IP"], $arr["USER"], $arr["PASS"], $arr["DATABASE"]);
	$conn->close();
?>