<?
require("settings.php");                   //connection info
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>payment</title>
    <meta name="author" content="...."/>
    <meta name="description" content="Payment"/>
    <meta name="keyword" content="Payment"/>
    <meta name="utf-8" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="enquire.css" rel="stylesheet"/> 
    <link href="styles/style.css" rel = "stylesheet">
</head>

<body>
    <div id="index_header_div">
        <div id="navbar">
          <img src ="images/Blacklogo_nobackground.png" alt="Our logo" height="65" id="logo">
          <nav id="index_header">
            <ul id="menu_list">
              <li><a href="index.php" class="header-nav">Home</a> </li>
              <li><a href="product.php" class="header-nav">Products</a> </li>
              <li><a href="payment.php" class="header-nav">Inquiry</a></li>
              <li><a href="enhancements.php" class="header-nav">Enhancements Lists</a> </li>
              <li><a href="about.php" class="header-nav">About Us</a></li>
            </ul>
          </nav>
        </div>   
    </div>
    <div class="en_wholepage">
      <header id="container_header" class="customer_inquiry"> Payment </header>
      <main>
<form action="process_order.php" method="post" novalidate="novalidate">
          
    <br/>
    <div class="en_customer_info">
      <h3>Your Information</h3>
          <label for="Fullname">Full Name</label>
          <input type="text" id="en_fn" name="Fullname" placeholder="Your name.." maxlength="25" pattern="[a-zA-Z]+" required><br />
          <br />
          <label for="Email">Email Address</label>
          <input type="email" id="en_ea" name="Email" placeholder="Your email.." required><br />
          <br />
          <label for="Phone" >Phone Number</label>
          <input type="text"  maxlength="10"  id="en_pn" name="Phone" placeholder="09786478" required><br />
          <br />
    </div>
    <br />  
    
        <fieldset class="en_fieldset">
            <legend>Address</legend>
        <br />
        <div class="en_fieldset_input">
            <label for="Street_address">Street address</label>
                <input type="text" id="en_fieldset_sa" name="Street_address"  maxlength="40" required><br>   
        <br />
            <label for="Suburb_town">Suburb/town</label>
                <input type="text" id="en_fieldset_st" name="Suburb_town"  maxlength="20"  required><br>
        <br />  

    
        <label for="en_fieldset_s">State</label>
            <select name="State" id="en_fieldset_s" required>
            <option value="" selected="selected" >Please Select</option>
            <option value="ATC">ATC</option>
            <option value="TAS">TAS</option>
            <option value="SA">SA</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            </select>
        
        <p>
        <label>Postcode</label>
        <input type="text"  name="Postcode"  id="en_fieldset_p" pattern="\d{4}" required/>
        </p>
        </div>
        
    </fieldset>
    <h4>Preferred contact:</h4>
    <input type="radio" id="email" name="Contact" value="Email">
    <label for="email">email</label><br>
    <input type="radio" id="post" name="Contact" value="Post">
    <label for="post">post</label><br>
    <input type="radio" id="phone" name="Contact" value="Phone">
    <label for="phone">phone</label>   

    <h3>Your Order</h3>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Options</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = @mysqli_connect('localhost', "root", "", "assignment 2");
        if (!$conn){
          //Displays an error message
          echo "<p>Database connection failure</p>";  //not in production script
          $error_message = "Failed to connect to MySQL: " .mysqli_connect_error();
          die($error_message);
        }else{
          $results = mysqli_query($conn, "SELECT * FROM `products`;");
          if ($results){
            $i = 1;
            foreach ($results as $result){
              ?>
              <tr>
                <td><input type="checkbox" name="product<?php echo $i; ?>" value="<?php echo $result['Name']; ?>"></td>
                <td> <?php echo $result['Name']; ?> </td>
                <td> 
                  <select name="options<?php echo $i; ?>" >
                    <option value="red">Red</option>
                    <option value="black">Black</option>
                    <option value="white">White</option>
                  </select>
                </td>
                <td> $<?php echo $result['Price']; ?> </td>                
                <td><input type="number" name="quantity<?php echo $i; ?>" min="1" max="5" required> </td>
              </tr> 
              <?php
              $i += 1;
            }
          }
          }

        ?>
      </tbody>
    </table>
    
    <h3>Payment Information</h3>
    <fieldset class="en_fieldset">
            <legend>Credit Card Information</legend>
        <br />
        <div class="en_credit_info">
        <label for="credit_card_type">Credit Card Type:</label>
        <select id="pm_credit_type" name="credit_card_type" required>
          <option value="">-- Select a Card Type --</option>
          <option value="visa">Visa</option>
          <option value="mastercard">Mastercard</option>
          <option value="american-express">American Express</option>
        </select>
      <br>

      <label for="name_on_card">Name on Credit Card:</label>
      <input type="text" id="name_on_card" name="name_on_card" require>
      <br>

      <label for="card_number">Credit Card Number:</label>
      <input type="text" id="card_number" name="card_number" require>
      <br>

      <label for="expiry_date">Expiry Date (mm-yy):</label>
      <input type="text" id="expiry_date"  pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" name="expiry_date" require>
      <br>

      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv">
      <br>
    </div>
    </p>
</fieldset>
        <button type="submit" class="button button1">CHECK OUT</button>
  
</form>
</main>
</div>
</body>

</html>

