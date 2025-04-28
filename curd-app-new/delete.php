<?php
include("dbconnection.php");
function deleteSql($ID) {
    global $conn;
    $query= "DELETE FROM student WHERE Id='$ID'";

    if ($conn->query($query)==true) {
        header("Location: index.php");
    }
}
$id=$_GET['id'];
deleteSql($id);
?>