<?php
	include_once "WriteFile.php";
	$up_time = date('Y_m_d_H_i_s',time());

	$path = "./mutiple_upload/".$up_time;

	if (!file_exists($path))
	{
		mkdir($path, 0777,true);
	}
	$len = count($_FILES["file"]["name"]);
	for($i=0;$i<$len;$i++)
	{
		$temp = explode(".", $_FILES["file"]["name"][$i]);
		$extension = end($temp);     // 获取文件后缀名
		if (($_FILES["file"]["size"][$i] < 20480000) && $_FILES["file"]["type"][$i] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
		{
			
			if ($_FILES["file"]["error"][$i] > 0)
			{
				LogFile($path."/log.txt", $_FILES["file"]["name"][$i]."======>".$_FILES["file"]["error"][$i]."\n");
				continue;
			}
			else
			{
				if (file_exists($path."/" . $_FILES["file"]["name"][$i]))
				{
					// 已经存在该文件
					include_once("change.php");
				}
				else
				{
					// 否则将文件从临时区移动到目录
					move_uploaded_file($_FILES["file"]["tmp_name"][$i], $path."/" . $_FILES["file"]["name"][$i]);
				}
				// 将文件进行转换并解压
				include_once "ToHtml.php";
				include_once "toxml.php";
				to_html($path."/", $_FILES["file"]["name"][$i]);
				// 解压路径需要添加文件名
				Unzip($path."/".$_FILES["file"]["name"][$i], $path."/".str_replace("docx", "", $_FILES["file"]["name"][$i]));
			}
		}
		else
		{
			LogFile($path."/log.txt", $_FILES["file"]["name"][$i]."======>"."the type of this file is unavalible."."\n");
			// 设置一个列表保存文件类型不对的文件
		}
	}
	// 全部转换解压完毕之后生成下载链接
	include_once "add_dir.php";
	$zip = new ZipArchive;
	$zip_filename = $path.".zip";
	$zip->open($zip_filename, ZIPARCHIVE::CREATE); // 打开压缩包,没有则创建
	addFileToZip($path, $zip);
	$zip->close();
	echo "http://just-do-it.vip/"."w2h".str_replace("./", "/", $zip_filename);
?>	