<!DOCTYPE HTML>
<html>
	<head>
		<title>e-Claim</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" media="screen" href="assets/css/main.css" />
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

				<center><img src="images/user.png" class="logo" style="width:80px; height:80px;"></center>
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


							<?php

							$reportid= $_GET['reportid'];
							$result = mysqli_query($con,"select * from claimreports where userid=$_SESSION[myid] AND reportid=$reportid");

							while($row=mysqli_fetch_array($result))
							          {
													$result2 = mysqli_query($con,"select * from claims where reportid=$reportid");

							 ?>

								<div id="printabletable">
									<center><h2><b><?php echo $row['company'];?></b></h2></center>
									<center><h3><b>Claim Details</b></h3></center>
									<div class="row" style="  display: flex; flex-wrap: wrap; box-sizing: border-box;">
										<div class="col-6 col-12-medium" style="width: 50%;">
											<label for="type" id="toppadding" style="margin-left:10px; padding-left: 80px; padding-bottom: 0px;">NAME  : <span style=""> &nbsp;&nbsp;&nbsp; <?php echo $row['username'];?></span></label>
										</div>
										<div class="col-6 col-12-medium" style="text-align: right; width: 50%;">
											<label for="type" id="toppadding" style="text-align: right; padding-right: 80px; padding-bottom: 30px; ">DATE  : <span style=""> &nbsp;&nbsp;&nbsp; <?php echo $row['date'];?></span></label>
										</div>
									</div>



									<div class="table-wrapper" style=" padding-top: 20px; width: 100%;">
										<?php

											?>
										<table id="reporttable" style="border-collapse: collapse;">
											<thead style="border: 1px solid black;">
												<tr id="reporttable" style="border: 1px solid black; background-color: white;">
													<th style="border: 1px solid black; font-size:14px;">NO.</th>
													<th style="border: 1px solid black; font-size:14px">PARTICULARS</th>
													<th style="border: 1px solid black; font-size:14px">REMARKS</th>
													<th style="border: 1px solid black; font-size:14px">PROJECT NO. (if any)</th>
													<th style="border: 1px solid black; font-size:14px">VIEW FILE</th>
													<th style="border: 1px solid black; font-size:14px">PRICE PER UNIT (RM)</th>
													<th style="border: 1px solid black; font-size:14px">QUANTITY</th>
													<th style="border: 1px solid black; font-size:14px">TOTAL PRICE (RM)</th>
													<th style="border: 1px solid black; font-size:14px">Delete</th>

												</tr>
											</thead>
											<tbody style="border: 1px solid black; background-color: white;">
											<?php
											$x= 1;
											while($row2 = mysqli_fetch_array($result2))
											{
												$claimid = $row2['claimid'];
												$reportid2 = $row2['reportid'];
												echo "<tr style=\"bgcolor:white; border:1px solid black; \">";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo $x;
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo $row2['particulars'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo $row2['remarks'];
												echo "</td >";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo $row2['projectno'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: left;height: 30px; \">";
												echo "<img src='",$row2['filetype'],"' class=\"zoomer\" style=\"width:50px; height: 5px;\"/>";
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo "RM", $row2['priceperunit'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; \">";
												echo $row2['quantity'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
												echo "RM", $row2['totalprice'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
												echo "<a href='staffdeleteitem.php?claimid=",$claimid,"&reportid=",$reportid2,"' onclick='return confirm(`Are you sure you want to delete this Item?`)'>";
												echo "Delete</a>";
												echo "</td>";
												echo "</tr>";
												$x++;
											}


											?>
											<!--
											"<tdbgcolor=\"white\" border=\"1px solid black\" font-size=\"12px\"><a href=\"deleteres.php?resid=";

											echo "\" onClick=\"return confirm('Cancel reservation?');\">Delete</a>
											</td>
										-->
										<?php
										$result3 = mysqli_query($con,"select SUM(totalprice) from claims where reportid=$reportid");
										while($row3 = mysqli_fetch_array($result3))
										{
											$totalprices = $row3['SUM(totalprice)'];
												echo "<tr style=\"bgcolor:white; border:1px solid black; \">";
												echo "<td colspan=\"7\" style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right;\"><b>Total</b></td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
												echo "RM", $row3['SUM(totalprice)'];
												echo "</td>";
												echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
												echo "</a>";
												echo "</tr>";

										}

											?>
											<?php
											$result4 = mysqli_query($con,"select advance from claimreports where reportid=$reportid");
											while($row4 = mysqli_fetch_array($result4))
											{

												if($row4['advance'] == "NULL")
												{
													$advance = 0;
												}
												else{
													$advance = $row4['advance'];
												}

												$grandtotal = $totalprices - $advance;
													echo "<tr style=\"bgcolor:white; border:1px solid black; \">";
													echo "<td colspan=\"7\" style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right;\"><b>Less: ADVANCE</b></td>";
													echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
													echo "RM", $advance;
													echo "</td>";
													echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
													echo "</a>";
													echo "</tr>";
													echo "<tr style=\"bgcolor:white; border:1px solid black; \">";
													echo "<td colspan=\"7\" style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right;\"><b>GRAND TOTAL</b></td>";
													echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
													echo "RM", $grandtotal;
													echo "</td>";
													echo "<td style=\"bgcolor:white; border:1px solid black; font-size: 16px; text-align: right; \">";
													echo "</a>";
													echo "</tr>";
												}

												?>

											</tbody>
										</table>
									</div>
									<div class="row"  style="  display: flex; flex-wrap: wrap; box-sizing: border-box;">
										<div class="col-6 col-12-medium" style="width: 50%;">
											<button onclick="window.location.href= 'staffcheckclaim.php?reportid=<?php echo $reportid;?>'"> + Add more Items</button>
										</div>
										<div class="col-6 col-12-medium" style="width: 50%;">
											<div class="table-wrapper" style=" padding-top: 20px;">

												<table id="reporttable" style="border-collapse: collapse;">
													<thead style="border: 1px solid black; background-color: white;">
														<tr id="reporttable" style="border: 1px solid black; height:70px;">
															<th style="border: 1px solid black; font-size: 20px; text-align: center; padding-top: 20px; padding-bottom: 20px;">STATUS</th>
															<th style="border: 1px solid black; font-size: 20px; text-align: center;"><?php echo $row['status'];?></th>
														</tr>
													</thead>

													<thead style="border: 1px solid black; background-color: white;">
														<tr id="reporttable" style="border: 1px solid black; height:70px;">
															<th style="border: 1px solid black; font-size: 20px; text-align: center; padding-top: 20px; padding-bottom: 20px;">REASON</th>
															<th style="border: 1px solid black; font-size: 20px; text-align: center;"><?php echo $row['reason'];?></th>
														</tr>
													</thead>

												</table>
											</div>
										</div>
									</div>
									</div>



					<?php
				}
					?>
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

			<script>
		function printDiv(divName){
			var printContents = document.getElementById("printabletable").innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
      console.log("HI")
		}

		function bigImg(x) {
  x.style.transform = "scale(30)";
	x.style.position = "absolute";
}
function normalImg(x) {
  x.style.transform = "scale(1)";

}

	</script>



	</body>
</html>
