
<?php
$str_query = $_SERVER["QUERY_STRING"];

delete($str_query);

function delete($d_name) {
        $file = trim($d_name);
        if(!empty($file)){
                $a = array();
                $cmds = 'rm '.$file;
                echo $cmds.'<br>';
                exec($cmds, $a);
                foreach( $a as $k){
                        echo $k.'<br>';
                }
        }
}

echo '<script type="text/javascript">window.location.href = "files.php";</script>';

?>
