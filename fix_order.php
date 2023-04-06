
<?php
include 'settings.php';
session_start();
if (isset($_GET['validate_result'])) {
    $validate_result = explode(',', $_GET['validate_result']);   
}
print_r($_SESSION['Cart']);
?>
<h1>Fix Order</h1>
<h4>Highlight: need to change</h4>
<form action="process_order.php" method="post" novalidate="novalidate">
    <input type="hidden" name="Fullname" value="<?php echo $_SESSION['Fullname']; ?>">
    <input type="hidden" name="Email" value="<?php echo $_SESSION['Email']; ?>">
    <input type="hidden" name="Phone" value="<?php echo $_SESSION['Phone']; ?>">
    <input type="hidden" name="Street_address" value="<?php echo $_SESSION['Street_address']; ?>">
    <input type="hidden" name="Suburb_town" value="<?php echo $_SESSION['Suburb_town']; ?>">
    <input type="hidden" name="State" value="<?php echo $_SESSION['State']; ?>">
    <input type="hidden" name="Postcode" value="<?php echo $_SESSION['Postcode']; ?>">
    <input type="hidden" name="Contact" value="<?php echo $_SESSION['Contact']; ?>">
    <input type="hidden" name="Cart" value="<?php echo $_SESSION['Cart']; ?>">

    <fieldset class="en_fieldset">
        <legend>Credit Card Information</legend>
        <br/>
        <div class="en_credit_info">
        <label for="credit_card_type">
        <?php 
            if (in_array('Credit Card Type NOT VALID (must be visa, mastercard, or american express)', $validate_result)) { echo '<mark> Credit Card Type: </mark>'; }else{echo 'Credit Card Type: ';}
        ?>    
        </label>
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

        <label for="card_number">
            <?php 
            if (in_array('Visa Card Number NOT VALID (must have 16 digits)', $validate_result) or in_array('Mastercard Card Number NOT VALID (must have 16 digits)', $validate_result) or in_array('American Express Card Number NOT VALID (must have 16 digits)', $validate_result)) { echo '<mark> Credit Card Number: </mark>'; }else{echo 'Credit Card Number: ';}
            ?>
        </label>
        <input type="text" id="card_number" name="card_number" require>
        <br>

      <label for="expiry_date">Expiry Date (mm-yy):</label>
      <input type="text" id="expiry_date" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" name="expiry_date" require>
      <br>

      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv">
      <br>
    </div>
    </fieldset>
    <button type="submit" class="button button1">CHECK OUT</button>
</form>