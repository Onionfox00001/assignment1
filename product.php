<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="styles/style.css">
    
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
    <div id="product_div_main">
        <main id="product_main">
            <div id ="product-offer_div"><h1 class = "h1_product" id = "product-offer">We offer a wide range of products</h1></div>
            
            <section id="laptop-section">
                <h1 class = "h1_product">Our Products</h1>
                <aside class = "product-aside">
                    <h3>Stay organised stay ahead</h3>
                    <p>Looking for a device that caters to your every need? Look no further! Our products offer:
                    <ol>
                        <li>High-resolution displays</li>
                        <li>Fast processors</li>
                        <li>Long battery life</li>
                        <li>Superior camera technology</li>
                    </ol>
                    <p>
                    With our products, you'll always be connected and empowered to do more. So, come and explore our range of smartphones, laptops, ... and find the one that suits you the best.</p>
                </aside>
                <table class="product-table">
                    <tr class="product-th">
                        <th class="product-th">Products Name</th>
                        <th class="product-th">Products Image</th>
                        <th class="product-th">Products Description</th>
                        <th class="product-th">Products Details</th>
                        <th class="product-th">Products Price</th>
                    </tr>
                    
        <?php
                    $conn = @mysqli_connect('localhost', "root", "", "assignment 2");
        if (!$conn){
          //Displays an error message
          echo "<p>Database connection failure</p>";  //not in production script
          $error_message = "Failed to connect to MySQL: " .mysqli_connect_error();
          die($error_message);
        }else {
          $results = mysqli_query($conn, "SELECT * FROM `products`;");
          if ($results){
            $i = 0;
            $image_array = ["0.jpg", "1.jpg", "2.avif", "3.jpg", "4.jpg", "5.jpeg", "6.png", "7.jpg", "8.avif", "9.webp"];
            foreach ($results as $result){
                $i = 0;
                $image_url = $image_array[$i];
?>

                    <tr>
                        <td class="product-td" id = "product-acer_nitro"><?php echo $result['Name']; ?> </td>
                        <td class="product-image"><img src="<?php echo "images/".$image_array[$i]; ?>" class="product-image" height="150" alt="<?php echo $result['Name']; ?>"></td>
                        
                        <td class="product-td">
                        <?php echo $result['Description']; ?>
                        </td>
                        <td class="product-td">
                        <?php echo $result['Detail']; ?>
                            </td>
                        <td class="product-price"><?php echo $result['Price']; ?></td>
                    </tr>
<?php
            $i += 1;
            }}}
?>
          </table>
          <h2> <a href="payment.php" class="h4_product">Process to your payment -></a></h2>
          
</body>
</html>