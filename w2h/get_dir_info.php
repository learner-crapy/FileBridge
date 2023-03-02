<?php
    $dir_type = $_REQUEST['dir_type'];
    $dir = "";
    if ($dir_type == '0')
    {
        $dir = "./upload/";
    }
    else
    {
        $dir = "./mutiple_upload/";
    }
    include_once "get_dir_modify.php";
    $result = getDirSort($dir);
    echo json_encode($result);

?>