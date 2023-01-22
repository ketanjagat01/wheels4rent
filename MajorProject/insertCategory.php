<?php  @session_start();
  $x=$_REQUEST["txtName"];
  $usr=$_SESSION["uname"];
  include("dbConnect.php");
  mysqli_query($con,"insert into category_info(cat_name,reg_date,created_by) values('$x',now(),'$usr')") or die("Query Error");
  header("location:categoryForm.php?resmsg=1");

?>