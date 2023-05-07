<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$pin=$_SESSION['Pin'];
$select_query="select account_type from account where "
        . "user_id=(select user_id from card where card_pin=$pin)";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row= mysqli_fetch_array($select_query_result);
$type="savings";
if($row['account_type']!=$type){
    echo"<script>
alert('You have a current account');
window.location.href='cash.php';
</script>";
}
else{
    $select_query="select balance from card where card_pin=$pin";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row= mysqli_fetch_array($select_query_result);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php "Savings Account"; ?> </title>
        <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body style="background-image:url(img/atm4.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR> 
    
                 
     <center>
        <div class="container">
            <div class="row">
                <div class="col-xs-10"><center>
                        <form method="post" action="savings1.php">
                    <div class="container">
            <div class="row">
                <br><BR> <h7 style="font-family: algeria;font-style:normal; color: black"> <b><div class="col-xs-2"> </div>
                        <div class="col-xs-15"><center><?php echo "ENTER THE AMOUNT TO WITHDRAW:"?></center> </div><br> </b></h7>
                             <br><input type="text" placeholder="Enter the amount to Withdraw"  class="form-control input-lg" name="cash"><br><br>
                 
                    
                 <input type="submit" class="button" value="Submit">&emsp;
                        <input type="submit" class="button" formaction="savings.php" value="Clear">
                            </form>
                          
                    </center>
            </div>
                    
                </div>
    </center>