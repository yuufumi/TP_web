<?php
session_start();

if(isset($_SESSION["uname"])){
    session_destroy();
    header("Location: index.html");
}else{
    header("Location: login.php");
    
}
echo "dnia s3iba";
?>