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
	<body class="is-preload" onload="myFunction()">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="staffindex.php">DynaConsurv e-Claim</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>
			<?php
				include("conn.php");
				include("session.php");
				?>
		<!-- Nav -->
			<nav id="menu">
					<center><img src="images/user.png" class="logo" style="width:80px;height:80px"></center>
					<center><?php echo $_SESSION['mySession']?></center>

					</br>

				<ul class="links">
					<li><a href="staffindex.php">Home</a></li>

					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>
      <?php




      ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<form method="post" enctype="multipart/form-data" action="#">
					<div class="content">
						<h2>Claim Details</h2>
						<!-- INSERT FORM HERE -->
						<div class="row">
						<div class="col-6 col-12-medium">
						<div id="padding">
              <?php
                $sql="SELECT * FROM claims WHERE claimid='11'";

                $result = mysqli_query($con,$sql);

                while($row = mysqli_fetch_array($result))
                {
              ?>

							<label for="username"><b>Staff Name</b></label>
							<input type="text" placeholder="Enter Name" name="username" value="<?php echo $_SESSION['mySession']?>" readonly>

							<label for="type" id="toppadding"><b>Claim Type</b></label>
							<div class="col-12">
								<select name="claimtype" id="category" readonly>
									<option value="">Select type of claim</option>
									<option value="Medical" selected>Medical</option>
									<option value="Transport">Transport</option>
									<option value="Others">Others</option>
								</select>
							</div>

							<label for="other" id="toppadding"><b>If Claim Type is Others, Enter Description</b></label>
							<input type="text" value="NULL" placeholder="Enter Description" name="other" readonly>

							<label for="remark" id="toppadding"><b>Remarks</b></label>
							<input type="text" value="NULL" placeholder="Enter Remarks" name="remark" readonly>

							<div class="col-12" id="toppadding">
							<ul class="actions">
							<li><input type="submit" name="delete" value="Delete" class="primary"/></li>
							</ul>
							</div>

					</div>
					</div>
					<div class="col-6 col-12-medium">
						<div id="padding">

							<label for="date"><b>Date</b></label>
							<input type="text" id="date" name="date" readonly>

							<label for="priceunit" id="toppadding"><b>Price per Unit</b></label>
							<span><b>RM <b></span><input type="number" value="20" min="0.00" placeholder="Enter Price per Unit" name="priceunit" readonly>

							<label for="totalprice" id="toppadding"><b>Total Price</b></label>
							<input type="text" placeholder="RM" value="80" name="totalprice" readonly>

							<label for="file" id="toppadding"><b>File Uploaded</b></label>
						<img src="<?php echo $row['filetype'];?>" width="400px" height="500px">
            <embed src="<?php echo $row['filetype'];?>" width="600" height="500"> </embed>

						<div/>
					</div>
				</div>
				</div>
				</form>
			</div>
      <?php
      }
       ?>
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
function myFunction() {
	var today = new Date();
var dd = today.getDate();

var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
if(dd<10)
{
    dd='0'+dd;
}

if(mm<10)
{
    mm='0'+mm;
}
today = dd+'/'+mm+'/'+yyyy;

document.getElementById('date').value= today;
}
</script>

	</body>
</html>
