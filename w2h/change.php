<?php 
    include_once "add_dir.php";
    include_once "toxml.php";
    function Change($dir_1, $file_name)
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

        $zip = new ZipArchive;
        // 解压文件
        $dir = str_replace('.html', '', $new_name);
        Unzip($dir_1.$file_name, $dir_1.$dir);
        $zip_time = $new_name.".zip"; // 压缩的目录名
        // $zip_filename = "./upload/".$zip_time; // 指定一个压缩包地址
        $zip_filename = $dir_1.$zip_time; // 指定一个压缩包地址
    
        $zip->open($zip_filename, ZIPARCHIVE::CREATE); // 打开压缩包,没有则创建
        
        // 参数1是要压缩的文件,参数2为压缩后,在压缩包中的文件名「这里我们把 demo1.php 文件压缩,压缩后的文件为 dd.php」,如果需要的压缩后的文件跟原文件名一样 addFile() 的第二个参数可以改为 basename("../alg/demo1.php"),也就是原文件所在的路径
        // $zip->addFile("./upload/".$new_name, basename("./upload/".$new_name));
        //    	addFileToZip('./upload/'.$dir, $zip);
        $zip->addFile($dir_1.$new_name, basename($dir_1.$new_name));
            addFileToZip($dir_1.$dir, $zip);
            $rs = $zip->close();
            var_dump($rs);
            return $zip_time;
    }
?>
