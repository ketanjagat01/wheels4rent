<?php  @session_start();
  $a=$_REQUEST["txtUser"];
  $b=$_REQUEST["txtPassword"];

  include("dbConnect.php");
  $rsuser=mysqli_query($con,"select * from user_info where user_name='$a'");
  if(mysqli_num_rows($rsuser)==0)
  {
     header("location:loginForm.php?resmsg=1");
  }
  else 
  {
     $row=mysqli_fetch_array($rsuser);
     if($row["user_pass"]!=$b)
       {
        header("location:loginForm.php?resmsg=2");
       }
     else 
        {
            if($row["connect_status"]==0)
            {
                header("location:loginForm.php?resmsg=3");
            }
            else 
            {
                if($row["user_type"]=="Customer")
                  {
                    $_SESSION["uname"]=$a;
                    $_SESSION["utype"]="Customer";
                    header("location:customerChoice.php");

                  }
                  else if($row["user_type"]=="Vendor")
                  {
                    $_SESSION["uname"]=$a;
                    $_SESSION["utype"]="Vendor";

                    header("location:vendorChoice.php");

                  }
                  else if($row["user_type"]=="Admin")
                  {
                    $_SESSION["uname"]=$a;
                    $_SESSION["utype"]="Admin";

                    header("location:adminChoice.php");

                  }


            }
        }  

  }


?>