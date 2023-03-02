<?php
	$fwb_id = $_REQUEST['fwb_id'];
	// echo $neirong;
	$id_name_info = array();
	// $fb_time = $_REQUEST['fb_time'];
	include "con_mysql.php";
	include_once "ReadFile.php";
	$arr = read_file("./LOGIN.txt");


	$conn = con_mysql($arr["IP"], $arr["USER"], $arr["PASS"], $arr["DATABASE"]);
	// $sel_sql = "SELECT activity_id, activity_name, activity_info FROM ACTIVITY_REPORT;";
	$up_sql = "DELETE FROM fwb WHERE fwb_id=$fwb_id;";
	// echo $up_sql;
	// $insert_sql = "INSERT INTO NOTICE (neirong, fb_time, location) VALUES ("."'".$neirong."', "."NOW(), "."'".$location."'".");";
	// $insert_sql = "INSERT INTO ACTIVITY_ADOPT (activity_id, absent_deduct_workhours, basic_workhours) VALUES ("."'".$activity_id."'".", (SELECT B1 FROM (SELECT basic_absent_deduct_workhours AS B1 FROM GLOBAL_INFO) AS B2), "."SELECT activity_duration FROM ACTIVITY_REPORT WHERE activity_id="."'".$activity_id."'".");";

	// echo $insert_sql;
	if ($conn->query($up_sql) === TRUE) 
	{
		$u_p = array();
		$u_p['info'] = '删除成功！';
		$id_name_info[] =  $u_p;	
	}
	else
	{
		$u_p = array();
		$u_p['info'] = '删除失败！';
		$id_name_info[] =  $u_p;
	}
	$conn->close();
	echo json_encode($id_name_info);
	
?>