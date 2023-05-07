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
<center>
       <div class="container">
            <div class="row">
                <div class="col-xs-4 col-lg-offset-4"><center>
                        <form method="post" action="admin1.php">
                 <b><br><br>
                    
                    <h4 style="font-family: algeria; color: white;font-size:30px"><b>ENTER ADMIN ID</b></h4>
                </b>
                            <br><input type="text" placeholder="Enter the admin id"  class="form-control input-lg" name="admin_id"><br>
 <b>
                    
                    <h4 style="font-family: algeria; color: black;font-size:30px"><b>ENTER ADMIN PIN</b></h4>
                </b>
                            <input type="password" placeholder="Enter the admin pin"  class="form-control input-lg" name="admin_pin"><br>
<b>
                    
                    <h4 style="font-family: algeria; color: black;font-size:30px"><b>ENTER ATM ID</b></h4>
                </b>
                            <input type="text" placeholder="Enter the atm_id"  class="form-control input-lg" name="atm_id"><br><br>
                 <input type="submit"  class="button" value="Submit">&emsp;
                      
                 <a  href="index.php" class="button"><b>Exit</b></a> <br><br><br> &emsp;
                        </form>
                        
                 </div>
                </div>
       </div>