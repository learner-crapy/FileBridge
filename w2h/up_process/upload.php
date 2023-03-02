<?php
if(isset($_FILES['demo'])){
$tmp=explode(".",$_FILES['demo']['name']);
$suffix_name = end($tmp);
$name = time().".".$suffix_name;
$path = __DIR__."\\".$name;
move_uploaded_file($_FILES['demo']['tmp_name'],$path);
echo "upload success";
}else{
echo "error";
}