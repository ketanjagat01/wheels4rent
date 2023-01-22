<?php @session_start();
$a=$_REQUEST["txtCarNo"];
$b=$_REQUEST["txtCompany"];
$c=$_REQUEST["txtYear"];
$d=$_REQUEST["cmbCatType"];
$e=$_FILES["flImage"];
$img=$e["name"];
$f=$_REQUEST["txtDetail"];
$g=$_REQUEST["txtPriceKm"];
$h=$_REQUEST["txtPriceDay"];

$usr=$_SESSION["uname"];
move_uploaded_file($e["tmp_name"],".\\collection\\$img");

include("dbConnect.php");
$sql="insert into car_info(car_no,car_company_model,car_model_year,cat_type_id,image_path,car_detail,price_per_km,price_per_day,reg_date,created_by) values('$a','$b','$c','$d','$img','$f','$g','$h',now(),'$usr')";


mysqli_query($con,$sql) or die("Query Error");


$rscar=mysqli_query($con,"select max(car_id) from car_info");
$row=mysqli_fetch_array($rscar);
$carid=$row[0];

$areas=$_REQUEST["cmbCarArea"];
foreach($areas as $ar)
{
    mysqli_query($con,"insert into car_area_relation(car_id,area_id) values('$carid','$ar')");
}



header("location:carForm.php?resmsg=1");



?>