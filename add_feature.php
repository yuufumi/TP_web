<?php
include("db_conn.php");
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
        return $data;
    }
$name = validate($_POST['feature']);
echo $name;
$phone1 = validate($_POST['phone1']);
$phone2 = validate($_POST['phone2']);
$phone3 = validate($_POST['phone3']);
$phone4 = validate($_POST['phone4']);
$conn->begin_transaction();
$sql="INSERT INTO features(Name_Features) VALUES ('$name')";
$conn->execute_query($sql);
$parent_id = $conn->insert_id;
$phones = mysqli_query($conn, "SELECT Id_smartphone FROM smartphone");
/*
*/
$ids = [];

while($row = $phones->fetch_assoc()) {
    array_push($ids,$row["Id_smartphone"]);
};

$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$phone1','$ids[0]', '$parent_id')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$phone2','$ids[1]','$parent_id')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$phone3','$ids[2]','$parent_id')";
$conn->execute_query($sql);
$sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$phone4','$ids[3]','$parent_id')";
$conn->execute_query($sql);
?>