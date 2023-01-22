<?php @session_start(); ?>
<html>
<head>
<title>WHEELS 4 Rent</title>
<link href="./css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="main">
    <div id='header'>
      <div id='leftLogo'> 
    
      <?php  
       if(isset($_SESSION["utype"]))
       {
          if($_SESSION["utype"]=="Customer")
            $home="customerChoice.php";
          else if($_SESSION["utype"]=="Admin")
          $home="adminChoice.php";
           else if($_SESSION["utype"]=="Vendor")
           $home="vendorChoice.php";
        
       }
       else 
       {
         $home="index.php";
       }

?>

      <a href='<?=$home;?>' title="Go To Home"> <img src="./images/carlogo.jpg"></a>
      </div>
      <div id='company'> 
        <h1><a href='index.php'>WHEELS 4 Rent </a> </h1>
        <h3> Trusted and Safest Tour On A Wheel </h3>
        <?php 
          if(isset($_SESSION["uname"]))
          {
            echo("<div id='loginInfo'>");
             echo("Welcome ".$_SESSION["uname"]);
             echo(" , <a href='logout.php'>Logout</a>");
            echo("</div>");
          }
        ?>
      </div><!--end of company-->
      <!-- <div id='rightLogo'> 
      <img src="./images/logo.jpg">
      </div> -->


    </div><!--end of header-->