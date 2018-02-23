
<?php

outPage();

//输出页面
function outPage() {
        echo '<Title>我的下载</Title>';
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>';
        echo '<body>';
        echo '  <script type="text/javascript">function dfs(){var url = document.getElementById("d_url").value; window.location.href = "down.php?" + url;}function del(x){window.location.href = "del.php?" + x;}</script>';
        echo '  <br>网址 <input type="text" id="d_url" style="width:400px"/> <input type="button" value="下载" onclick="dfs()" /><br><br>';
        $files = getFile(".");
        foreach ($files as $name){
                if($name=="")
                        continue;
                echo '<input type="button" value="DEL" onclick="del(\''.$name.'\')" /> <a href="http://kpli-kpli.193b.starter-ca-central-1.openshiftapps.com/down/'.$name.'">'.$name.'</a><br>';
        }
        echo '</body>';
}

//获取文件列表
function getFile($dir) {
    $fileArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
         $i=0;
         while ( false !== ($file = readdir ( $handle )) ) {
             //去掉"“.”、“..”以及带“.xxx”后缀的文件
             if ($file != "." && $file != ".."
                        && false === strpos($file,".php")
                        //&& false === strpos($file,".html")
                        && false === strpos($file,".py")
             ){
                 $fileArray[$i]=$file;
                       if($i==100){
                           break;
                 }
                 $i++;
             }
         }
         //关闭句柄
         closedir ( $handle );
    }
    return $fileArray;
}

?>
