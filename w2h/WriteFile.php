<?php
    function LogFile($file_name, $content)
    {
        $myfile = fopen($file_name, "a");
        fwrite($myfile, $content);
        fclose($myfile);
    }
?>