<?php
session_start(); // Starting the session

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are correct (you will need to implement your own validation here)
    $username = 'youcef'; // Replace with your actual admin username
    $password = 'youcef'; // Replace with your actual admin password

    if ($_POST['uname'] == $username && $_POST['pass'] == $password) {
        // Set session variables
        $_SESSION['uname'] = $username;
        // Redirect to the admin page or any other authenticated page
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <form action="" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET["error"])) { ?>
        <p class="error"> <?php echo $_GET["error"]; ?></p>
        <?php } ?>
        <label for="uname">User Name</label>
        <input type="text" name="uname" placeholder="Username">

        <label for="pass">Password</label>
        <input type="password" name="pass" placeholder="Password">

        <button type="submit">Login</button>
    </form>
    <?php
if (isset($error)) {
    echo $error;
}
?>

    </body>
</html>