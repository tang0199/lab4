<?php 
    include("./Lab4Common/Header.php"); 
    include("./Lab4Common/Functions.php"); 
    
    session_start();
    
    if(!isset($_SESSION['customerInfoPass']))
    {
        header("Location: CustomerInfo.php");
        exit();
    }
    
    $pamount = $_POST['pamount'];
    $rate = $_POST['rate'];
    $years = $_POST['years'];
    $btnSubmit = $_POST['btnSubmit'];
    $btnClear = $_POST['btnClear'];
    
    $validPrincipal = false;
    $validRate = false;
    $validYears = false;
    
    if (isset($btnClear))
    {
        $pamount = "";
        $rate = "";
        $years = "0";
    }
?>

<link rel="stylesheet" href="./Lab4Contents/Site.css">
<form name="CustomerInfo" method="POST" action="<?php echo $_SERVER['PHP_SEFL'];?>">
    <div class="horizontal-margin"> 
        <h4>Enter principal amount, interest rate and select number of years of deposit</h4>
        <br/>
        <table cellpadding="10">
            <tr>
                <td height="30">Principal Amount:<br/></td>
                <td height="30"><input type = "text" name = "pamount" value = "<?php echo $pamount; ?>"><br/></td>
                <td height="30" class='error'><?php if(isset($btnSubmit)) { echo ValidateName($pamount, $validPrincipal); } ?><br/></td>
            </tr>
            <tr>
                <td height="30">Interest Rate (%):<br/></td>
                <td height="30"><input type = "text" name = "rate" value = "<?php echo $rate; ?>"><br/></td>
                <td height="30" class='error'><?php if(isset($btnSubmit)) { echo ValidateRate($rate, $validRate); } ?><br/></td>
            </tr>
            <tr>
                <td height="30">Years to Deposit:<br/></td>
                <td height="30">
                    <select id = "years" name = "years"/>
                    <option value="0">0</option>
                    <option value="1"  <?php echo (isset($years) && $years == '1')?'selected="selected"':'';  ?> >1</option>
                    <option value="2"  <?php echo (isset($years) && $years == '2')?'selected="selected"':'';  ?> >2</option>
                    <option value="3"  <?php echo (isset($years) && $years == '3')?'selected="selected"':'';  ?> >3</option>
                    <option value="4"  <?php echo (isset($years) && $years == '4')?'selected="selected"':'';  ?> >4</option>
                    <option value="5"  <?php echo (isset($years) && $years == '5')?'selected="selected"':'';  ?> >5</option>
                    <option value="6"  <?php echo (isset($years) && $years == '6')?'selected="selected"':'';  ?> >6</option>
                    <option value="7"  <?php echo (isset($years) && $years == '7')?'selected="selected"':'';  ?> >7</option>
                    <option value="8"  <?php echo (isset($years) && $years == '8')?'selected="selected"':'';  ?> >8</option>
                    <option value="9"  <?php echo (isset($years) && $years == '9')?'selected="selected"':'';  ?> >9</option>
                    <option value="10" <?php echo (isset($years) && $years == '10')?'selected="selected"':''; ?> >10</option>
                    <option value="11" <?php echo (isset($years) && $years == '11')?'selected="selected"':''; ?> >11</option>
                    <option value="12" <?php echo (isset($years) && $years == '12')?'selected="selected"':''; ?> >12</option>
                    <option value="13" <?php echo (isset($years) && $years == '13')?'selected="selected"':''; ?> >13</option>
                    <option value="14" <?php echo (isset($years) && $years == '14')?'selected="selected"':''; ?> >14</option>
                    <option value="15" <?php echo (isset($years) && $years == '15')?'selected="selected"':''; ?> >15</option>
                    <option value="16" <?php echo (isset($years) && $years == '16')?'selected="selected"':''; ?> >16</option>
                    <option value="17" <?php echo (isset($years) && $years == '17')?'selected="selected"':''; ?> >17</option>
                    <option value="18" <?php echo (isset($years) && $years == '18')?'selected="selected"':''; ?> >18</option>
                    <option value="19" <?php echo (isset($years) && $years == '19')?'selected="selected"':''; ?> >19</option>
                    <option value="20" <?php echo (isset($years) && $years == '20')?'selected="selected"':''; ?> >20</option>     
                </td>
                <td height="30" class = "error"><?php if(isset($btnSubmit)) {echo ValidteYears($years, $validYears);} ?></td>
            </tr>
        </table>
        <br/>
        <!-- create a submit button -->
        <input type="submit" value="Submit" name="btnSubmit" class ="distinct" />
        <input type="submit" value="Clear" name="btnClear" class ="distinct" />
    </div>
</form>

<?php 
    if(isset($btnSubmit))
    {
        ValidatePrincipal($pamount, $validPrincipal);
        ValidateRate($rate, $validRate);
        ValidteYears($years, $validYears);
        
        if($validPrincipal && $validRate && $validYears)
        {
print <<<Mark
            <br/><br/>
            <div class="horizontal-margin">
            <p>Following is the result of the calculation:</p>
            <table border="1">
            <tr><th>Year</th><th>Principal at Year Start</th><th>Interest for the Year</th></tr>
            </div>
Mark;
            $runningPamount = $pamount;
            for($i = 1; $i <= $years; ++$i)
            {
                $interest = $runningPamount * $rate * 0.01;
                printf ("<tr><td>%s</td><td>\$%.2f</td><td>\$%.2f</td></tr>", $i, $runningPamount, $interest);
                $runningPamount += $interest;
            }

            echo "</table>";
            echo "</br></br>";
        }
    }
            
    include('./Lab4Common/Footer.php'); 
?>