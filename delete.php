<?php
include "connection.php";

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM students WHERE id = $id");

echo "success";
?>
