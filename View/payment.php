

<?php
// Include the database connection file
require_once('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $amount = $_POST['amount'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Insert data into the 'users' table
    $sql = "INSERT INTO payment (name,address, number,amount) VALUES ('$name', '$address','$number','$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Create Order successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location:http://localhost/e_delish/View/order.php");
}

// Close the database connection
$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pay.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Payment</title>
</head>
<body>

<div class="container">
    <h1 class="text-center mt-5">Online Food  Payment</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Details</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Order ID</th>
                                <td>032</td>
                            </tr>
                            <tr>
                                <th scope="row">Food Name</th>
                                <td>Burger</td>
        
                            </tr>
                            <tr>
                                <th scope="row">Total Price</th>
                                <td><?php echo $_GET['amount'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
   
    
   <br>
   
   <div class="delivery ">
    <label class="cash">Cash On Delivery</label>
    <input class="box" type="checkbox" >
</div>
<br>

          <div class="paymeth" style=" border: 2px solid;border-radius:24px; text-align: center;width: 50%;margin: 0 auto;">
       
                <h2 class="payh1">Apps Payment Method</h2>  

            <img src="../Model/bkash.png" style="height:80px; width:110px">
            <img src="../Model/nogod.png" style="height:70px; width:100px">
            <img src="../Model/rock.png" style="height:90px; width:120px">
        <div>
        <img src="../Model/QRB.png" style="height:90px; width:110px">
            <img src="../Model/QRN.png" style="height:70px; width:100px">
            <img src="../Model/QRR.png" style="height:90px; width:110px">
        </div>
            
        </div>
   


        <div class="row justify-content-center mt-5">
            <div class="col-sm-6">
                <form action="payment.php" method="POST">
                    <div class="form-group">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name">
                        </div>
                        
                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="text" class="form-control" name="number">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" name="amount" value="<?php echo $_GET['amount']; ?>">
                        </div>
                        <h3 class="text-dark">Delivery Address</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Current Location">
                        </div>
                                        
                      
                        <button type="submit" class="btn btn-primary">confirn Order</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        <br>
        <br>
                    
    
</body>
</html>

