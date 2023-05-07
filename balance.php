<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$pin=$_SESSION['Pin'];
$select_query="select a.first_name,a.last_name, b.account_number ,b.account_type,b.balance
    from user a, account b,card c
    where a.user_id=b.user_id and
    b.user_id=c.user_id and
    a.user_id=c.user_id and 
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
    <body style="background-image:url(img/atm4.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR> 
    <div class="container">
        <div class="row">
        
                <h7 style="font-family: algeria;font-style:normal; color: black;"><br><b><div class="col-xs-2">   </div>
                        <div class="col-xs-10"><?php echo  "NAME:"." ". $row['first_name']." ".$row['last_name']; ?></div><br></b></h7>
            </div>
            <div class="row">
                <h7 style="font-family: algeria;font-style:normal; color: black;"><br><b><div class="col-xs-2">   </div>
                        <div class="col-xs-10"><?php echo "ACCOUNT_NUMBER:"." ".$row['account_number']; ?> </div><br></b></h7>
            </div>
            <div class="row">
          
                 <h7 style="font-family: algeria;font-style:normal; color: black;"><br><b><div class="col-xs-2">   </div>
                         <div class="col-xs-10"><?php echo "ACCOUNT_TYPE:". " ".$row['account_type']; ?></div></b><br></h7>
                    
            </div>
            <div class="row">

                <h7 style="font-family: algeria;font-style:normal; color: black;"><br><b><div class="col-xs-2">  </div>
                        <div class="col-xs-10"><?php echo "BALANCE:" . " ".$row['balance']; ?></div><br></b></h7> </h7>
        </div>
                <tr>
                    
                    <td>
                        <a href="index.php" class="button"><b>Exit</b></a><br><br><br> &emsp;
                    </td>
                   
                </tr>
    
</div>
   
</body>
</html>

