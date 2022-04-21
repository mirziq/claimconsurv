<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($result);
// Free result set
mysqli_free_result($result);

if ($rowcount == 1)
{
session_start();
$_SESSION['mySession'] = $username;

$sql="SELECT role, userid from users WHERE username='$username'";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$sql);

$row= mysqli_fetch_array($result);

$_SESSION['myid'] = $row['userid'];

if ($row['role']=='Staff')
{
header("location: staffindex.php");
}
else if ($row['role']=='Finance')
{
header("location: FDindex.php");
}
else if ($row['role']=='Boss')
{
header("location: bossindex.php");
}
else if ($row['role']=='Fmanage')
{
header("location: fmindex.php");
}
} else {
echo '<script>alert("Your username or password is invalid. Please re login.");
								window.location.href = "login.html";</script>';
}
mysqli_close($con);
}
?>
