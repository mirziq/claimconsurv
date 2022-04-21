<?php
session_start();
if ((!isset($_SESSION['mySession'])) || (!isset($_SESSION['myid'])))
{
header("location: login.html");
}
?>
