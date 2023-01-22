<?php

$a = $_REQUEST["resmsg"];
$b = $_REQUEST["bookId"];
include("dbConnect.php");

if( $a==1 )
{
    mysqli_query($con,"update booked_info set booking_close_status='Accept' where book_id='$b' ") or die("Query Error");
    header("location:showVendorRequestList.php?reqmsg=1");
}
else if( $a==2 )
{
    mysqli_query($con,"update booked_info set booking_close_status='Reject' where book_id='$b' ") or die("Query Error");
    header("location:showVendorRequestList.php?reqmsg=2");
}


?>