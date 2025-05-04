<?php
$correct_username="admin";
$correct_password="Nepal123";
$error= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_username= $_POST['username'];
    $input_password= $_POST['password'];

    if($input_username == $correct_username && $input_password == $correct_password){
       session_start();
       $_SESSION["isLoggedIn"]= true;
       header("location: index.php");
    }else{
           $error= "Username or password do not match";
        // echo $error; 
          }
        }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <form method="POST">
        <h1>Login Form</h1>
        <div class="form-group">
            <label for="username">Username</lable>
            <input type="text" placeholder="Username" name="username" id="username">
        </div>

        <div class="form-group">
            <label for="password">Password</lable>
            <input type="password" placeholder="Password" name="password" id="password">
        </div>
        <input type="submit" value="Login" class="btn btn-login">
        <?php
        if(isset($error) && $error !=""){
            echo '<div class="error">'.$error.'</div>';
        }
        ?>
    </form>
</body>
</html>


