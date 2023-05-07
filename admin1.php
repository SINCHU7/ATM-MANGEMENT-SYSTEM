<?php 
$con= mysqli_connect("localhost", "root", "", "atm")
         or die(mysqli_errno($con));
session_start();
$admin_id=$_POST['admin_id'];
$_SESSION['admin_id']=$admin_id;
$admin_pin=$_POST['admin_pin'];
$atm_id=$_POST['atm_id'];
$_SESSION['atm_id']=$atm_id;
$select_query="select admin_id, admin_pin from admin where admin_id=$admin_id and admin_pin=$admin_pin";
$select_query="select a.atm_id,a.atm_location,a.available_cash from atm a where atm_id=$atm_id";
$select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
$num = mysqli_num_rows($select_query_result);
    if ($num == 0) {
        echo"<script>
alert('Incorrect Id or Pin');
window.location.href='admin.php';
</script>";
} else {  
  $row = mysqli_fetch_array($select_query_result);
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
    <body style="background-image:url(img/atm9.jpg)">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
     <center> <h1 style="font-family: algeria; color: black;font-size:70px"><b>SKV BANK ATM</b></h1></center> <br><BR> 
<div class="container">
     <div class="row">
<br><br><br><br>
        <h7 style="font-family: algeria;font-style:normal; color: black"> <b><div class="col-xs-2"> </div>
                        <div class="col-xs-10"><center><?php echo  "ATM ID:"." ". $row['atm_id']; ?> </center></div><br><br></b></h7>
            </div>
			
            <div class="row">
                <h7 style="font-family: algeria;font-style:normal; color: black"> <b><div class="col-xs-2"> </div>
                        <div class="col-xs-10"><center><?php echo "ATM LOCATION:"." ".$row['atm_location']; ?></center> </div><br><br></b></h7>
            </div>
    <div class="row">
          
                        <h7 style="font-family: algeria; font-style:normal;color: black"> <b><div class="col-xs-2">  </div>
                                <div class="col-xs-10"><center><?php echo "AVAILABLE CASH:"." ".$row['available_cash']; ?></center></div></b><br><br></h7><br><br>
                    
            </div>
            
<div class="container">
        <div class="padding">
        <table>
            <tbody>
            <th><h1 style="font-family: algeria; color:yellow;font-size:40px">
                        <center>ADMIN OPTIONS</center><br>
                </h1>
            </th>
                <tr>
                    <td>
                        <a href="addcash.php" class="button"><b>Add cash</b></a> <br><br><br> &emsp; 
                    </td>
                    
                </tr>
                
          
            </tbody>
        </table>
    </div>
    </div>
            
</body>
    </html>