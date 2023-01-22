<?php 
  include("header.php");
?>
<div id='content'>
  <div id='parentDashboard'>
     <div id='leftDiv'>
         <?php 
           include("customerMenu.php");
         ?>
     </div><!--end of leftDiv-->
     <div id='rightDiv' >
     <div id='tabDisplay' style='padding:10px;'>
     <table border="1">
       <tr>
      <th>Sl. No.</th> 
      <th>Car Detail</th> 
      <th>Area</th> 
      <th>Start Date</th>     
      <th>End Date</th> 
      <th>Journey Detail</th> 
      <th>Status</th> 

      <th>Booking Date</th> 

       </tr>
     <?php 
         include("dbConnect.php");
         $usr=$_SESSION["uname"];

         $rsInfo=mysqli_query($con,"select * from car_info,booked_info,area_info where area_info.area_id=booked_info.area_id and car_info.car_id=booked_info.car_id and booked_info.cust_user_name='$usr'") or die("query error");

         
          $cnt = 1;
         while($row=mysqli_fetch_array($rsInfo))
        {
          echo("<tr>");
          echo("<td>");
          echo($cnt++);
          echo("</td>");
          echo("<td>");
          $img=$row["image_path"];
          echo($row["car_no"]."<br>".
          "<img src='.\\collection\\$img' width='100'>");
          echo("</td>");
          echo("<td>");
          echo($row["area_name"]);
          echo("</td>");
          echo("<td>");
          echo($row["start_date"]);
          echo("</td>");
          echo("<td>");
          echo($row["end_date"]);
          echo("</td>");
          echo("<td>");
          echo($row["remarks"]);
          echo("</td>");
          echo("<td>");
          echo($row["booking_close_status"]);
          echo("</td>");
          echo("<td>");
          echo($row["booked_date"]);
          echo("</td>");
          


          echo("</tr>");
        }
         

?>

      </table>
     </div><!--end of tabDisplay-->

     </div><!--end of rightDiv-->
  </div><!--end of parentDashboard-->


</div><!--end of content--> 
<?php 
  include("footer.php");
?>
