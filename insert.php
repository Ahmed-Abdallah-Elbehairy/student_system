<?php
include "connection.php";

$name     = $_POST['name'];
$age      = $_POST['age'];
$wep      = $_POST['WEP'];
$data     = $_POST['Data'];
$system   = $_POST['System'];
$micro    = $_POST['MICRO'];
$or       = $_POST['OR'];
$discrete = $_POST['Discrete'];

$sql = "INSERT INTO students (name, age, wep, data, system, micro, orr, discrete)
        VALUES ('$name', '$age', '$wep', '$data', '$system', '$micro', '$or', '$discrete')";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}
?>
