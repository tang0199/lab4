#<?php        
    function ValidateTerms ($terms, &$validTerms)
    {
        if (!isset($terms))
        {
            return "You must agree the terms and conditions!";
        }
        else
        {
            $validTerms = true;
        }
    }
    
    function ValidatePrincipal ($pamount, &$validPrincipal)
    {
        $pamount = trim($pamount);
        if ( strlen($pamount) == 0)
        {
            return "Pricincipal Amount field can not be blank.";
        }
        elseif ( !is_numeric($pamount) or $pamount <= 0)
        {
            return "Pricincipal Amount must be a numeric number and greater than 0.";
        }
        else
        {
            $validPrincipal = true;
        }
    }

    function ValidateRate ($rate, &$validRate)
    {
        $rate = trim($rate);
        if ( strlen($rate) == 0)
        {
            return "Interest Rate field can not be blank.";
        }
        elseif ( !is_numeric($rate) or $rate < 0 )
        {
            return "Interest Rate must be numeric and not negative.";
        }
        else
        {
            $validRate = true;
        }
    }

    function ValidteYears ($years, &$validYears)
    {
        $years = trim($years);
        if( $years < 1 or $years > 20)
        {
            return "Years to Deposit must be numeric and from 1 to 20.";
        }
        else
        {
            $validYears = true;
        }
    }

    function ValidateName ($name, &$validName)
    {
        $name = trim($name);
        if (strlen($name) == 0)
        {
            return "Name field can not be blank.";
        }
        else
        {
            $validName = true;
        }
    }

    function ValidatePostal ($postal, &$validPostal)
    {
        $postal = trim($postal);
        $expression = '/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/';
        if (strlen($postal) == 0)
        {
            return "Postal Code field can not be blank.";
        }
        elseif ( !preg_match ($expression, $postal) )
        {
            return "Postal code must be in the form of  XnX nXn, where X is an upper or lower case letter and n is a digit from 0 to 9, with or without space between the first 3 characters and the last 3 characters.";
        }
        else
        {
            $validPostal = true;
        }
    }

    function ValidatePhone ($phone, &$validPhone)
    {
        $phone = trim($phone);
        $expression = "/^([1-9][0-9]{2})-[1-9][0-9]{2}-[0-9]{4}$/";
        if(strlen($phone) == 0)
        {
            return "Phone Number field can not be blank.";
        }
        elseif(!preg_match($expression, $phone))
        {
            return "Phone number must be in the form of nnn-nnn-nnnn where n is a digit, the first n in the first and the second 3-digit groups cannot be 0 or 1";
        }
        else
        {
            $validPhone = true;
        }
    }

    function ValidateEmail ($email, &$validEmail)
    {
        $email = trim($email);
        $expression = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        if (strlen($email) == 0)
        {
            return "Email Address field can not be blank.";
        }
        elseif (!preg_match($expression, $email)) 
        {
            return "Email must be in the form of aaa@xxx.yyy where aaa and xxx is a character (including dot “.”) string of any length, yyy is a 2 to 4 characters string.";
        }
        else
        {
            $validEmail = true;
        }
    }
    function ValidateCallTime($contact, $time, &$validCallTime)
    {
        if($contact == "Phone" && !isset($time))
        {
            return "If you choose to be contacted by phone, contact time field should be selected.";
        }
        else
        {
            $validCallTime = true;
        }
    }
    
?>
