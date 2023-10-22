<?php
include("db_conn.php");
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
        return $data;
    }
$name = validate($_POST['Phone']);
echo $name;
$Display = validate($_POST['Display']);
$RAM = validate($_POST['RAM']);
$Storage = validate($_POST['Storage']);
$OS = validate($_POST['OS']);
$Battery = validate($_POST['Removable_Battery']);
$Charging = validate($_POST['Wireless_Charging']);
$conn->begin_transaction();
$sql="INSERT INTO smartphone(Name_smartphone) VALUES ('$name')";
$conn->execute_query($sql);
$parent_id = $conn->insert_id;
$features = mysqli_query($conn, "SELECT Id_Features FROM features");

$ids = [];

while($row = $features->fetch_assoc()) {
    array_push($ids,$row["Id_Features"]);
};

$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$Display','$parent_id', '$ids[0]')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$RAM','$parent_id', '$ids[1]')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$Storage','$parent_id', '$ids[2]')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$OS','$parent_id', '$ids[3]')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$Battery','$parent_id', '$ids[4]')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$Charging','$parent_id', '$ids[5]')";
$conn->execute_query($sql);
?>