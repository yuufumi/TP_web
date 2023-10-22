<?php
include("db_conn.php");
if(isset($_POST['uname']) && isset($_POST['pass'])){
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);
    if (empty($uname)) {
        header("Location: login_page.php?error=User name is required");
        exit();
    }else if (empty($pass)){
        header("Location: login_page.php?error=Password is required");
        exit();
    }else {
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn,$sql); 
        if(mysqli_num_rows($result) > 0){
        header("Location: logged.php");
        exit();
        }else{
            header("Location: login_page.php?error=You're not an admin");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}


?>