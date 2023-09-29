<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   
    </head>
    <body>
<?php
 $emailmsg="";
 $passmsg="";
 
 $admailmsg="";
 $adpassmsg="";


 if(!empty($_REQUEST['admailmsg'])){
    $admailmsg=$_REQUEST['admailmsg'];
 }

 if(!empty($_REQUEST['adpassmsg'])){
    $adpassmsg=$_REQUEST['adpassmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $passmsg=$_REQUEST['pasdmsg'];
}

 ?>

  
<div class="container login-container">

            <div class="row">
 
                <div class="col-md-6 login-form-2">
                    <h3>Admin Login</h3>
                    <form action="admin_login_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                        </div>
                        <Label style="color:red"><?php echo $admailmsg?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_password"  placeholder="Your Password *" value="" />
                        </div>
                        <Label style="color:red"><?php echo $adpassmsg?></label>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-1">
                    <h3>Student/Teacher Login</h3>
                    <form action="student_login_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email" value="" />
                        </div>
                        <Label style="color:red"><?php echo $emailmsg?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password" value="" />
                        </div>
                        <Label style="color:red"><?php echo $passmsg?></Label>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
            </div>


          
    </body>
</html>




