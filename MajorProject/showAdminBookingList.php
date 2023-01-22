<?php 
  include("header.php");
?>
<div id='content'>
  <div id='parentDashboard'>
     <div id='leftDiv'>
         <?php 
           include("adminMenu.php");
         ?>
     </div><!--end of leftDiv-->
     <div id='rightDiv'>

      <?php
        include("dbConnect.php");

        $sql = " select * from car_info,area_info,booked_info where car_info.car_id=booked_info.car_id and area_info.area_id=booked_info.area_id ";
        $rsCar = mysqli_query($con,$sql) or die("Query Error");

        echo("<table border='1' >");
        $cnt = 1;

        echo("<tr>");

          echo("<th> Sl.No </th>");
          echo("<th> Name </th>");
          echo("<th> Car Details </th>");
          echo("<th> Car Running Areas </th>");
          echo("<th> Booked Date </th>");
          echo("<th> Start Date </th>");
          echo("<th> End Date </th>");
          echo("<th> Booking Status </th>");
          echo("<th> Trip Details </th>");
          
          echo("</tr>");
        while( $row = mysqli_fetch_array($rsCar) )
        {
          echo("<tr>");
          echo("<td>");
          echo($cnt++);
          echo("</td>");

          echo("<td>");
          echo($row["cust_user_name"]);
          echo("</td>");

          echo("<td>");
          echo(strtoupper($row["car_no"]));
          echo("<br>");
          $img = $row["image_path"];
          echo("<img src='.//collection//$img' width='100'>");
          echo("</td>");

          echo("<td>");
          echo($row["area_name"]);
          echo("</td>");

          echo("<td>");
          echo($row["booked_date"]);
          echo("</td>");

          echo("<td>");
          echo($row["start_date"]);
          echo("</td>");

          echo("<td>");
          echo($row["end_date"]);
          echo("</td>");

          echo("<td>");
          echo($row["booking_close_status"]);
          echo("</td>");

          echo("<td>");
          echo($row["remarks"]);
          echo("</td>");

          echo("</tr>");
        }

        echo("</table>");
      ?>

     </div><!--end of rightDiv-->
  </div><!--end of parentDashboard-->


</div><!--end of content--> 
<?php 
  include("footer.php");
?>
