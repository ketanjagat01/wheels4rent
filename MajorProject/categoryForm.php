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

     <div>&nbsp;</div>
   <div id='myForm'>
      <?php 
        if(isset($_REQUEST["resmsg"]))
        {
          echo("<div id='resmsg'>");
            if($_REQUEST["resmsg"]==1)
            {
               echo("Category has been saved !!!!!!");
            }
            
            
          echo("</div>");
        }
      ?>
     <form method="get" action="insertCategory.php">
        
        <label>Enter Category Name </label>
        <input type="text" name="txtName">
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
