<?php

$con= mysqli_connect("localhost", "root", "", "atm")or die(mysqli_errno($con));
session_start();
$pin=$_SESSION['Pin'];
$select_query="select a.first_name,a.last_name, b.account_number ,b.account_type,c.balance,d.transaction_date,d.transaction_id, e.bank_name,e.branch_location,d.amount,d.remark
    from user a, account b,card c, transaction d, bank e,logs f
    where a.user_id=b.user_id and
    b.user_id=c.user_id and
    a.user_id=c.user_id and
    d.user_id=b.user_id and
	
    e.account=b.account_number and
    c.card_pin=$pin;";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row= mysqli_fetch_array($select_query_result);


?>
<!DOCTYPE html>
<html>
    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php "Balanace Enquiry"; ?> </title>
        <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <body style="background-image:url(img/a44.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
       




<style>
    @media print {
        /* hide every other ele */
        body * {
            visibility: hidden;
        }

        /* then display prnt container ele */
        .print-container, .print-container * {
            visibility: visible;
        }
 
    }

</style>
<button onclick="window.print();">Print

</button>


<center><a href="index.php" class="button">Exit</a></center>
 
<div class="container1 print-container">
<center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> 
     <div class="row">
         <h7 style="font-family: algeria;font-style:normal; color: black;font-size:18px"><br><b><div class="col-xs-2"></div>
		 
                        
            <div class="row">
                <h7 style="font-family: algeria;font-style:normal; color: black;font-size:18px"><br><b><div class="col-xs-2"> </div>
                        <div class="col-xs-10"><?php echo"ACCOUNT NUMBER:"." ". $row['account_number']; ?> </div><br></b></h7>
            </div>
    <div class="row">
          
                        <h7 style="font-family: algeria; font-style:normal;color: black;font-size:18px"><br><b><div class="col-xs-2"> </div>
                                <div class="col-xs-10"><?php echo "ACCOUNT TYPE:"." ".$row['account_type']; ?></div></b><br></h7>
                    
            </div>
            <div class="row">
               <h7 style="font-family: algeria; font-style:normal;color: black;font-size:18px"><br><b><div class="col-xs-2"></div>
                        <div class="col-xs-10"><?php echo"BALANCE:"." ". $row['balance']; ?> </div></b></h7> </h7>
        </div>
    <div class="row">
        <h7 style="font-family: algeria; font-style:normal;color: black;font-size:18px"><b><br><div class="col-xs-2"> </div> 
           <div class="col-xs-10"><?php echo"TRANSACTION DATE:"." ". $row["transaction_date"]; ?> </div></b><br></h7> 
        </div>
		<div class="row">
        <h7 style="font-family: algeria;font-style:normal; color: BLACK;font-size:18px;"><br><b><div class="col-xs-2"></div>
          <div class="col-xs-10"><?php echo "TRANSACTION NO.:"." ".  $row["transaction_id"]; ?> </div></b></h7> 
        </div>
    
    <div class="row">
        <h7 style="font-family: algeria; font-style:normal;color: black;font-size:18px"><br><b><div class="col-xs-2"></div>
          <div class="col-xs-10"><?php echo"BANK NAME:"." ". $row["bank_name"]; ?> </div><br></b></h7> 
        </div>
    <div class="row">
        <h7 style="font-family: algeria;font-style:normal; color: BLACK;font-size:18px;"><br><b><div class="col-xs-2"></div>
          <div class="col-xs-10"><?php echo "BRANCH LOCATION:"." ".  $row["branch_location"]; ?> </div></b></h7> 
        </div>
		<div class="row">
        <h7 style="font-family: algeria;font-style:normal; color: BLACK;font-size:18px;"><br><b><div class="col-xs-2"></div>
          <div class="col-xs-10"><?php echo "RECENT TRANSACTION:"." ".  $row["amount"]." ". $row["remark"]; ?> </div></b></h7> 
        </div>
		
		 <br><br>
        
        
</div>