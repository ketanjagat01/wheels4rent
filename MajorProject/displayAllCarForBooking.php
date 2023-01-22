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
       $rsCar=mysqli_query($con,"select * from car_info order by car_priority desc ");

       while($row=mysqli_fetch_array($rsCar))
       {
         echo("<div class='car_booking_div'>");
        echo(strtoupper($row["car_no"])."<br>");

        $img=$row["image_path"];
        echo("<img src='.\\collection\\$img' width='100' height='100' border='5'><br>");

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

 

</div><!--end of content--> 
<?php 
  include("footer.php");
?>
