<?php

include("conn.php");
include("session.php");

/*
$type = getimageSize($_FILES['userImage']['tmp_name']);
$data = addslashes(file_get_contents($_FILES['file']['tmp_name']));
*/
 $number = count($_POST["remarks"]);

	 if($_POST["advance"] == "")
	 {
	   $advance = "NULL";
	 }
	 else{
	   $advance = $_POST["advance"];
	 }

   $company=$_POST["company"];

	 $sql="INSERT INTO `claimreports`(`username`, `advance`, `date`, `company`, `status`, `reason`, `userid`)

	 VALUES

	 ('$_POST[username]','$advance','$_POST[date]','$company','PENDING FROM F.DEPT','NULL','$_SESSION[myid]')";

	 if (!mysqli_query($con,$sql))
	 {
	 die('Error: ' . mysqli_error($con));
	 }

						$reportid = mysqli_insert_id($con);

for($i=0; $i<$number; $i++){

$name= round(microtime(true) * 1000)."-".$_FILES['file']['name'][$i];//formatting into database
		$type= explode('.',$name); //get the file extenstion
			$filetype=$type;   // store the type of file extension
			$MIME=$_FILES['file']['type'][$i];
			$data = $_FILES['file']['tmp_name'][$i];

      //move the file to the Directory
	$upload_dir='file/';
	move_uploaded_file($data,$upload_dir.$name);
	 $path=$upload_dir.$name;
	 //echo $path;
	 if($_POST["projectno"][$i] == "")
	{
		$projectno = "NULL";
	}
	else{
		$projectno = $_POST["projectno"][$i];
	}

	$particulars = $_POST["particulars"][$i];
	$remarks = $_POST["remarks"][$i];
	$priceunit = $_POST["priceunit"][$i];
	$quantity = $_POST["quantity"][$i];
	$totalprice = $_POST["totalprice"][$i];

/*
if (($_POST["particulars"] == "Monthly") || ($_POST["particulars"] == "Profit") || ($_POST["particulars"] == "Offshore") || ($_POST["particulars"] == "Leave"))
{
    $particulars = $_POST["particulars"];
}
else
{
  if ($_POST["particulars"] == "Others")
  {
        if ($other == "NULL")
        {
        echo "<script>alert('Please specify what your (Others) Claim Type in the description textbox!');
        window.location.href = 'submit.php';
        </script>";
      }
      else
      {
        $particulars = $_POST["particulars"] ." - ". $other;
      }
    }
}
*/

//Next process is the insert query.*/

$sql2="INSERT INTO `claims`(`particulars`, `remarks`, `projectno`, `priceperunit`, `quantity`, `totalprice`, `filetype`, `filedata`, `reportid`)

VALUES

('$particulars','$remarks','$projectno','$priceunit','$quantity','$totalprice','$path','$MIME','$reportid')";

if (!mysqli_query($con,$sql2))
{
die('Error: ' . mysqli_error($con));
}



echo '<script>alert("Claim submit successful!"); window.location.href = "staffviewreport.php?reportid=';
echo $reportid,'";';
echo '</script>';


}




mysqli_close($con);

?>
