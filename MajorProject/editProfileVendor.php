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
      include("dbConnect.php");
      $usr=$_SESSION["uname"];
      $rsUser=mysqli_query($con,"select * from user_info where user_name='$usr'");
      $row=mysqli_fetch_array($rsUser); 
        if(isset($_REQUEST["resmsg"]))
        {
          echo("<div id='resmsg'>");
            if($_REQUEST["resmsg"]==1)
            {
               echo("Data has been updated");
            }
            elseif($_REQUEST["resmsg"]==2)
            {
               echo("Given User Name Already Exist !!!! ");
            }
          echo("</div>");
        }
      ?>
     <form method="get" action="updateCustomer.php">
        <label>Enter your name</label>
        <input type="text" name="txtName" value='<?=$row["cust_name"];?>'>
        <label>Enter your email id</label>
        <input type="text" name="txtEmail" value='<?=$row["cust_email"];?>'>
        <label>Enter your mobile no</label>
        <input type="text" name="txtMobile" value='<?=$row["cust_mobile"];?>'>
        <label>Enter your address</label>
        <textarea name="txtAddress"><?=$row["cust_address"];?></textarea>
        <label>Enter your user name</label>
        <input disabled type="text" name="txtUser" value='<?=$row["user_name"];?>'>
        <label>Enter your password</label>
        <input type="password" name="txtPassword" value='<?=$row["user_pass"];?>'>
        <label>Choose user type</label>
        <select name='cmbType'>
           <option >Customer</option> 
           <option selected>Vendor</option>
        </select>   
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
