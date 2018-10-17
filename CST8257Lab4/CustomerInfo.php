<?php 
    include("./Lab4Common/Header.php"); 
    include("./Lab4Common/Functions.php"); 
    
    session_start();
    
    if(!isset($_SESSION["terms"]))
    {
        header("Location: Disclaimer.php");
        exit();
    }
    
    $validName = false;
    $validPostal = false;
    $validPhone = false;
    $validEmail = false;
    $validCallTime = false;
    
    if(isset($_POST['btnSubmit']))
    {
        ValidateName($_POST['name'], $validName);
        ValidatePostal($_POST['postal'], $validPostal);
        ValidatePhone($_POST['phone'], $validPhone);
        ValidateEmail($_POST['email'], $validEmail);
        ValidateCallTime($_POST['contact'], $_POST['time'], $validCallTime);
        
        if($validName && $validPostal && $validPhone && $validEmail && $validCallTime)
        {
            if (!isset($_SESSION['customerInfoPass']))
            {
                $_SESSION['customerInfoPass'] = true;
            }
            
            if(!isset($_SESSION['name']))
            {
                $_SESSION['name'] = $_POST['name'];
            }
            
            if(!isset($_SESSION['phone']))
            {
                $_SESSION['phone'] = $_POST['phone'];
            }
            
            if(!isset($_SESSION['email']))
            {
                $_SESSION['email'] = $_POST['email'];
            }
            
            if(!isset($_SESSION['contact']))
            {
                $_SESSION['contact'] = $_POST['contact'];
            }
            
            if(!isset($_SESSION['time']))
            {
                $_SESSION['time'] = $_POST['time'];
            }
            
            header("Location: DepositCalculator.php");
        }
    }
    
    if (isset($_POST['btnClear']))
    {
        $_POST['name'] = "";
        $_POST['postal'] = "";
        $_POST['phone'] = "";
        $_POST['email'] = "";
        $_POST['contact'] = "Phone";
    }
?>

<link rel="stylesheet" href="./Lab4Contents/Site.css">
<form name="CustomerInfo" method="POST" action="<?php echo $_SERVER['PHP_SEFL'];?>">
    <div class="horizontal-margin"> 
        <h1>Customer Information</h1>
        <br/>
        <table>
            <tr>
                <td height="30">Name:<br/></td>
                <td height="30"><input type = "text" name = "name" value = "<?php echo $_POST['name']; ?>"></td>
                <td height="30" class='error'><?php if(isset($_POST['btnSubmit'])) { echo ValidateName($_POST['name'], $validName); } ?></td>
                <br/>
            </tr>
            <tr>
                <td height="30">Postal Code:<br/></td>
                <td height="30"><input type = "text" name = "postal" value = "<?php echo $_POST['postal']; ?>"></td>
                <td height="30" class='error'><?php if(isset($_POST['btnSubmit'])) { echo ValidatePostal($_POST['postal'], $validPostal); } ?></td>
            </tr>
            <tr>
                <td height="30">Phone Number:<br/>(nnn-nnn-nnnnn)</td>
                <td height="30"><input type = "text" name = "phone" value = "<?php echo $_POST['phone']; ?>"></td>
                <td height="30" class='error'><?php if(isset($_POST['btnSubmit'])) { echo ValidatePhone($_POST['phone'], $validPhone); } ?></td>
            </tr>
            <tr>
                <td height="30">Email Address:<br/></td>
                <td height="30"><input type = "text" name = "email" value = "<?php echo $_POST['email']; ?>"></td>
                <td height="30" class='error'><?php if(isset($_POST['btnSubmit'])) { echo ValidateEmail($_POST['email'], $validEmail); } ?></td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td height="30">Preferred Contact Method:
                    <input type = "radio" name = "contact" value = "Phone" <?php echo (!isset($_POST['contact']) || (isset($_POST['contact']) && $_POST['contact'] == 'Phone'))?'checked="checked"':'';  ?> />Phone		  
                    <input type = "radio" name = "contact" value = "Email" <?php echo (isset($_POST['contact']) && $_POST['contact'] == 'Email')?'checked="checked"':'';  ?> />Email
                </td>
            </tr>
            <tr>
                <td>If phone is selected, when can we contact you? </br> (check all applicable)
                </td>
            </tr>
            <tr>
                <td height="30">
                    <input type = "checkbox" name = "time[]" value ="Morning" <?php if(isset($_POST['btnClear'])) {echo '';} elseif(isset($_POST['time'])) { echo (in_array('Morning', $_POST['time']))?'checked="checked"':''; }  ?> />Morning
                    <input type = "checkbox" name = "time[]" value = "Afternoon" <?php if(isset($_POST['btnClear'])) {echo '';} elseif(isset($_POST['time'])) { echo (in_array('Afternoon', $_POST['time']))?'checked="checked"':''; }  ?> />Afternoon
                    <input type = "checkbox" name = "time[]" value = "Evening" <?php if(isset($_POST['btnClear'])) {echo '';} elseif(isset($_POST['time'])) { echo (in_array('Evening', $_POST['time']))?'checked="checked"':''; }  ?> />Evening
                </td>
                <td height="30" class = 'error'><?php if(isset($_POST['btnSubmit'])) { echo ValidateCallTime($_POST['contact'], $_POST['time'], $validCallTime); } ?></td>
            </tr>
        </table>
        <br/>
        <!-- create a submit button -->
        <input type="submit" value="Submit" name="btnSubmit" class ="distinct" />
        <input type="submit" value="Clear" name="btnClear" class ="distinct" />
    </div>
</form>

<?php include('./Lab4Common/Footer.php'); ?>
