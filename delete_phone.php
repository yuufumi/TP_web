<?php
include("db_conn.php");
$name = strtoupper($_POST['phone']);
$conn->begin_transaction();
$sql="SELECT * FROM smartphone";
$results = mysqli_query($conn, $sql);
while($row = $results->fetch_assoc()) {
    if($name === strtoupper($row['Name_smartphone'])){
        $sql= "DELETE FROM smartphone WHERE smartphone.Id_smartphone= " . $row['Id_smartphone'];
        $result = mysqli_query($conn, $sql);
        $sql= "DELETE FROM smartphone_features WHERE smartphone_features.Id_Smartphone= " . $row['Id_smartphone'];
        $result = mysqli_query($conn, $sql);
    }    
};
header("Location: admin.php");
?>
