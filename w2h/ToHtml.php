<?php
    function to_html($dir_1, $file_name)
    {
        require 'vendor/autoload.php';
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load('./upload/'.$file_name);
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($dir_1.$file_name);
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, "HTML");
        $new_name = "";
        if (substr($file_name,-3) == "doc")
        {
            $new_name = str_replace(".doc", ".html", $file_name);
        }
        else
        {
            $new_name = str_replace(".docx", ".html", $file_name);
        }
        // $xmlWriter ->save('./upload/'.$new_name);
        $xmlWriter ->save($dir_1.$new_name);
    }
    ?>