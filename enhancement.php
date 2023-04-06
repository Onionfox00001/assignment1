<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enquire</title>
    <meta name="author" content="TGMD group"/>
    <meta name="description" content="Customer inquiry"/>
    <meta name="keyword" content="Customer, inquiry, enquire"/>
    <meta name="utf-8" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/enquire.css" rel="stylesheet"/> 
    <link href="styles/style.css" rel = "stylesheet">
</head>
<body>
    <div id="index_header_div">
        <div id="navbar">
          <img src ="images/Blacklogo_nobackground.png" alt="Our logo" height="65" id="logo">
          <nav id="index_header">
            <ul id="menu_list">
              <li><a href="index" class="header-nav">Home</a> </li>
              <li><a href="product.html" class="header-nav">Products</a> </li>
              <li><a href="enquire.html" class="header-nav">Inquiry</a></li>
              <li><a href="enhancements.html" class="header-nav">Enhancement List</a> </li>
              <li><a href="about.html" class="header-nav">About Us</a></li>
            </ul>
          </nav>
        </div>   
    </div>
    <div class="en_wholepage">
      <header id="container_header" class="customer_inquiry"> Customer Inquiry </header>
      <main>
    <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
          
    <br/>
    <div class="en_customer_info">
          <label for="en_fn">First Name</label>
          <input type="text" id="en_fn" name="Firstname" placeholder="Your name.." maxlength="25" pattern="[a-zA-Z]+" required><br />
          <br />
          <label for="en_ln">Last Name</label>
          <input type="text" id="en_ln" name="Lastname" placeholder="Your last name.." maxlength="25" pattern="[a-zA-Z]+" required><br />
          <br />
          <label for="en_ea">Email Address</label>
          <input type="email" id="en_ea" name="Email" placeholder="Your email.." required><br />
          <br />
          <label>Phone Number</label>
          <input type="text"  maxlength="10"  id="en_pn" placeholder="09786478" required><br />
          <br />
    </div>
    <br />  
    
        <fieldset class="en_fieldset">
            <legend>Address</legend>
        <br />
        <div class="en_fieldset_input">
            <label>Street address</label>
                <input type="text" id="en_fieldset_sa"  maxlength="40" required><br>   
        <br />
            <label>Suburb/town</label>
                <input type="text" id="en_fieldset_st"  maxlength="20"  required><br>
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
    
    <p>Preferred contact:</p>
    <input type="radio" id="email" name="Contact" value="Email" required>
    <label for="email">email</label><br>
    <input type="radio" id="post" name="Contact" value="Post">
    <label for="post">post</label><br>
    <input type="radio" id="phone" name="Contact" value="Phone">
    <label for="phone">phone</label>      
    <p></p>

    <label for="en_product">Choose a product:</label>
    <select name="Product" id="en_product" required>
    <option value="" selected="selected" >Please Select</option>
    <option value="Acer Nitro 5">Acer Nitro 5</option>
    <option value="MacBook Air">MacBook Air</option>
    <option value="Bphone B86">Bphone B86</option>
    <option value="Plash Speed 5">Plash Speed 5</option>
    </select>

    <p></p>
<div class="en_checkbox">
    <label >Product features:</label><br />
    <input type="checkbox" id="finish_en" name="Features" value="finish" required >
    <label for="finish_en"> Finish</label><br>
    <input type="checkbox" id="storage_en" name="Features" value="storage" >
    <label for="storage_en"> Storage</label><br>
    <input type="checkbox" id="processor_en" name="Features" value="processor" >
    <label for="processor_en"> Processor</label><br><br>
</div>
    <p>
        <label id="en_enquiry_text">Inquiry<br />
            <textarea id="en_text" rows="15" cols="60" placeholder="What aspect of our product are you interest in?"></textarea>

        </label>
    </p>
        <button type="submit" class="button button1">Submit</button>
  
</form>
</main>
</div>
</body>

</html>

