<?php @session_start(); ?>
<?php 
  include("header.php");
?>
<div id='content'>

    <?php 
       $x=$_REQUEST["cid"];
       include("dbConnect.php");
       $rsCar=mysqli_query($con,"select * from car_info where car_id='$x'");

       while($row=mysqli_fetch_array($rsCar))
       {
         echo("<div id='car_booking_div_detail'>");
          
         echo(strtoupper("Company: ".$row["car_company_model"])."<br>");

         echo(strtoupper("Model: ".$row["car_model_year"])."<br>");

         echo(strtoupper("Car No:".$row["car_no"])."<br>");

        $img=$row["image_path"];
        echo("<img src='.\\collection\\$img' width='300' height='250' border='5'><br>");

        echo("Price(/KM) :".$row["price_per_km"] ."<br>");

        echo("Price(/Day) :".$row["price_per_day"] ."<br>");

        //9413318526
        echo(strtoupper("Detail: ".$row["car_detail"])."<br>");



        $id=$row["car_id"];

  echo('<div id="CarAvailableForm.php">');
   echo('<form method="get" action="showAvailabilityStatus.php">');


      echo('AREA NAME : <select name="cmbCarArea">');
          $rsArea=mysqli_query($con,"select area_info.area_id,area_name from area_info,car_area_relation where area_info.area_id=car_area_relation.area_id and car_id='$x' order by area_name");
          echo("<option value='0'>Other</option>");
          while($row=mysqli_fetch_array($rsArea))
          {
              $id=$row["area_id"];
              echo("<option value='$id'>");
                echo($row["area_name"]);
              echo("</option>");
          }
      echo('</select>');
      



        
        ?>

          <input type="hidden" value='<?=$x?>' name='txtId'><br>
         Choose Start Date <input type="date" name="dtStart" min="<?php echo date('Y-m-d'); ?>"><br>
         Choose End Date <input type="date" name="dtEnd" min="<?php echo date('Y-m-d'); ?>"><br>
         

    


         <div id='btnGroup'>
         <input type="submit" value='Confirm Booking'>
        </div><!--end of btnGroup-->

        
        

        </form>
        </div>
<?php 

        
        

       }

   ?>
  
  

</div><!--end of content--> 
<?php 
  include("footer.php");
?>
