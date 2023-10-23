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
                        $sql="SELECT smartphone.Name_smartphone FROM smartphone";
                        $smartphones=mysqli_query($conn,$sql);
                        while($row = $smartphones->fetch_assoc()) {
                            echo "<th >" . $row["Name_smartphone"]. "</th>"; 
                        }
                    ?>
                </tr>    
            </thead>
            <tbody> 
            <?php
                include("db_conn.php");
                $sql= "SELECT smartphone.Name_smartphone, features.Name_Features, smartphone_features.Value_Smartphone_Features
                FROM `smartphone_features`
                JOIN smartphone ON smartphone_features.Id_Smartphone=smartphone.Id_smartphone
                JOIN features ON smartphone_features.Id_Features=features.Id_Features";
                
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
                    $sql= "SELECT smartphone_features.Value_Smartphone_Features
                    FROM `smartphone_features` WHERE smartphone_features.Id_Features=".$feature["Id_Features"]." ";
                    $values=mysqli_query($conn,$sql);
                    while($value = $values->fetch_assoc()) {
                        echo "<td>" . $value["Value_Smartphone_Features"] . "</td>";    
                    }
                    echo "</tr>";
                    $i++;
                }
            ?>


                
            </tbody>
        </table>


        <div class="Forms">
            <form id="feature_form" action="add_feature.php" method="POST">
                <label for="feature">Feature name: </label>
                <input type="text" id="feature" class="from_control" name="feature">

                <label for="phone1">Xiaomi redmi Note 12: </label>
                <input type="text" id="phone1" class="from_control" name="phone1">
                
                <label for="phone2">Apple iPhone 15 plus: </label>
                <input type="text" id="phone2" class="from_control" name="phone2">
                
                <label for="phone3">Samsung Galaxy S21 Ultra: </label>
                <input type="text" id="phone3" class="from_control" name="phone3">
            
                <label for="phone4">Huawei p30 pro: </label>
                <input type="text" id="phone4" class="from_control" name="phone4">
            
                <button  type="submit" value="Add" onclick="getFeatureData()" class="from_control" >Ajouter</button>
            </form>

            <form id="phone_form" action="add_phone.php" method="POST">
                <label for="Phone">Phone name: </label>
                <input type="text" id="Phone" name="Phone" class="from_control">

                <label for="Display">Display: </label>
                <input type="text" id="Display" name="Display" class="from_control">
                
                <label for="RAM">RAM: </label>
                <input type="text" id="RAM" name="RAM" class="from_control">
                
                <label for="Storage">Storage: </label>
                <input type="text" id="Storage" name="Storage" class="from_control">
                
                <label for="OS">OS: </label>
                <input type="text" id="OS" name="OS" class="from_control">
                
                <label for="Removable Battery">Removable Battery: </label>
                <input type="text" id="Removable Battery" name="Removable_Battery" class="from_control">
                
                <label for="Wireless Charging">Wireless Charging: </label>
                <input type="text" id="Wireless Charging" name="Wireless_Charging" class="from_control">
                
                <button type="submit" class="from_control" >Ajouter</button>
            </form>
        </div>
        <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="logout"></button>
        </form>
</body>
</html>