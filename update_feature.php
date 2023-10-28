<?php
include("db_conn.php");
$name = $_POST['feature'];
$conn->begin_transaction();
$features = mysqli_query($conn, "SELECT * FROM features");
$feature_dict = array();
while($row = $features->fetch_assoc()) {
    $feature_dict[$row["Name_Features"]] = $row["Id_Features"]; 
};
foreach ($_POST as $key => $value) {
    if($key !== 'feature'){
        $sql="UPDATE smartphone_features SET Value_Smartphone_Features='".$value."' WHERE Id_Smartphone=".$key . " AND smartphone_features.Id_Features=".$feature_dict[$name];
        $conn->execute_query($sql);
    }
}
header("Location: admin.php");
?>