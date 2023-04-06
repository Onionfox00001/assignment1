<?php    
require("settings.php");                   //connection info
include 'functions-receipt.php';
session_start();
$cart= $_SESSION['Cart'];
$fullname = $_SESSION['Fullname'];
$email = $_SESSION['Email'];
$phone = $_SESSION['Phone'];
$street_address = $_SESSION['Street_address'];
$suburb_town = $_SESSION['Suburb_town'];
$state = $_SESSION['State'];
$postcode = $_SESSION['Postcode'];
$contact = $_SESSION['Contact'];
$credit_card_type = $_SESSION['credit_card_type'];
$name_on_card = $_SESSION['name_on_card'];
$card_number = $_SESSION['card_number'];
$expiry_date = $_SESSION['expiry_date'];
$cvv = $_SESSION['cvv'];


echo '<h1>--Your Personal Information--</h1>';
echo "Full Name: " . $fullname . "<br>";
echo "Email Address: " . $email . "<br>";
echo "Phone Number: " . $phone . "<br>";
echo "Street Address: " . $street_address . "<br>";
echo "Suburb/Town: " . $suburb_town . "<br>";
echo "State: " . $state . "<br>";
echo "Postcode: " . $postcode . "<br>";
echo "Preferred Contact: " . $contact . "<br>";
echo "Credit Card Type: " . $credit_card_type . "<br>";
echo "Name on Credit Card: " . $name_on_card . "<br>";
echo "Credit Card Number: " . $card_number . "<br>";
echo "Expiry Date: " . $expiry_date . "<br>";
echo "CVV: " . $cvv . "<br>";

echo '<h1>--Your Order--</h1>';

?>
<table>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Option</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>SubTotal</th>
    </tr>

<?php
$total = 0;
if (empty($cart)){
    echo 'cart is empty';
    print_r($cart);
}else{
    foreach ($cart as $product_chosen){
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        //check if connection is successful
        if (!$conn){
            //Displays an error message
            echo "<p>Database connection failure</p>";  //not in production script
        }else{
            //Upon successful connection
            $sql_table = 'products';
            //Set up the SQL command to query or add data into the table
            $query = "SELECT `ProductID`,`Price` FROM `products` WHERE `Name` = '".$product_chosen['Product']."';";
            //execute the query and store result into the result pointer
            $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
            $subtotal = intval($result['Price'])*intval($product_chosen['Quantity']);
            if ($result){
                echo '<tr>';
                echo    '<td>'.$result['ProductID'].'</td>';
                echo    '<td>'.$product_chosen['Product'].'</td>';
                echo    '<td>'.$product_chosen['Option'].'</td>';
                echo    '<td>'.$result['Price'].'</td>';
                echo    '<td>'.$product_chosen['Quantity'].'</td>';
                echo    '<td> $'.$subtotal.'</td>';
                echo '</tr>';
                $total += $subtotal;       
            }else{
                echo 'empty';
            }
        }
    }
}

?>
</tr>
</table>
<h2> <?php echo 'Total: $'. $total; ?></h2>
<?php

$current_time = date('Y-m-d H:i:s');

// Create the INSERT query
$query_update = "INSERT INTO Orders (Fullname, Email, PhoneNumber, PreferredContact, Products, Total,order_time, order_status)
        VALUES ('$fullname', '$email', '$phone', '$contact', '".array_to_csv($cart)."', $total,'$current_time', 'pending')";

// Execute the query
if (mysqli_query($conn_orders, $query_update)) {
  echo "Your order has been updated successfully. Please use your Order ID and contact the manager to complete the order </br>";
  
  $orderID =  mysqli_fetch_assoc(mysqli_query($conn_orders, "SELECT `order_id` FROM orders ORDER BY `order_id` DESC LIMIT 1;"));
  
  echo "Your OrderID :".$orderID['order_id'];
  session_destroy();
} else {
  echo "Error: " . $query_update . "<br>" . mysqli_error($conn_orders);
}


?>
