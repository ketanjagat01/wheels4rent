<?php 
  include("header.php");
?>
<div id='content'>
<?php 
  $a=$_REQUEST["cmbCarArea"];
  $b=$_REQUEST["txtId"];
  $c=$_REQUEST["dtStart"];
  $d=$_REQUEST["dtEnd"];

  include("dbConnect.php");

  $sql="select * from booked_info where car_id='$b' and (('$c' between start_date and end_date) or ('$c'<=start_date and '$d'>=start_date) )";

  $rsCar=mysqli_query($con,$sql) or die("Query Error");

  echo("<div id='car_booking_div_detail'><h1>");

  if(mysqli_num_rows($rsCar)==0)
  {
    echo("Car is Available");
  }
  else 
  {
    echo("Car is Not Available");
  }
   echo("</h1><br>");
?>

<?php 
       $x=$_REQUEST["txtId"];
       include("dbConnect.php");
       $rsCar=mysqli_query($con,"select * from car_info where car_id='$x'");

       while($row=mysqli_fetch_array($rsCar))
       {
  
          
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

  echo('<div id="myForm" style="width:90%">');
   echo('<form method="get" action="insertBooking.php">');


      echo('AREA NAME : <select name="cmbCarArea">');
          $rsArea=mysqli_query($con,"select area_info.area_id,area_name from area_info,car_area_relation where area_info.area_id=car_area_relation.area_id and car_id='$x' order by area_name");
          echo("<option value='0'>Other</option>");
          while($row=mysqli_fetch_array($rsArea))
          {
              $id=$row["area_id"];
              if($id==$a)
                    $ar="selected";
              else 
                     $ar="";      
              echo("<option $ar value='$id'>");
                echo($row["area_name"]);
              echo("</option>");
          }
      echo('</select>');
      



        
        ?>

          <input type="hidden" value='<?=$x?>' name='txtId'><br>
         Choose Start Date <input type="date" name="dtStart" min="<?php echo date('Y-m-d'); ?>" value='<?=$c;?>'><br>
         Choose End Date <input type="date" name="dtEnd" min="<?php echo date('Y-m-d'); ?>" value='<?=$d;?>'><br>
 
         Enter Trip Detail 
         <textarea name="txtDetail"></textarea>

         <div id='btnGroup'>
        <?php 
          if(isset($_SESSION["uname"]))
          {
        ?>
         <input type="submit" value='Confirm Booking Request'>
         
        <?php 
          }
          else 
          {
            echo("<h3> For Booking Request You have to be logged in.</h3>");
          }
        
        ?>
</div><!--end of btnGroup-->
        </form>
        </div>
<?php 

        
        

       }

   ?>
  
      </div> <!-- END OF car-detail -->
</div><!--end of content--> 
<?php 
  include("footer.php");
?>
