<!DOCTYPE HTML>
<html>
	<head>
		<title>e-Claim</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="staffindex.php">DynaConsurv e-Claim</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
		<nav id="menu">
			<?php
				include("conn.php");
				include("session.php");
				?>

				<center><img src="images/user.png" class="logo" style="width:80px;height:80px"></center>
				<center><?php echo $_SESSION['mySession']?></center>

				</br>

			<ul class="links">
				<li><a href="staffindex.php">Home</a></li>

				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
					<center><h3><b>PENDING CLAIM</b></h3></center>
					<?php


					 ?>

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>NO.</th>
													<th>DATE</th>
													<th>STAFF NAME</th>
													<th>PENDING STATUS</th>
													<th>View</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$result = mysqli_query($con,"select * from claimreports where userid=$_SESSION[myid] AND (status='PENDING FROM F.DEPT' OR status='PENDING FROM F.MANAGER' OR status='PENDING FROM BOSS')");
												$x= 1;
												while($row=mysqli_fetch_array($result))
																	{
																		$reportid = $row["reportid"];
												echo "<tr>";
												echo "<td >";
												echo $x;
												echo "</td>";
												echo "<td >";
												echo $row['date'];
												echo "</td>";
												echo "<td >";
												echo $row['username'];
												echo "</td >";
												echo "<td style=\"color: blue; \" >";
												echo $row['status'];
												echo "</td>";
												echo "<td >";
												echo '<a href="staffviewreport.php?reportid=',$reportid,'">';
												echo "View</a>";
												echo "</td >";
												echo "<td >";
												echo "<a href='staffdeleteclaim.php?reportid=",$reportid,"' onclick='return confirm(`Are you sure you want to delete this Claim?`)'>";
												echo "Delete</a>";
												echo "</td>";
												echo "</tr>";
												$x++;
											}
												?>


											</tbody>
										</table>
									</div>
									<?php

									?>
					</div>
				</div>
			</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner" style="text-align: center; width: 80%;">
				<img src="images/consurv4.png" style="height:70px; padding-bottom: 20px;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><img src="images/dyna.png" style="height:70px; padding-bottom: 20px;">
				<div class="copyright">
					Copyright &copy; 2020 DynaConsurv. All rights reserved.
				</div>
			</div>
		</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
