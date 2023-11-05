<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    header("Location: index.php");
    exit();
}
include("db_conn.php");
$query = "SELECT * FROM features ORDER BY Id_Features ASC";
$features = $conn->query($query);

$query = "SELECT * FROM smartphone_features ORDER BY Id_Smartphone_Features ASC";
$values = $conn->query($query);

$valuesByFeatureId = [];
$phonesfr=[];
$featuresfr=[];
while($feature=$features->fetch_assoc()){
    $featureId = $feature["Id_Features"];
    $featuresfr[$featureId]=$feature;

}
while ($value = $values->fetch_assoc()) {
    $featureId = $value["Id_Features"];
    if (!isset($valuesByFeatureId[$featureId])) {
        $valuesByFeatureId[$featureId] = [];
    }
    $valuesByFeatureId[$featureId][] = $value["Value_Smartphone_Features"];
}

$query = "SELECT * FROM smartphone";
$phones = $conn->query($query);
while($phone=$phones->fetch_assoc()){
    $phoneId = $phone["Id_smartphone"];
    $phonesfr[$phoneId]=$phone;

}
$conn->close();

// Prepare the data for JSON response
$data = [
    "valuesByFeatureId" => $valuesByFeatureId,
    "features" => $featuresfr,
    "phones" => $phonesfr,
];

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);


?>