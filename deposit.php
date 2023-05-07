<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$pin=$_SESSION['Pin'];
$cash=$_POST['cash'];


	$select_query="update account set balance=balance+$cash where user_id in"
        . " (select user_id from card where card_pin=$pin)";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$select_query1="update transaction set transaction_date=CURRENT_TIMESTAMP where user_id in"
        . " (select user_id from card where card_pin=$pin)";
$select_query_result1= mysqli_query($con, $select_query1) or die(mysqli_error($con));
$select_query2="update transaction set amount=$cash where user_id in"
        . " (select user_id from card where card_pin=$pin)";
$select_query_result1= mysqli_query($con, $select_query2) or die(mysqli_error($con));
$select_query4="update transaction set remark='DEPOSIT' where user_id in"
        . " (select user_id from card where card_pin=$pin)";
$select_query_result1= mysqli_query($con, $select_query4) or die(mysqli_error($con));
		
		
		
		
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
    <body style="background-image:url(img/atm8.png)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR> 
 
     <div class="container">
        <div class="padding">
    <table>
            <tbody>
            <th><h1 style="font-family: algeria; color:black;font-size:35px">
                    <br> <b>TRANSACTION SUCCESSFUL.</b><br><br><br>
					 
                </h1>
            </th>
                <tr>
                    <td>
                        <a href="balance.php" class="button"><b>View my Balance</b></a> <br><br><br>  &ensp; 
                    </td>
                    
                </tr>
 <tr>
<td>
                        <a href="index.php" class="button"><b>Exit</b></a><br><br><br> &ensp;
                    </td>
 </tr>
        </div>
     </div>
    </body>
    </html>