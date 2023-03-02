<?php
	$sip_info = array();

    include "con_mysql.php";
	include_once "ReadFile.php";
	$arr = read_file("./LOGIN.txt");

	$conn = con_mysql($arr["IP"], $arr["USER"], $arr["PASS"], $arr["DATABASE"]);
    // $sql = "SELECT spbh, num, je FROM chuhuodanzi;";
	
	// $sel_sql_smp = "SELECT activity_id, activity_unit, activity_name, activity_time, activity_location, activity_duration, activity_info, yigong_obj, image FROM ACTIVITY_REPORT, YIGONGZHAN WHERE activity_id IN (SELECT activity_id FROM ACTIVITY_ADOPT) AND activity_unit=yigongzhan;";
    // $sel_sql_smp = "SELECT fwb_info FROM ACTIVITY_REPORT WHERE fwb_id=$fwb_id";
	$sel_sql_smp = "SELECT fwb_id, fwb_time, title FROM fwb;";
	// echo $sel_sql_smp;
	$result = $conn->query($sel_sql_smp);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) // 将表中的数据都取出来
		{
			$u_p = array();
			$u_p['fwb_id'] = $row['fwb_id'];
			// $u_p['neirong'] = $row['neirong'];
			$u_p['fwb_time'] = $row['fwb_time'];
			$u_p['title'] = $row['title'];
			$sip_info[] =  $u_p;
		}
	}
	$conn->close();
	echo json_encode($sip_info);
?>
