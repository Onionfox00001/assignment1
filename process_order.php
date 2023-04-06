
<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

include 'functions-process_order.php';
session_start();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user's information
    $fullname = sanitize($_POST['Fullname']);
    $email = sanitize($_POST['Email']) ;
    $phone = sanitize($_POST['Phone']);
    $street_address = sanitize($_POST['Street_address']);
    $suburb_town = sanitize($_POST['Suburb_town']);
    $state = sanitize($_POST['State']);
    $postcode = sanitize($_POST['Postcode']);
    $contact = sanitize($_POST['Contact']);   
    $_SESSION['Fullname']= $fullname;
    $_SESSION['Email']=$email;
    $_SESSION['Phone']= $phone;
    $_SESSION['Street_address']= $street_address;
    $_SESSION['Suburb_town']= $suburb_town;
    $_SESSION['State']= $state;
    $_SESSION['Postcode']= $postcode;
    $_SESSION['Contact']= $contact;

    
    if (isset($_SESSION['Cart'])){
        $cart = $_SESSION['Cart'];
    }else{
        
        $cart=[];
        for ($i = 1; $i <= 10; $i++) {
            $product = isset($_POST['product'.$i]) ? $_POST['product'.$i] : "";
            $option = isset($_POST['options'.$i]) ? $_POST['options'.$i] : "";
            $quantity = isset($_POST['quantity'.$i]) ? $_POST['quantity'.$i] : "";
            echo $product;
            if (!empty($product)) {
                // echo "Product: " . $product . "<br>";
                // echo "Option: " . $option . "<br>";
                // echo "Quantity: " . $quantity . "<br>";
                $cart[]= array('Product' => $product,'Option' => $option,'Quantity' => $quantity);
            }
            
        }
        $_SESSION['Cart'] = $cart;
    }
    
    // print_r($cart);
    

    $credit_card_type = $_POST["credit_card_type"];
    $name_on_card = $_POST["name_on_card"];
    $card_number = $_POST["card_number"];
    $expiry_date = $_POST["expiry_date"];
    $cvv = $_POST["cvv"];
    
    // Display
    // echo "Full Name: " . $fullname . "<br>";
    // echo "Email Address: " . $email . "<br>";
    // echo "Phone Number: " . $phone . "<br>";
    // echo "Street Address: " . $street_address . "<br>";
    // echo "Suburb/Town: " . $suburb_town . "<br>";
    // echo "State: " . $state . "<br>";
    // echo "Postcode: " . $postcode . "<br>";
    // echo "Preferred Contact: " . $contact . "<br>";
    // echo "Credit Card Type: " . $credit_card_type . "<br>";
    // echo "Name on Credit Card: " . $name_on_card . "<br>";
    // echo "Credit Card Number: " . $card_number . "<br>";
    // echo "Expiry Date: " . $expiry_date . "<br>";
    // echo "CVV: " . $cvv . "<br>";
    
    $err_msg=[];
    $validate_result = validate_card($err_msg,$credit_card_type,$card_number);
    
    if (empty($validate_result)) {
        $_SESSION['credit_card_type'] = $credit_card_type;
        $_SESSION['name_on_card'] = $name_on_card;
        $_SESSION['card_number'] = $card_number;
        $_SESSION['expiry_date'] = $expiry_date;
        $_SESSION["cvv"] = $cvv;

        header("Location: receipt.php");
        exit; 
    } else {
        $validate_result = implode(',', $validate_result);
        header("Location: fix_order.php?validate_result=".$validate_result);
        exit; 
    }
require('settings.php');
// Check if the table exists
$table_exist = mysqli_query($conn_orders, "SHOW TABLES LIKE 'orders'");

if(mysqli_num_rows($table_exist) == 0) {
    // Table does not exist, create it
    $create_table_query = "CREATE TABLE `orders` (
        `OrderID` int(11) NOT NULL,
        `Fullname` varchar(255) NOT NULL,
        `Email` varchar(255) NOT NULL,
        `PhoneNumber` varchar(20) NOT NULL,
        `PreferredContact` varchar(20) NOT NULL,
        `Products` varchar(255) NOT NULL,
        `Total` decimal(10,2) NOT NULL,
        `order_status` varchar(20) NOT NULL
      )";

    if(mysqli_query($conn_orders, $create_table_query)) {
        echo "Table orders created successfully.";
    } else {
        echo "Error creating table: ".mysqli_error($conn_orders);
    }
}
// }
?>