<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="Formhandling.php" method="POST">
        <h1>Add Student</h1>
        <label for="name">Name:</label>
        <input type="text" name="Name" required><br>
        <label for="age">Age:</label>
        <input type="number" name="Age" required><br>
        <label for="email">Email:</label>
        <input type="email" name="Email" required><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="Gender" value="Male" required> Male
        <input type="radio" name="Gender" value="Female"> Female<br>
        <label for="address">Address:</label>
        <input type="text" name="Address" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>