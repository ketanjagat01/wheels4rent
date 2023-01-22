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

        $sql = " select * from category_info " ;
        $rsCat = mysqli_query($con,$sql) or die("Query Error");

        echo("<table border='1'>");
        $cnt = 1;

        echo("<tr>");
          echo("<th> Sl.No </th>");
          echo("<th> Category name </th>");
          echo("<th> Created By </th>");
          echo("<th> Registration date </th>");
          
          echo("</tr>");
        while( $row = mysqli_fetch_array($rsCat) )
        {
          echo("<tr>");
          echo("<td>");
          echo($cnt++);
          echo("</td>");

          echo("<td>");
          echo($row["cat_name"]);
          echo("</td>");

          echo("<td>");
          echo($row["created_by"]);
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
