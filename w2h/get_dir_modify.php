<?php
    /**
     * 获取文件夹并按时间排序
     * @param string $dir 文件夹路径
     * @param int $sort 排序方式
     * @return array
     */
    function getDirSort($dir,$sort=SORT_DESC)
    {
        $dir_time = array();
        $dir .= substr($dir, -1) == '/' ? '' : '/';
        $dirList = $timeArr = array();
        // foreach (glob($dir.'*',GLOB_ONLYDIR) as $v) 
        // {
        //     // $getfilemtime = date("Y-m-d H:i:s",filemtime($v));//获取文件夹最近修改日期
        //     // $getfilemtime = filemtime($v);//获取文件夹最近修改日期
        //     // echo $getfilemtime;
        //     /*
        //     $files['file'] = iconv('gbk','utf-8',$v);//获取文件夹名称
        //     $files['time'] = $getfilemtime;
        //     $dirList[] = $files;
        //     */
        //     // $dirList[] = iconv('gbk','utf-8',$v);//获取文件夹名称
        //     $dirList[] = mb_convert_encoding($v, 'gbk','utf-8');
        //     $timeArr[] = $getfilemtime;
        // }
        // 


        //获取某目录下所有文件、目录名（不包括子目录下文件、目录名）
        $handler = opendir($dir);
        while (($filename = readdir($handler)) !== false ) {//务必使用!==，防止目录下出现类似文件名“0”等情况
            // echo is_file($dir.$filename);
            if (($filename != ".") && ($filename != "..") && (is_file($dir.$filename))) {
                $getfilemtime = date("Y-m-d H:i:s",filemtime($dir.$filename));//获取文件夹最近修改日期
                $dirList[] = $dir.$filename;
                $timeArr[] = $getfilemtime;
            }
        }

        for ($i=0;$i<count($dirList);$i++)
        {
            $u_p = array();
            $u_p["time"] = $timeArr[$i];
            $u_p["dir"] = $dirList[$i];
            $dir_time[] = $u_p;
        }
        // if (!empty($dirList))
        // {
        //     array_multisort($timeArr,$sort,SORT_STRING, $dirList);//按时间排序
        //     //array_multisort($file,$sort,SORT_STRING, $arr);//按名字排序
        //     //array_multisort($size,$sort,SORT_NUMERIC, $arr);//按大小排序
        // }
        return $dir_time;

        
    }

    // getDirSort("./upload/");
?>
