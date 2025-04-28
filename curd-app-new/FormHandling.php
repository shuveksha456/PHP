<?php
require("dbconnection.php");
if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $Name= $_POST["Name"];
    $Age= $_POST["Age"];
    $Email= $_POST["Email"];
    $Gender= $_POST["Gender"];
    $Address= $_POST["Address"];

    $query = "INSERT INTO student (Name, Age, Email, Gender, Address) VALUES ('$Name', '$Age', '$Email', '$Gender', '$Address')";
if($conn->query($query)===True){
    echo "Record inserted successfully";
}else{
    echo "Error: "  . $conn->error;
}
}
?>
<a href="index.php">Go back to the form</a>