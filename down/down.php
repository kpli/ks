
<?php
$str_query = $_SERVER["QUERY_STRING"];
downLoads($str_query);

function downLoads($d_url) {
        $url = trim($d_url);
        if(!empty($url)){
                $a = array();
                $cmds = '';
                if( false === strpos($url, 'youtube.com'))
                        $cmds = 'wget '.$url;
                else
                        $cmds = 'python ./youtube-dl.py --id  '.$url;
                echo $cmds.'<br>';
                exec($cmds, $a);
                foreach( $a as $k){
                        echo $k.'<br>';
                }
        }
}


echo '<script type="text/javascript">window.location.href = "files.php";</script>';

?>

