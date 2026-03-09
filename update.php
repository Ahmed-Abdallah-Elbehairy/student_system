<?php
include "connection.php";

$id       = $_POST['id'];
$name     = $_POST['name'];
$age      = $_POST['age'];
$wep      = $_POST['WEP'];
$data     = $_POST['Data'];
$system   = $_POST['System'];
$micro    = $_POST['MICRO'];
$or       = $_POST['OR'];
$discrete = $_POST['Discrete'];

$sql = "UPDATE students SET 
        name='$name',
        age='$age',
        wep='$wep',
        data='$data',
        system='$system',
        micro='$micro',
        orr='$or',
        discrete='$discrete'
        WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
?>
