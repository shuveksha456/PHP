<?php
require("dbconnection.php");

// Get the ID from the URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid ID.");
}

// Fetch the current record from the database
function findById($id)
{
    global $conn;
    $query = "SELECT * FROM student WHERE Id='$id'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; // Return null if no record is found
    }
}

$currentRecord = findById($id);

if (!$currentRecord) {
    die("Record not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Update the record in the database
    $query = "UPDATE student SET Name='$name', Age='$age', Email='$email', Gender='$gender', Address='$address' WHERE Id='$id'";

    if ($conn->query($query) === TRUE) {
        header("Location: index.php"); // Redirect to the main page after updating
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <h1>Student Update Form</h1>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name"
            value="<?php echo $currentRecord['Name'] ?? ''; ?>" />
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" placeholder="Enter your age"
            value="<?php echo $currentRecord['Age'] ?? ''; ?>" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email"
            value="<?php echo $currentRecord['Email'] ?? ''; ?>" />
        </div>

        <div class="form-group">
            <label>Gender</label>
            <input type="radio" name="gender" value="male"
            <?php echo (isset($currentRecord["Gender"]) && $currentRecord["Gender"] === "male") ? "checked" : ""; ?> /> Male
            <input type="radio" name="gender" value="female"
            <?php echo (isset($currentRecord["Gender"]) && $currentRecord["Gender"] === "female") ? "checked" : ""; ?> /> Female
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Enter your Address"
            value="<?php echo $currentRecord['Address'] ?? ''; ?>" />
        </div>

        <div class="btn">
            <input type="submit" name="update" value="Update" />
        </div>
    </form>
</body>
</html>