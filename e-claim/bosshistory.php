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
				<a class="logo" href="bossindex.php">DynaConsurv e-Claim</a>
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
				<li><a href="bossindex.php">Home</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">

					<div class="content">
						<center><h3><b>Claim History</b></h3></center>

								<div id="printabletable">
									<div class="row">
										<form method="post" class="row" style="border: none; width: 100%;">
										<div class="col-6 col-12-medium">
											<div class="col-12">
												<select name="month" id="category" required>
													<option value="">- Select Month -</option>
													<option value="ALL">ALL</option>
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
											<br>
											<div class="col-12">
												<select name="company" id="category" required>
													<option value="">- Select Company -</option>
													<option value="ALL">ALL</option>
													<option value="Dyna Segmen Sdn Bhd">Dyna Segmen Sdn Bhd</option>
													<option value="Consurv Technic (M) Sdn Bhd">Consurv Technic (M) Sdn Bhd</option>
													<option value="Consurv Technic 2 Sdn Bhd">Consurv Technic 2 Sdn Bhd</option>
													<option value="Dyna O&M Sdn Bhd">Dyna O&M Sdn Bhd</option>
													<option value="Dyna Sche Sdn Bhd">Dyna Sche Sdn Bhd</option>
												</select>
											</div>

										</div>

										<div class="col-6 col-12-medium">
											<select name="staff" id="category" required>
												<option value="">- Select Staff -</option>
												<option value="ALL">ALL</option>
												<?php
												$sql2 = "select * from users where role='Staff'";
												$result2 = mysqli_query($con,$sql2);

												while($row2=mysqli_fetch_array($result2)){
													$username = $row2['username'];
													echo '<option value="'.$username.'">'.$username.'</option>';
												}
												 ?>

											</select>
											<br>
											<input type="submit" name="submit" value="Search" id="submit" class="primary" />

										</div>


									<div class="col-6 col-12-medium" style="padding-top: 20px;">
									</div>
									</form>
									</div>
									<?php
									if(isset($_POST['month'])){
										$month=$_POST['month'];
									}else{
										$month='NULL';
									}
									if(isset($_POST['staff'])){
										$staff=$_POST['staff'];
									}else{
										$staff='NULL';
									}
									if(isset($_POST['company'])){
										$company=$_POST['company'];
									}else{
										$company='NULL';
									}


									if($month != 'NULL' || $staff !='NULL'|| $company != 'NULL')
									{
										if($month=='ALL'){
											$wherestatement=  "";
										}else{
											$wherestatement=  " AND month(date)='$month'";
										}
										if($staff=='ALL'){
											$wherestatement2=  "";
										}else{
											$wherestatement2=  " AND username='$staff'";
										}
										if($company=='ALL'){
											$wherestatement3=  "";
										}else{
											$wherestatement3=  " AND company='$company'";
										}
										$sql = "select * from claimreports where (status='REJECTED' OR status='APPROVED')". $wherestatement . $wherestatement2 . $wherestatement3;
									}
									else
									{
										$sql = "select * from claimreports where status='REJECTED' OR status='APPROVED'";
									}

									 ?>

									<div class="table-wrapper" id="toppadding">

										<table>
											<thead>
												<tr>
													<th>NO.</th>
													<th>COMPANY</th>
													<th>DATE</th>
													<th>NAME</th>
													<th>STATUS</th>
													<th>REASON</th>
													<th>VIEW</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$result = mysqli_query($con,$sql);
												$x= 1;
												while($row=mysqli_fetch_array($result))
																	{

													echo "<tr >";
													echo "<td >";
													echo $x;
													echo "</td>";
													echo "<td >";
													echo $row['company'];
													echo "</td>";
													echo "<td >";
													echo $row['date'];
													echo "</td>";
													echo "<td >";
													echo $row['username'];
													echo "</td >";
													echo "<td >";
													echo $row['status'];
													echo "</td>";
													echo "<td >";
													echo $row['reason'];
													echo "</td>";
													echo "<td >";
													echo "<a href='bossviewreport.php?reportid=",$row['reportid'],"'>view</a>";
													echo "</td>";
													echo "</tr>";
													$x++;
												}


												?>
											</tbody>
										</table>
										<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
									</div>

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
