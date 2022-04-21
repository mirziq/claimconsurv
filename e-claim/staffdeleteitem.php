<?php

include("conn.php");
include("session.php");

/*
$type = getimageSize($_FILES['userImage']['tmp_name']);
$data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
*/
$claimid = $_GET['claimid'];
$reportid = $_GET['reportid'];

$result = mysqli_query($con,"select * from claimreports where reportid=$reportid");

while($row=mysqli_fetch_array($result))
{
  if( ($row['status'] == "PENDING FROM F.MANAGER") || ($row['status'] == "PENDING FROM BOSS") || ($row['status'] == "APPROVED"))
  {
    echo '<script>alert("Items are only deletable if the claim is rejected or pending from F.DEPT!"); window.location.href = "staffviewreport.php?reportid=',$reportid,'";';
    echo '</script>';
  }
  else if(($row['status'] == "PENDING FROM F.DEPT") || ($row['status'] == "REJECTED"))
  {
    $result = mysqli_query($con,"select * from claimreports where reportid=$reportid");

    while($row=mysqli_fetch_array($result))
              {
                $status = $row['status'];
                if($status == "REJECTED")
                {
                  $sql= "UPDATE claimreports SET status='PENDING FROM F.DEPT', reason='NULL' WHERE reportid=$reportid;";

                  if (!mysqli_query($con,$sql))
                  {
                  die('Error: ' . mysqli_error($con));
                  }
                }
              }

    $sql2 = "DELETE FROM claims where claimid=$claimid";

    	$result2=mysqli_query($con, $sql2);

    if(!$result2)
		{
		die('error:'.mysqli_error($con));
		}
    if ($result2) {
      echo '<script>alert("Claim Deleted!"); window.location.href = "staffviewreport.php?reportid=',$reportid,'";';
      echo '</script>';
    }
  }
}

mysqli_close($con);

?>
