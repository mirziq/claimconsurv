<?php

include("conn.php");
include("session.php");

/*
$type = getimageSize($_FILES['userImage']['tmp_name']);
$data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
*/

$reportid = $_GET['reportid'];

$result = mysqli_query($con,"select * from claimreports where reportid=$reportid");

while($row=mysqli_fetch_array($result))
{
  if(($row['status'] == "PENDING FROM BOSS") || ($row['status'] == "PENDING FROM F.MANAGER") || ($row['status'] == "APPROVED"))
  {
    echo '<script>alert("You can only add more items when claim is rejected or pending from F.DEPT!"); window.location.href = "staffviewreport.php?reportid=',$reportid,'";';
    echo '</script>';
  }
  else if(($row['status'] == "PENDING FROM F.DEPT") || ($row['status'] == "REJECTED"))
  {
      echo '<script> window.location.href = "staffadditem.php?reportid=',$reportid,'";';
      echo '</script>';

  }
}

mysqli_close($con);

?>
