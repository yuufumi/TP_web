<?php
include("db_conn.php");
$name = $_POST['Phone'];
$conn->begin_transaction();
$features = mysqli_query($conn, "SELECT * FROM smartphone");
$phone_dict = array();
while($row = $features->fetch_assoc()) {
    $phone_dict[$row["Name_smartphone"]] = $row["Id_smartphone"]; 
};
foreach ($_POST as $key => $value) {
    if($key !== 'Phone'){
        echo $value;
        echo $key;
        //echo $phone_dict[$name];
        $sql="UPDATE smartphone_features SET Value_Smartphone_Features='".$value."' WHERE Id_Features=".$key . " AND smartphone_features.Id_Smartphone=".$phone_dict[$name];
        $conn->execute_query($sql);
    }
}
header("Location: admin.php");
?>