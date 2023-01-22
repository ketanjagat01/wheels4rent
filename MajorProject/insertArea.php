<?php  @session_start();
  $x=$_REQUEST["txtName"];
  $usr=$_SESSION["uname"];
  include("dbConnect.php");
  mysqli_query($con,"insert into area_info(area_name,reg_date,created_by) values('$x',now(),'$usr')") or die("Query Error");
  header("location:areaForm.php?resmsg=1");

?>