<?php
function read_file($file_path)
{
	if ( file_exists ( $file_path )){
		$json = file_get_contents ( $file_path ); //将整个文件内容读入到一个字符串中
		$arr = (array) json_decode($json,true);
		return $arr;
	}
}

// read_file("./LOGIN.txt");

?>