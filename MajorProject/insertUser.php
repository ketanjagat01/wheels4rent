<?php 
 
 $a=$_REQUEST["txtName"];
 $b=$_REQUEST["txtEmail"];
 $c=$_REQUEST["txtMobile"];
 $d=$_REQUEST["txtAddress"];
 $e=$_REQUEST["txtUser"];
 $f=$_REQUEST["txtPassword"];
 $g=$_REQUEST["cmbType"];
 
 if($g=="Customer")
   $cn=1;
 else 
   $cn=0;  


 include("dbConnect.php");
 $rsUser=mysqli_query($con,"select * from user_info where user_name='$e'");
 if(mysqli_num_rows($rsUser)==1)
 {
    header("location:userRegistrationForm.php?resmsg=2");
 }
 else 
 {
     mysqli_query($con,"insert into user_info(cust_name,cust_email,cust_mobile,cust_address,user_name,user_pass,user_type,reg_date,connect_status) values('$a','$b','$c','$d','$e','$f','$g',now(),'$cn')");
     header("location:userRegistrationForm.php?resmsg=1");

 }


?>