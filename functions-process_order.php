
<?php
    function sanitize($string) {
        // Remove leading and trailing spaces
        $string = trim($string);
        // Remove backslashes
        $string = stripslashes($string);
        // Remove HTML control characters
        $string = htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return $string;
    }

    function validate_card($msg,$credit_card_type,$card_number){
        // Check if the credit card type is valid
        if ($credit_card_type != 'visa' && $credit_card_type != 'mastercard' && $credit_card_type != 'american-express') {
            $msg[]= "Credit Card Type NOT VALID (must be visa, mastercard, or american express)";
            exit;
        }else{
            if ($credit_card_type == 'visa'){
                if (strlen($card_number) == 16) {
                    if (substr($card_number, 0, 1) != "4") {
                        $msg[]= "Visa Card Number NOT VALID (must start with a 4)";
                    }
                  } else {
                    $msg[]= "Visa Card Number NOT VALID (must have 16 digits)";
                  }
            }
            if ($credit_card_type == 'mastercard'){
                if (strlen($card_number) == 16) {
                    if (intval(substr($card_number, 0, 2)) < 51 or intval(substr($card_number, 0, 2)) > 55) {
                        $msg[]= "MasterCard Card Number NOT VALID (must start with digits 51 through 55)";
                    }
                  } else {
                    $msg[]= "Mastercard Card Number NOT VALID (must have 16 digits)";
                  }
            }
            if ($credit_card_type == 'american-express'){
                if (strlen($card_number) == 15) {
                    if (substr($card_number, 0, 2) != 34 && substr($card_number, 0, 2) != 37) {
                        $msg[]= "American Express Card Number NOT VALID (must start with 34 or 37)";
                    }
                  } else {
                    $msg[]= "American Express Card Number NOT VALID (must have 15 digits)";
                  }
            }
        }
        return $msg;
    }
?>