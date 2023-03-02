<?php
// 允许上传的图片后缀
$allowedExts = array("doc", "docx");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
//echo $_FILES["file"]["type"];
//echo $_FILES["file"]["size"];
if (($_FILES["file"]["size"] < 20480000) && $_FILES["file"]["type"] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "</br>";
	}
	else
	{
		// echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		// echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		// echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		if (file_exists("./upload/" . $_FILES["file"]["name"]))
		{
			// echo $_FILES["file"]["name"] . " 文件已经存在。 ";
			$status=unlink("./upload/" . $_FILES["file"]["name"]);
			move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . $_FILES["file"]["name"]);
		}
		else
		{
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . $_FILES["file"]["name"]);
			// echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
		}
		include_once("change.php");
		try
		{
			$zip_filename = Change("./upload/", $_FILES["file"]["name"]);
			echo "https://just-do-it.vip/w2h/upload/".$zip_filename;
		}
		catch(Exception $e)
		{
			echo "解压异常";
		}
	}
}
else
{
	//echo $_FILES["file"]["type"];
	echo "文件类型不符或与word2007不兼容。";
}
?>
