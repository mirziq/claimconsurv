<?php

include("conn.php");
include("session.php");

/*
$type = getimageSize($_FILES['userImage']['tmp_name']);
$data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
*/
 $reportid = $_POST['reportid'];
 $userid = $_POST['userid'];
 if($_POST["reason"] == "")
 {
   $sql="UPDATE claimreports SET status='REJECTED' WHERE reportid=$reportid;";
 }
 else{
   $sql="UPDATE claimreports SET reason='".$_POST['reason']."', status='REJECTED' WHERE reportid=$reportid;";
 }



if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
echo '<script>alert("Claim Rejected!"); window.location.href = "bossvalidate2.php?userid=';
echo $userid,'";';
echo '</script>';







mysqli_close($con);

?>
