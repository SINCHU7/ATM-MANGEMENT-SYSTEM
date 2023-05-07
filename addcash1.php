<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$admin_cash=$_POST['admin_amount'];
$atm_id=$_SESSION['atm_id'];
$select_query="update atm set available_cash=available_cash+$admin_cash where atm_id=$atm_id";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$select_query="select available_cash from atm where atm_id=$atm_id";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);
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
 
                <b>
                    <center><h4 style="font-family: algeria; color: yellow"><b>TRANSACTION SUCCESSFUL</b></h4></center>
                </b>
           
               
 
          <h7 style="font-family: algeria;font-style:normal; color: yellow" ><br> <b><div class="col-xs-2"> </div>
                        <div class="col-xs-10"><center><?php echo "AVAILABLE CASH:"." ". $row['available_cash']; ?></center> </div><br><br></b></h7> 
             
<div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <br><Br>    <a href="index.php" class="button"><b>Exit</b></a> <br> &emsp;</center>
    </div>
            </div>
            </div>
</body>
</html>