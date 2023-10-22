<?php

$sname = "localhost:3307";
$uname= "root";
$pass = "";

$db_name= "test";

$conn=mysqli_connect($sname, $uname, $pass, $db_name);

if(!$conn){
    echo "Connection failed";
}else{

}

?>