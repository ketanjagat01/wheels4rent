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
               echo("Data has been saved");
            }
            elseif($_REQUEST["resmsg"]==2)
            {
               echo("Given User Name Already Exist !!!! ");
            }
          echo("</div>");
        }
      ?>
     <form method="get" action="insertUser.php">
        <label>Enter your name</label>
        <input type="text" name="txtName">
        <label>Enter your email id</label>
        <input type="text" name="txtEmail">
        <label>Enter your mobile no</label>
        <input type="text" name="txtMobile">
        <label>Enter your address</label>
        <textarea name="txtAddress"></textarea>
        <label>Enter your user name</label>
        <input type="text" name="txtUser">
        <label>Enter your password</label>
        <input type="password" name="txtPassword">
        <label>Choose user type</label>
        <select name='cmbType'>
           <option>Customer</option> 
           <option>Vendor</option>
        </select>   
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
