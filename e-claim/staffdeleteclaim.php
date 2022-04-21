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
  if(($row['status'] == "PENDING FROM BOSS") || ($row['status'] == "PENDING FROM F.MANAGER"))
  {
    echo '<script>alert("Only Claims that are pending from F.DEPT are deletable!"); window.location.href = "staffpending.php";';
    echo '</script>';
  }
  else if($row['status'] == "PENDING FROM F.DEPT")
  {
    $sql = "DELETE FROM claims where reportid=$reportid";

    	$result2=mysqli_query($con, $sql);

    $sql2 = "DELETE FROM claimreports where reportid=$reportid";

    $result3=mysqli_query($con, $sql2);

    if(!$result2 || !$result3)
		{
		die('error:'.mysqli_error($con));
		}
    if ($result3 || $result4) {
      echo '<script>alert("Claim Deleted!"); window.location.href = "staffpending.php";';
      echo '</script>';
    }
  }
}

mysqli_close($con);

?>
