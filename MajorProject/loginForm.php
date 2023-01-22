<?php 
  include("header.php");
?>
<div id='content'>
<div>&nbsp;</div>
   <div id='myForm'>
      <?php 
        if(isset($_REQUEST["resmsg"]))
        {
          echo("<div id='resmsg'>");
            if($_REQUEST["resmsg"]==1)
            {
               echo("Wrong User Name !!!!!!");
            }
            else if($_REQUEST["resmsg"]==2)
            {
               echo("Wrong Password !!!!!!");
            }
            else if($_REQUEST["resmsg"]==3)
            {
               echo("Insufficient Privileges to connect, Contact to admin !!!!!!");
            }
            
            
          echo("</div>");
        }
      ?>
     <form method="get" action="checkLogin.php">
        
        <label>User Name</label>
        <input type="text" name="txtUser">
        <label>Password</label>
        <input type="password" name="txtPassword">
        <div id='btnGroup'>
          <input type="submit" value="Ok">
          <input type="reset" value="Cancel">
        </div>

      </form>
   </div><!--end of myform-->
      
   <div>&nbsp;</div>


</div><!--end of content--> 
<?php 
  include("footer.php");
?>
