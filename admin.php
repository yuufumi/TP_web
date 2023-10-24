<?php
session_start(); // Starting the session

// Check if the user is logged in as an administrator
if (!isset($_SESSION['uname']) || $_SESSION['uname'] !== 'youcef') {
    header("location: login_page.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparateur de smartphones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery.js"></script>
</head>
<body >

        <h1>Page Admin</h1>
        <table id="my_table" border>
            <thead>
                <tr id="phones" class="phones">
                    <th>Features</th>
                    <?php
                        include("db_conn.php");
                        $sql="SELECT * FROM smartphone";
                        $smartphones=mysqli_query($conn,$sql);
                        while($row = $smartphones->fetch_assoc()) {
                            echo "<th >" . $row["Name_smartphone"]. "</th>"; 
                        }
                        echo "</tr></thead><tbody>";
                $sql= "SELECT * FROM `features`";
                $features = mysqli_query($conn,$sql);
                $i = 0;

                while($feature = $features->fetch_assoc()) {
                    if($i % 2){
                        $color = "second_color";
                    }else{
                        $color = "first_color";
                    }
                    echo "<tr class=".$color."><th id=Features>" . $feature["Name_Features"]. "</th>";
                    $sql= "SELECT smartphone_features.Value_Smartphone_Features, smartphone_features.Id_Smartphone
                    FROM `smartphone_features` WHERE smartphone_features.Id_Features=".$feature["Id_Features"]." ";
                    $values=mysqli_query($conn,$sql);
                    while($value = $values->fetch_assoc()) {
                        $sql="SELECT * FROM smartphone";
                        $smartphones=mysqli_query($conn,$sql);
                        while($row = $smartphones->fetch_assoc()) {
                            if($value["Id_Smartphone"] === $row["Id_smartphone"]){
                                echo "<td>" . $value["Value_Smartphone_Features"] . "</td>";   
                            }
                        }
                
                    }
                    echo "</tr>";
                $i++;
                }
            ?>                
            </tbody>
        </table>
        <div class="Forms">

            <form id="feature_form" action="add_feature.php" method="POST">
            <label for='feature'>Feature name: </label>
            <input type='text' id="feature" class='from_control' name="feature">
            <?php
            include("db_conn.php");
            $sql="SELECT * FROM smartphone";
            $features=mysqli_query($conn,$sql);
            while($row = $features->fetch_assoc()) {
                echo "<label for=''>".$row["Name_smartphone"].": </label>
                <input type='text' id=phone" . $row["Id_smartphone"] . " class='from_control' name=". $row["Id_smartphone"] .">";
            }
            
            ?>
            <button  type="submit" value="Add" onclick="getFeatureData()" class="from_control" >Ajouter</button>
            </form>
            <form id="phone_form" action="add_phone.php" method="POST">
                <label for="Phone">Phone name: </label>
                <input type="text" id="Phone" name="Phone" class="from_control">
            <?php
            include("db_conn.php");
            $sql="SELECT * FROM features";
            $features=mysqli_query($conn,$sql);
            while($row = $features->fetch_assoc()) {
                echo "<label for='feature'>".$row["Name_Features"].": </label>
                <input type='text' id=" . $row["Name_Features"] . " class='from_control' name=". $row["Name_Features"] .">";
            }
            
            ?>
                <button type="submit" class="from_control" >Ajouter</button>
            </form>
        </div>
        <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="logout"></button>
        </form>
</body>
</html>