<?php
// Start the session
session_start();

// Include the database connection file
require_once('db_connection.php');

// Check if the 'cart' session variable is not set, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if a product is added to the cart
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product is not already in the cart
    if (!in_array($product_id, $_SESSION['cart'])) {
        // Add the product to the cart
        $_SESSION['cart'][] = $product_id;
    }
}

// Check if the 'clear_cart' action is triggered
if (isset($_POST['clear_cart'])) {
    // Clear all products from the cart
    $_SESSION['cart'] = array();
}


// Retrieve products from the 'products' table
$sql = "SELECT * FROM products";
$products = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddCart</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="check.css">
</head>

<body class="">

    <div class="container">

        <header>
            <h1>Shopping Cart</h1>

            <div class="shopping">
                <img src="../Model/shopping.svg">
                <span class="quantity">
                    <?php echo count($_SESSION['cart']) ?>
                </span>
            </div>
        </header>

        <a href="https://img.freepik.com/free-vector/horizontal-format-digital-restaurant-menu_52683-45248.jpg?w=2000">
            <img src="../Model/down.png" class="menuphoto">
        </a><br>

        <div class="list">
            <?php
                // Check if there are products to display
                if ($products->num_rows > 0) {
                    // Output data of each row
                    while ($row = $products->fetch_assoc()) {
                    echo '<div class="item">';
                    echo '<img src="' . $row["image"] . '">';
                    echo '<div class="title">' . $row["name"] . '</div>';
                    echo '<div class="price">$' . $row["price"] . '</div>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="add_to_cart">Add To Cart</button>';
                    echo '</form>';
                    echo '</div>';
                    }
                } else {
                    echo "<p>No products found</p>";
                }
        
                // Close the database connection
             
                ?>
        </div>
    </div>
    <div class="card">

        <h1>Card</h1>
        <?php 
         if(count($_SESSION['cart']) > 0){
            // Add a button to clear the cart
            echo '<form method="post" action="">';
            echo '<button style="    padding: 10px;
            min-width: 112px;
            border: 0;
            background: #FF5722;
            color: #FFF;
            font-weight: 700;
            border-radius: 4px;
            cursor: pointer;" type="submit" name="clear_cart">Clear Cart</button>';
            echo '</form>';
         }

        ?>
        <ul class="listCard">
            <?php 
               $totalPrice = 0;
               foreach ($_SESSION['cart'] as $product_id) {
                // Retrieve product details based on the product_id from the cart
                $cartProductQuery = "SELECT * FROM products WHERE id = $product_id";
                $cartProductResult = $conn->query($cartProductQuery);
                $cartProduct = $cartProductResult->fetch_assoc();
            
                // Display cart product information in HTML
                echo '<li>';
                echo '<div><img src="' . $cartProduct["image"] . '"></div>';
                echo '<div>' . $cartProduct["name"] . '</div>';
                echo '<div>';
                echo '<button onclick="changeQuantity(' . $product_id . ', -1)">-</button>';
                echo '<div class="count" id="quantity-' . $product_id . '">1</div>';
                echo '<button onclick="changeQuantity(' . $product_id . ', 1)">+</button>';
                echo '</div>';
                echo '<div data-unit-price="' . $cartProduct["price"] . '" id="price-' . $product_id . '">$' . $cartProduct["price"] . ' = 
                 <span id="total-price-' . $product_id . '">$' . $cartProduct["price"] . '</span>
                </div>';
                echo '</li>';
                $totalPrice += $cartProduct["price"];
            }
            echo ' <hr>';
            echo '<li>';
            echo '<div></div>';
            echo '<div>Total amount</div>';
            echo '<div id="total-products">' .  count($_SESSION['cart']).'</div>';
            echo '<div id="total-sum">$' . number_format($totalPrice, 2).'</div>';
            echo '</li>';
            $conn->close();
           ?>
        </ul>

        <!-- <button type="submit" id="checkoutBtn">Total Bill and Quantity : <span id="gross_total_amount"></span> </button> -->
        <div class="checkOut">
            <div class="closeShopping" style="background:black;color:white;">Close</div>
            <a id="final_total" style="text-decoration: none;color: black;" href="../View/payment.php?amount= <?php echo number_format($totalPrice, 2) ?>">
                <div class="closeShopping">Comfirm order</div>
            </a>
        </div>
    </div>

    <!-- <a href="/HTML Project/Html_Project/payment/payment.html"> -->

    <script src="./app.js"></script>
    <!-- ... Your existing HTML code ... -->

    <!-- Add your additional HTML content or scripts here -->

    <script>
    function changeQuantity(productId, change) {
        var quantityElement = document.getElementById('quantity-' + productId);
        var priceElement = document.getElementById('price-' + productId);
        var currentQuantity = parseInt(quantityElement.innerHTML);
        var unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
        var totalPriceElement = document.getElementById('total-price-' + productId);

        // Ensure the quantity doesn't go below 1
        if (currentQuantity + change > 0) {
            // Update quantity
            quantityElement.innerHTML = currentQuantity + change;

            // Update total price
            var newTotalPrice = (currentQuantity + change) * unitPrice;
            totalPriceElement.innerHTML = '$' + newTotalPrice.toFixed(2);

            // Recalculate and update total cart product count and total sum
            updateTotalCart();
        }
    }

    function updateTotalCart() {
        var totalProductCount = 0;
        var totalSum = 0;

        // Iterate through each product in the cart
        var cartItems = document.querySelectorAll('.listCard li');
        cartItems.forEach(function(item) {
            var quantity = parseInt(item.querySelector('.count').innerHTML);
            var unitPrice = parseFloat(item.querySelector('[data-unit-price]').getAttribute('data-unit-price'));
            var totalItemPrice = quantity * unitPrice;

            // Update total product count
            totalProductCount += quantity;

            // Update total sum
            totalSum += totalItemPrice;

            document.getElementById('total-sum').innerHTML = '$' + totalSum.toFixed(2);
            document.getElementById('total-products').innerHTML = totalProductCount;
            document.getElementById('final_total').setAttribute("href", "http://localhost/e_delish/View/payment.php?amount="+totalSum.toFixed(2));
            console.log(totalSum);
        });

    }
    </script>
 
    <!-- ... Your existing HTML code ... -->

</body>

</html>