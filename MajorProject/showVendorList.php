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

        $sql = " select * from user_info where user_type='Vendor' order by cust_name " ;
        $rsVendor = mysqli_query($con,$sql) or die("Query Error");

        echo("<table border='1'>");
        $cnt = 1;

        echo("<tr>");
          echo("<th> Sl.No </th>");
          echo("<th> Name </th>");
          echo("<th> Email </th>");
          echo("<th> Mobile </th>");
          echo("<th> Registration date </th>");
          
          echo("</tr>");
        while( $row = mysqli_fetch_array($rsVendor) )
        {
          echo("<tr>");
          echo("<td>");
          echo($cnt++);
          echo("</td>");

          echo("<td>");
          echo($row["cust_name"]);
          echo("</td>");

          echo("<td>");
          echo($row["cust_email"]);
          echo("</td>");

          echo("<td>");
          echo($row["cust_mobile"]);
          echo("</td>");

          echo("<td>");
          echo($row["reg_date"]);
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
