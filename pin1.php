<?php 
 $con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
 session_start();
$pin= $_POST['Pin'];
$_SESSION['Pin']=$pin;
$select_query="select a.first_name,a.last_name, b.account_number from user a, account b "
        . "where b.user_id = a.user_id and a.user_id in"
        . " (select user_id from account where user_id="
        . "(select user_id from card where card_pin=$pin)) ";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$num= mysqli_num_rows($select_query_result);
if($num==0){
    
    echo "<script>
alert('Incorrect Pin');
window.location.href='pin.php'; 
</script>";
}
else{
    $row= mysqli_fetch_array($select_query_result);
    }
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
    <body style="background-image:url(img/atm4.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <BR> 
    
                     <center><h7 style="font-family: algeria;font-style:normal; color: black;"><br><Br><b> <?php echo "NAME:"." ".$row['first_name'] . " ". $row['last_name']; ?></b> </h7></center>
                     <center><h7 style="font-family: algeria;font-style:normal; color: black;"><br><Br><b><?php echo "ACCOUNT_NUMBER:"." ".$row['account_number']; ?></b><br><br></h7></div></center>
                 
    <div class="container">
        <div class="padding">
        <table>
            <tbody>
            <center><th> <h1 style="font-family: algeria; color: black;"><center><b>PLEASE SELECT TYPE OF OPERATION</b></center> <br><br>
                        
                </h1>
            </th></center>
                <tr>
                    <td>
                        <a href="balance.php" class="button"><b>Balance Enquiry</b></a> <br><br><br> &emsp; 
                    </td>
                    <td>
                        <a href="cash.php" class="button"><b>Cash Withdrawal</b></a><br><br><br> &emsp;
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        <a href="pinchange.php" class="button"><b>Pin Change</b></a><br><br><br>&emsp;
                    </td>
                    <td>
                        <a href="fastcash.php" class="button"><b>Fast Cash</b></a><br><br><br>&emsp;
                </td>
                </tr>
                 <tr>
                    <td>
                        <a href="mini.php" class="button"><b>Mini-Statement</b></a><br><br><br>&emsp;
                    </td>
                    <td>
					<a href="fundtransfer.php" class="button"><b>Funds Transfer</b></a><br><br><br>&emsp;
                        
                    </td>

                </tr>
<tr>
                      
<td>
           <a href="index.php" class="button"><b>Exit</b></a><br><br><br> &emsp;             
                </td>
				<td>
				<a href="deposit1.php" class="button"><b>deposit</b></a><br><br><br> &emsp;
				</td>
</tr>
                
          
            </tbody>
        </table>
    </div>
    </div>
            
</body>
    </html>
     
