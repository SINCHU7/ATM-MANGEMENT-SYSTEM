<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$atm_id=$_SESSION['atm_id'];
$admin_id=$_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php "Transaction page"; ?> </title>
        <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <body style="background-image:url(img/a10.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
                   <center> <h1 style="font-family: algeria; color: red;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR><br><br>
<center>
       <div class="container">
            <div class="row">
                <div class="col-xs-4 col-lg-offset-4"><center>
                        <form method="post" action="addcash1.php">
<br><br>
<h4 style="font-family: algeria; color: black;font-size:30px"><b>ENTER THE AMOUNT </b></h4>
                            <br><Br> <input type="text" placeholder="Enter the amount"  class="form-control input-lg" name="admin_amount"><br><br>
                          
                 <input type="submit"  class="button" value="Submit">&emsp;
                      
                 <a  href="index.php" class="button"><b>Exit</b></a> <br><br><br> &emsp;
                        </form>
                        
                 </div>
                </div>
       </div>
