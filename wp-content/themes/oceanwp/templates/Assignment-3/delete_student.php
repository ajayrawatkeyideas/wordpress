<?php
include "connection.php";

// sql to delete a record
$id=$_GET["id"];
$sql = "DELETE FROM student WHERE id=$id";

if (!mysqli_query($conn, $sql)) {
    echo "Error deleting record: " . mysqli_error($conn);
} 

mysqli_close($conn);

header("location:display.php")

?>