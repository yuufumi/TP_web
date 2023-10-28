<?php
include("db_conn.php");
$name = strtoupper($_POST['feature']);
$conn->begin_transaction();
$sql="SELECT * FROM features";
$results = mysqli_query($conn, $sql);
while($row = $results->fetch_assoc()) {
    if($name === strtoupper($row['Name_Features'])){
        $sql= "DELETE FROM features WHERE features.Id_Features= " . $row['Id_Features'];
        $result = mysqli_query($conn, $sql);
        $sql= "DELETE FROM smartphone_features WHERE smartphone_features.Id_Features= " . $row['Id_Features'];
        $result = mysqli_query($conn, $sql);
    }    
};
header("Location: admin.php");
?>