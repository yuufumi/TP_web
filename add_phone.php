<?php
include("db_conn.php");
$name = $_POST['Phone'];
$conn->begin_transaction();
$sql="INSERT INTO smartphone(Name_smartphone) VALUES ('$name')";
$conn->execute_query($sql);
$parent_id = $conn->insert_id;
$features = mysqli_query($conn, "SELECT Id_Features FROM features");
$ids = [];

while($row = $features->fetch_assoc()) {
    array_push($ids,$row["Id_Features"]);
};
$i = 0;
foreach ($_POST as $key => $value) {
    if($key !== 'Phone'){
        $sql="INSERT INTO smartphone_features(Value_Smartphone_Features,Id_smartphone, Id_Features) VALUES ('$value','$parent_id', '$ids[$i]')";
        $conn->execute_query($sql);
        $i++;
    }
}
header("Location: admin.php");
?>