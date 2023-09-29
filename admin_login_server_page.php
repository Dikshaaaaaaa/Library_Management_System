<?php
include("data_class.php");
$login_email=$_GET['login_email'];
$login_password=$_GET['login_password'];
if($login_email==null || $login_password==null)
{  
    $emessage="";
    $pmessage="";
    if($login_password==null)
    {    
    $pmessage="Password is empty";
    }
    if($login_email==null)
    {
        $emessage="Email cannot be blank";
    
    }  
      header("Location:index.php?admailmsg=$emessage&adpassmsg=$pmessage");      

}
else if($login_email!=null && $login_password!=null)
{
$obj=new data();
$obj->setconnection();
$obj->adminLogin($login_email,$login_password);
}
?>
