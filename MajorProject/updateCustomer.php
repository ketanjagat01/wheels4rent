<?php @session_start();
 
 

 $a=$_REQUEST["txtName"];
 $b=$_REQUEST["txtEmail"];
 $c=$_REQUEST["txtMobile"];
 $d=$_REQUEST["txtAddress"];
 $usr=$_SESSION["uname"];
 $f=$_REQUEST["txtPassword"];
 $g=$_REQUEST["cmbType"];
 
 if($g=="Customer")
   $cn=1;
 else 
   $cn=0;  


     include("dbConnect.php");
     mysqli_query($con,"update user_info set cust_name='$a',cust_email='$b',cust_mobile='$c',cust_address='$d',user_pass='$f',user_type='$g',reg_date=now(),connect_status='$cn' where user_name='$usr' ");
     header("location:editProfileCustomer.php?resmsg=1");

 


?>