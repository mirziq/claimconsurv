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
				<a class="logo" href="fdindex.php">DynaConsurv e-Claim</a>
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
				<li><a href="fdindex.php">Home</a></li>

				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<center><h2><b>Staffs</b></h2></center>
						<?php


						$result = mysqli_query($con,"select * from users where role='Staff'");

						 ?>

									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>NO.</th>
													<th style="width: 800px;">NAME</th>
													<th>View Claims</th>
												</tr>
											</thead>
											<tbody>

												<?php
												$x= 1;
												while($row=mysqli_fetch_array($result))
																	{
												echo "<tr >";
												echo "<td >";
												echo $x;
												echo "</td>";
												echo "<td >";
												echo $row['username'];
												echo "</td>";
												echo "<td style=\"  text-align: center;\">";
												echo "<a href='fdvalidate2.php?userid=",$row['userid'],"'>view</a>";
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
