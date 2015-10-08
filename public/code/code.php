<?php
session_start();
$code = trim($_REQUEST['code']);
if($code==$_SESSION["helloweba_math"]){
   echo '1';
}
?>
