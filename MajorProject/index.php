<?php 
  include("header.php");
?>
<div id='content'>
  <div id='loginDiv'>
    <a href='userRegistrationForm.php'>New User </a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href='loginForm.php'>Login </a>
  </div><!--end of loginDiv-->

  <div id='carArea'>
    <?php 
       include("dbConnect.php");
       $rsCar=mysqli_query($con,"select * from car_info order by car_priority desc limit 6");

       while($row=mysqli_fetch_array($rsCar))
       {
         echo("<div class='car_booking_div'>");
        echo(strtoupper($row["car_company_model"])."<br>");

        $img=$row["image_path"];
        echo("<img src='.\\collection\\$img' width='200' height='150' border='5'><br>");

        echo("Price(/KM) :".$row["price_per_km"] ."<br>");

        echo("Price(/Day) :".$row["price_per_day"] ."<br>");

        //9413318526

        $id=$row["car_id"];

        echo("<div id='bookingRequest'>");
        echo("<a href='bookingRequestForm.php?cid=$id'>Booking Request</a>");
        echo("</div>");
        
        echo("</div>");
       }

   ?>
  
  </div><!--end of carArea-->
  <div style="text-align:center;font-size:20px;color:#7241FF;font-weight:bold;margin:20px 0px">
  <a href="displayAllCarForBooking.php">Show More</a>
  </div>
</div><!--end of content--> 
<?php 
  include("footer.php");
?>
