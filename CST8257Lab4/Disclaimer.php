<?php 
    include("./Lab4Common/Header.php"); 
    include("./Lab4Common/Functions.php"); 
    
    $validTerms = false;
    session_start();
?>
<link rel="stylesheet" href="./Lab4Contents/Site.css">
<form name="Disclaimer" method="POST" action="<?php echo $_SERVER['PHP_SEFL'];?>">
    <div class="horizontal-margin">
        <h1 align="center">Terms and Conditions</h1>
        <br/>
        <table class="table-content">
            <tr class="table-content">
                <td>
                    I agree to abide by the Bank's Terms and Conditions and rules in force and the changes thereto in Terms and 
                    Conditions from time to time relating to my account as communicated and made available on the Bank's website.
                </td>
            </tr>
            <tr class="table-content">
              <td>
                  I agree that the bank before opening any deposit account, will carry out a due diligence as required under Know
                  Your Customer guidelines of the bank. I would be required to submit necessary documents or proofs, such as
                  identity, address, photograph and any such information. I agree to submit the above documents again at periodic
                  intervals, as may be required by the Bank.
              </td>
            </tr>
            <tr class="table-content">
              <td>
                  I agree that the Bank can at its sole discretion, amend any of the services/facilities given in my account either
                  wholly or partially at any time by giving me at least 30 days notice and/or provide an option to me to switch to
                  other services/facilities.
              </td>
            </tr>
        </table>
        <br/>
        <p class="error"><?php if(isset($_POST["start"])) { echo ValidateTerms($_POST["terms"], $validTerms); } ?></p>
        <input type="checkbox" name="terms" id="terms" /> I have read and agree with the terms and conditions
        <br/>
        <input type="submit" value="Start" name="start" id="start" class="distinct"/>
        <?php 
            if (isset($_POST["start"]) && $validTerms)
            {
                $_SESSION["terms"] = $_POST["terms"];
                header("Location: CustomerInfo.php");
            }
        ?>   
    </div>
</form>
<?php include('./Lab4Common/Footer.php'); ?>
