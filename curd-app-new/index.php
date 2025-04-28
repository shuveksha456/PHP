<?php
require("dbconnection.php");

$query = "SELECT * FROM student";
$result = $conn->query($query); // Use $conn instead of $Conn
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <h1>Student Records</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        $index = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $index."</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Age"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Gender"] . "</td>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>
                        <a href='update.php?id=" . $row["Id"] . "'>Update</a>
                        <a href='delete.php?id=" . $row["Id"] . "'>Delete</a>
                      </td>";
                echo "</tr>";
                $index++;
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>
    </table>
    <a href="Form.php">Add New Record</a>
</body>
</html>
