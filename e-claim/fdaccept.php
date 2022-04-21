<?php

include("conn.php");
include("session.php");

/*
$type = getimageSize($_FILES['userImage']['tmp_name']);
$data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
*/
 $reportid = $_GET['reportid'];
 $userid = $_GET['userid'];

 $sql="UPDATE claimreports SET status='PENDING FROM F.MANAGER' WHERE reportid=$reportid;";

	 if (!mysqli_query($con,$sql))
	 {
	 die('Error: ' . mysqli_error($con));
	 }


echo '<script>alert("Claim Accepted!"); window.location.href = "fdvalidate2.php?userid=';
echo $userid,'";';
echo '</script>';







mysqli_close($con);

?>
