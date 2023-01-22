<?php @session_start();
  include("header.php");
?>
<div id='content'>
  <div id='parentDashboard'>
     <div id='leftDiv'>
         <?php 
           include("vendorMenu.php");
         ?>
     </div><!--end of leftDiv-->
     <div id='rightDiv'>
        <?php
        
        include("dbCOnnect.php");
        $usr = $_SESSION["uname"];

        $sql = " select * from car_info , area_info , booked_info where car_info.car_id=booked_info.car_id and area_info.area_id=booked_info.area_id and car_info.created_by='$usr' ";
        $rsReq = mysqli_query($con,$sql) or die("Query Error");
        
       

        echo("<table border='1'>");

        echo("<tr>");
        echo("<th> Sl.No </th>");
        echo("<th> Name </th>");
        echo("<th> Car Details </th>");
        echo("<th> Trip Details </th>");
        echo("<th> Area </th>");
        echo("<th> Booked Date </th>");
        echo("<th> Start Date </th>");
        echo("<th> End Date </th>");
        echo("<th> Status </th>");
        
        echo("</tr>");

        $cnt = 1;
        while( $row = mysqli_fetch_array($rsReq) )
        {
          $id = $row["book_id"];
          echo("<tr>");

          echo("<td>");
          echo($cnt++);
          echo("</td>");

          echo("<td>");
          echo(strtoupper($row["cust_user_name"]));
          echo("</td>");

          echo("<td>");
          echo(strtoupper($row["car_no"]) . "<br> <br>");
          echo($row["car_company_model"] . "<br> <br>");
          $img = $row["image_path"];
          echo("<img src='.//collection//$img' width='150' height='100'>");
          echo("</td>");

          echo("<td>");
          echo($row["remarks"]);
          echo("</td>");

          echo("<td>");
          echo(strtoupper($row["area_name"]));
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
          
            if( isset( $_REQUEST["reqmsg"] ) )
            {
              if( $_REQUEST["reqmsg"] == 1 )
              {
                echo("Accepted");
              }
              else if( $_REQUEST["reqmsg"] == 2 )
                {
                  
                  echo("Rejected");
                }

            }

            else
              {
                echo("<a href='vendorBookedStatusUpdate.php?resmsg=1&bookId=$id'>Accept</a>&nbsp;&nbsp;|&nbsp;&nbsp;");
                echo("<a href='vendorBookedStatusUpdate.php?resmsg=2&bookId=$id'>Reject</a>");
              }
          
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
