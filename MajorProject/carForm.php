<?php 
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

     <div>&nbsp;</div>
   <div id='myForm'>
      <?php 
        if(isset($_REQUEST["resmsg"]))
        {
          echo("<div id='resmsg'>");
            if($_REQUEST["resmsg"]==1)
            {
               echo("Data has been saved");
            }
            elseif($_REQUEST["resmsg"]==2)
            {
               echo("Given User Name Already Exist !!!! ");
            }
          echo("</div>");
        }
      ?>
     <form method="post" enctype="multipart/form-data" action="insertCar.php">
        <label>Enter car no.</label>
        <input type="text" name="txtCarNo">
        <label>Enter company/model detail</label>
        <input type="text" name="txtCompany">
        <label>Enter model year</label>
        <input type="text" name="txtYear">
        <label>Choose Category Type</label>
        <select name="cmbCatType">
          <option value=0>Choose Car Type</option>
          <?php 
            include("dbConnect.php");
            $rsCat=mysqli_query($con,"select cat_id,cat_name from category_info order by cat_name");
            while($row=mysqli_fetch_array($rsCat))
            {
                $id=$row["cat_id"];
                echo("<option value='$id'>");
                  echo($row["cat_name"]);
                echo("</option>");
            }
          ?>
        </select>
        
        
        <label>Choose Car Running Areas</label>
        <select name="cmbCarArea[]" size="5" multiple>
          
          <?php 
            include("dbConnect.php");
            $rsCat=mysqli_query($con,"select area_id,area_name from area_info order by area_name");
            while($row=mysqli_fetch_array($rsCat))
            {
                $id=$row["area_id"];
                echo("<option value='$id'>");
                  echo($row["area_name"]);
                echo("</option>");
            }
          ?>
        </select>
        

        
        <label>Choose Car Image</label>
        <input type="file" name="flImage">
        
        <label>Enter car detail</label>
        <textarea name="txtDetail"></textarea>
        
        <label>Enter charges per km</label>
        <input type="text" name="txtPriceKm">
        <label>Enter charges per day</label>
        <input type="text" name="txtPriceDay">



        <div id='btnGroup'>
          <input type="submit" value="Ok">
          <input type="reset" value="Cancel">
        </div>

      </form>
   </div><!--end of myform-->
      
   <div>&nbsp;</div>


     </div><!--end of rightDiv-->
  </div><!--end of parentDashboard-->


</div><!--end of content--> 
<?php 
  include("footer.php");
?>
