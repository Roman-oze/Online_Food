<?php
// Include the database connection file
require_once('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Insert data into the 'users' table
    $sql = "INSERT INTO registration (name, email, password, number) VALUES ('$name', '$email', '$password','$number')";

    if ($conn->query($sql) === TRUE) {
        echo "Created User account successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location:http://localhost/e_delish/index.php");
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="reg.css">
   
</head>
<body>

         
    <div class="main">
 
     <div class="fom">
      <!-- <h1>Register</h1> -->
      <img src="../Model/regis.jpeg" class="logo">

    <form action="" method="POST">

        <input type="text" class="form-control" name="name" placeholder="name" required><br><br>
        <input type="email" class="form-control" placeholder=" Email" name="email" required><br><br>
        <input type="password" class="form-control" placeholder=" Password" name="password" required><br><br>
        <input type="text" class="form-control" name="number" placeholder=" +88*********"><br><br>
        <button type="submit"  class="bn53">Register</button>

    </form>  
  </div>
  </div>
    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


