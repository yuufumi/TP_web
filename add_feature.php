<?php
include("db_conn.php");
$name = $_POST['feature'];
$conn->begin_transaction();
$sql="INSERT INTO features(Name_Features) VALUES ('$name')";
$conn->execute_query($sql);
$parent_id = $conn->insert_id;
$phones = mysqli_query($conn, "SELECT Id_smartphone FROM smartphone");
$ids = [];

while($row = $phones->fetch_assoc()) {
    array_push($ids,$row["Id_smartphone"]);
};
foreach ($_POST as $key => $value) {
    if($key !== 'feature'){
        $sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$value','$key', '$parent_id')";
    $conn->execute_query($sql);
    }
}
header("Location: admin.php");
?>