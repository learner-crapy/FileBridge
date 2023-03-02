<?php
	$neirong = $_REQUEST['neirong'];
	$title = $_REQUEST['title'];
	// echo $neirong;
	$id_name_info = array();
	// $fb_time = $_REQUEST['fb_time'];
	include "con_mysql.php";
	include_once "ReadFile.php";
	$arr = read_file("./LOGIN.txt");


	$conn = con_mysql($arr["IP"], $arr["USER"], $arr["PASS"], $arr["DATABASE"]);
	// $sel_sql = "SELECT activity_id, activity_name, activity_info FROM ACTIVITY_REPORT;";
	// $up_sql = "INSERT fwb (neirong="."'".$neirong."'"." fwb_time="."'".$fwb_time."'".";";
	// echo $up_sql;
	$up_sql = "INSERT INTO fwb (neirong, title, fwb_time) VALUES ("."'".$neirong."', "."'".$title."', "."NOW());";
	// $insert_sql = "INSERT INTO ACTIVITY_ADOPT (activity_id, absent_deduct_workhours, basic_workhours) VALUES ("."'".$activity_id."'".", (SELECT B1 FROM (SELECT basic_absent_deduct_workhours AS B1 FROM GLOBAL_INFO) AS B2), "."SELECT activity_duration FROM ACTIVITY_REPORT WHERE activity_id="."'".$activity_id."'".");";

	// echo $insert_sql;
	if ($conn->query($up_sql) === TRUE) 
	{
		$u_p = array();
		$u_p['info'] = '提交成功！';
		$id_name_info[] =  $u_p;	
		
	}
	else
	{
		$u_p = array();
		$u_p['info'] = '提交失败！';
		$id_name_info[] =  $u_p;
	}
	$conn->close();
	echo json_encode($id_name_info);
	
?>