<?php  @session_start();
  $a=$_REQUEST["cmbCarArea"];
  $b=$_REQUEST["txtId"];
  $c=$_REQUEST["dtStart"];
  $d=$_REQUEST["dtEnd"];
  $usr=$_SESSION['uname'];

  $e=$_REQUEST['txtDetail'];

  include("dbConnect.php");

  $sql="insert into booked_info(cust_user_name,car_id,booked_date,area_id,start_date,end_date,booking_close_status,remarks) values('$usr','$b',now(),'$a','$c','$d','pending','$e')";
  mysqli_query($con,$sql) or die("Query Error");

  header("location:customerChoice.php");
?>