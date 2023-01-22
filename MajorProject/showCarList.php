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

        $sql = " select * from car_info ";
        $rsCar = mysqli_query($con,$sql) or die("Query Error");

        echo("<table border='1' >");
        $cnt = 1;

        echo("<tr>");
          echo("<th> Sl.No </th>");
          echo("<th> Car Company Model </th>");
          echo("<th> Car No. </th>");
          echo("<th> Car Image </th>");
          echo("<th> Car Running Areas </th>");
          echo("<th> Car Detail </th>");
          echo("<th> Price(/km) </th>");
          echo("<th> Price(/day) </th>");
          echo("<th> Registration date </th>");
          echo("<th> Car Priority </th>");
          
          echo("</tr>");
        while( $row = mysqli_fetch_array($rsCar) )
        {
          echo("<tr>");
          echo("<td>");
          echo($cnt++);
          echo("</td>");

          echo("<td>");
          echo($row["car_company_model"]);
          echo("</td>");

          echo("<td>");
          echo(strtoupper($row["car_no"]));
          echo("</td>");

          echo("<td>");
          $img = $row["image_path"];
          echo("<img src='.//collection//$img' width='100'>");
          echo("</td>");

          echo("<td>");
          echo("");
          echo("</td>");

          echo("<td>");
          echo($row["car_detail"]);
          echo("</td>");

          echo("<td>");
          echo($row["price_per_km"]);
          echo("</td>");

          echo("<td>");
          echo($row["price_per_day"]);
          echo("</td>");

          echo("<td>");
          echo($row["reg_date"]);
          echo("</td>");

          echo("<td>");
          echo($row["car_priority"]);
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
