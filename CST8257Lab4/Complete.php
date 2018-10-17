<?php 
    include("./Lab4Common/Header.php"); 
    include("./Lab4Common/Functions.php"); 
    
    session_start();
    
    if(!isset($_SESSION['name']))
    {
print <<<Mark
        <h3 style="text-indent: 50px">Thank you for using our deposit calculation tool.</h3>
Mark;
    }
    else
    {
        $timeselected = "";
        $firstOneTimeSelectedFlag = true;
        $name = $_SESSION['name'];
        $phone = $_SESSION['phone'];
        $email = $_SESSION['email'];
        $contact = $_SESSION['contact'];
            
        if ($contact == "Phone")
        {
            foreach ($_SESSION['time'] as $selected)
            {
                if ($firstOneTimeSelectedFlag == true)
                {
                    $timeselected .= $selected;
                    $firstOneTimeSelectedFlag = false;
                }
                else
                {
                    $timeselected .= " or " . $selected;
                }                        
            }
print <<<Mark
        <h3 style="text-indent: 50px">Thank you, <span class="distinct">$name</span>, for using our deposit calculation tool.</h3>
        <p style="text-indent: 50px">Our customer service department will call you tomorrow $timeselected at $phone.</p>
Mark;
        }
        else if ($contact == "Email")
        {
print <<<Mark
        <h3 style="text-indent: 50px">Thank you, <span class="distinct">$name</span>, for using our deposit calculation tool.</h3>
        <p style="text-indent: 50px">An email about the details of our GIC has been sent to $email.</p>
Mark;
        }
    }
    
    session_destroy();
?>


<?php include('./Lab4Common/Footer.php'); ?>