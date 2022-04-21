<!DOCTYPE HTML>
<html>
	<head>
		<title>e-Claim</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" media="screen" href="assets/css/main.css" />
		<link rel="stylesheet" media="print" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html">DynaConsurv e-Claim</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
					<center><img src="images/user.png" class="logo" style="width:80px;height:80px"></center>
					<center>(name)</center>

					</br>

				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">Change Password</a></li>
					<li><a href="#">Log Out</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">

					<div class="content">

							<button onclick="printDiv('printabletable')">Print</button>

								<div id="printabletable">
									<center><h2><b>Submit Claim</b></h2></center>
									<div class="row">
										<div class="col-6 col-12-medium">
											<label for="type" id="toppadding" style="padding-left: 80px; padding-bottom: 30px;">NAME  : <span style=""> &nbsp;&nbsp;&nbsp; kel</span></label>
										</div>
										<div class="col-6 col-12-medium">
											<label for="type" id="toppadding" style="text-align: right; padding-right: 80px; padding-bottom: 30px; ">DATE  : <span style=""> &nbsp;&nbsp;&nbsp; 25/4/2020</span></label>
										</div>
									</div>
									<div class="table-wrapper">

										<table id="reporttable" style="border-collapse: collapse;">
											<thead style="border: 1px solid black;">
												<tr id="reporttable" style="border: 1px solid black; background-color: white;">
													<th style="border: 1px solid black;">NO.</th>
													<th style="border: 1px solid black;">PARTICULARS</th>
													<th style="border: 1px solid black;">REMARKS</th>
													<th style="border: 1px solid black;">PROJECT NO. (if any)</th>
													<th style="border: 1px solid black;">PRICE PER UNIT (RM)</th>
													<th style="border: 1px solid black;">TOTAL PRICE (RM)</th>

												</tr>
											</thead>
											<tbody style="border: 1px solid black; background-color: white;">
												<tr style="border: 1px solid black; font-size: 14px;">
													<td style="border: 1px solid black;">1</td>
													<td style="border: 1px solid black;">Monthly</td>
													<td style="border: 1px solid black;">Car</td>
													<td style="border: 1px solid black;">2558</td>
													<td style="border: 1px solid black;">RM5</td>
													<td style="border: 1px solid black;">RM50</td>

												</tr>
												<tr style="border: 1px solid black; font-size: 14px;">
													<td style="border: 1px solid black;">2</td>
													<td style="border: 1px solid black;">Profit Sharing</td>
													<td style="border: 1px solid black;">Project</td>
													<td style="border: 1px solid black;">2347</td>
													<td style="border: 1px solid black;">RM50</td>
													<td style="border: 1px solid black;">RM200</td>
												</tr>
												<tr style="border: 1px solid black; font-size: 14px;">
													<td style="border: 1px solid black;">3</td>
													<td style="border: 1px solid black;">Offshore</td>
													<td style="border: 1px solid black;">Project</td>
													<td style="border: 1px solid black;"></td>
													<td style="border: 1px solid black;">RM10</td>
													<td style="border: 1px solid black;">RM70</td>
												</tr>
												<tr style="border: 1px solid black; font-size: 14px;">
													<td colspan="5" style="border: 1px solid black; text-align: right;"><b>Total</b></td>
													<td style="border: 1px solid black;">RM320</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="row">
										<div class="col-6 col-12-medium">
										</div>
										<div class="col-6 col-12-medium">
											<div class="table-wrapper">

												<table id="reporttable" style="border-collapse: collapse;">
													<thead style="border: 1px solid black; background-color: white;">
														<tr id="reporttable" style="border: 1px solid black; height:70px;">
															<th style="border: 1px solid black; font-size: 20px; text-align: center; padding-top: 20px; padding-bottom: 20px;">STATUS</th>
															<th style="border: 1px solid black; font-size: 20px; text-align: center;">REJECTED</th>
														</tr>
													</thead>

													<thead style="border: 1px solid black; background-color: white;">
														<tr id="reporttable" style="border: 1px solid black; height:70px;">
															<th style="border: 1px solid black; font-size: 20px; text-align: center; padding-top: 20px; padding-bottom: 20px;">REASON</th>
															<th style="border: 1px solid black; font-size: 20px; text-align: center;">Come see me</th>
														</tr>
													</thead>

												</table>
											</div>
										</div>
									</div>

					</div>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
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

		}
	</script>



	</body>
</html>
