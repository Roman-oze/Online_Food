<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>login page</title>
</head>
<body>

    <?php
    // Display error message if authentication failed
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

<div class="hero">
    <div class="local">
         <form action="" method="post">
          
                <button type="button"  class="btn"> <a href="../View/login.php">Login</a></button>

                <button type="button"  class="btn"> <a href="../View/registration.php">Register</a></button>
             
                <input type="text" name="name" placeholder="Username" class="number1"  required >

                 <input type="password" name="password" placeholder="**********" class="number1"  required>
                 <b>Reset Password</b>

                <input class="button btnn" type="submit" value="Login">
                
         </form>
    </div>
       
</div>

</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded username and password (replace with your authentication logic)
    require_once('db_connection.php');

    // Get user input
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Check if the input matches the hardcoded credentials
    if ($name === $name && $password === $validPassword) {
        // Authentication successful, redirect to the dashboard or set a session variable
        // In a real application, you would usually set a session variable for authentication.
        session_start();
        $_SESSION['authenticated'] = true;
      
        exit();
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid uname or password";
    }
    header("Location:http://localhost/e_delish/index.php");
}
?>
   <!-- <div class="hero">
        <div class="form">
                <button type="button" class="btn">Login</button>
                <button type="button"  class="btn"> <a href="../View/registration.php">Register</a></button>
            <div class="input-group">
               
        <input type="text" placeholder="User Name" class="number1">
                <input type="text"placeholder="new password" class="number2">
            </div>
                <div class="forget">
                    <a href="" class="pass">Forget Password</a>
                    <button class="btnn">Submit</button>
                </div> 
            </div>
        </div> -->
