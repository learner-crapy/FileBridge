<?php
    $fwb_id = $_REQUEST['fwb_id'];
    $url = "https://just-do-it.vip/w2h/rich_show.html?fwb_id=".$fwb_id;
    echo $url;
    $html_content = file_get_contents($url);
    $fp = fopen("../HtmlDownload/rich_show.html","a");
    flock($fp, LOCK_EX) ;
    fwrite($fp,$html_content);
    flock($fp, LOCK_UN);
    fclose($fp);
?>