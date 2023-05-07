<?php
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$newpin= $_POST['newpin'];
$pin=$_SESSION['Pin'];
$select_query="update card set card_pin=$newpin where card_pin=$pin";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php "Pin Change"; ?> </title>
        <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body style="background-image:url(img/atm4.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR><br><br> 
     
                <b>
                    <center><h4 style="color:black;font-family:algeria;font-size:50px">PIN IS SUCCESSFULLY UPDATED</h4></center><br><br>
                </b>
           
              
               
    <div class="container">
        <div class="padding">
        
            <center>  <a href="index.php" class="button"><b>Exit</b></a></center> <br><br><br> &emsp; 
                   
        </div>
    </div>
        
    
        
    </body>
</html>


