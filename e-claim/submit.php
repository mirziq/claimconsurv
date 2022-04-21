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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
			<?php

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
						<center><h3>Submit Claim</h3></center>
						<form name="submitclaim" id="submitclaim" method="post" enctype="multipart/form-data" action="submitclaim.php" style="border:0px;">
							<div class="row">
							<div id="dynamic_field">
								<div class="row">
						<div class="col-6 col-12-medium">
						<div id="padding">

							<label for="username">Staff Name</label>
							<input type="text" placeholder="Enter Name" name="username" value="<?php echo $_SESSION['mySession']?>" readonly>
							<br>
							<label for="type" id="toppadding">Company<span style="color:red;">*</span></label>
							<div class="col-12">
								<select name="company" id="category" required>
									<option value="">- Select company -</option>
									<option value="Dyna Segmen Sdn Bhd">Dyna Segmen Sdn Bhd</option>
									<option value="Consurv Technic (M) Sdn Bhd">Consurv Technic (M) Sdn Bhd</option>
									<option value="Consurv Technic 2 Sdn Bhd">Consurv Technic 2 Sdn Bhd</option>
									<option value="Dyna O&M Sdn Bhd">Dyna O&M Sdn Bhd</option>
									<option value="Dyna Sche Sdn Bhd">Dyna Sche Sdn Bhd</option>
								</select>
							</div>

							<label for="type" id="toppadding">Particulars<span style="color:red;">*</span></label>
							<div class="col-12">
								<select name="particulars[]" id="category" required>
									<option value="">- Select claim type -</option>
									<option value="Monthly">Monthly</option>
									<option value="Profit Sharing">Profit Sharing</option>
									<option value="Offshore">Offshore</option>
									<option value="Leave Claim">Leave Claim</option>
									<option value="Others">Others</option>
								</select>
							</div>

							<label for="other" id="toppadding">Remarks<span style="color:red;">*</span></label>
							<input type="text" placeholder="Please specify on the particulars" name="remarks[]" id="category" required>

							<label for="remark" id="toppadding">Project No. (if any)</label>
							<input type="text" placeholder="Enter project no." name="projectno[]">



					</div>
					</div>

					<div class="col-6 col-12-medium">
						<div id="padding">

							<label for="date">Date</label>
							<input type="text" id="date" name="date" readonly>
							<br>

							<label for="totalprice" id="toppadding">Advance<span style="color:red;">*</span></label>
							<br>
							<input type="number" min="0.00" placeholder=" RM" name="advance" required>
							<br>


							<label for="priceunit" id="toppadding">Price per Unit<span style="color:red;">*</span></label>
							<br>
							<input type="number" min="0.00" placeholder=" RM" name="priceunit[]" required>
							<br>
							<label for="totalprice" id="toppadding">Quantity<span style="color:red;">*</span></label>
							<br>
							<input type="number" placeholder=" Enter quantity" name="quantity[]" required>
							<br>
							<label for="totalprice" id="toppadding">Total Price<span style="color:red;">*</span></label>
							<br>
							<input type="number" min="0.00" placeholder=" RM" name="totalprice[]" required>
							<br>
							<label for="file" id="toppadding">Upload Receipt<span style="color:red;">*</span></label>
							<input type="file" name="file[]" accept="image/*" required>
							<br>
							<button type="button" name="add" id="add" class="btn btn-success">Add More</button>

						<div/>
					</div>
				</div>
				</div>
			</div>





			</div>
			<div class="col-12" style="padding-top:30px; padding-left:50px; padding-bottom:30px;">
			<ul class="actions">
			<li><input type="submit" name="submit" value="Submit" id="submit" class="primary"/></li>
			</ul>
			</div>
		</div>
		</form>
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
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
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
				today = dd+'-'+mm+'-'+yyyy;

           i++;
           $('#dynamic_field').append(`<div class="row" id="row`+i+`">
			 <div class="col-6 col-12-medium">
			 <div id="padding">

				 <label for="type" id="toppadding">Particulars<span style="color:red;">*</span></label>
				 <div class="col-12">
					 <select name="particulars[]" id="category" required>
						 <option value="">- Select claim type -</option>
						 <option value="Monthly">Monthly</option>
						 <option value="Profit">Profit Sharing</option>
						 <option value="Offshore">Offshore</option>
						 <option value="Leave">Leave Claim</option>
						 <option value="Others">Others</option>
					 </select>
				 </div>

				 <label for="other" id="toppadding">Remarks<span style="color:red;">*</span></label>
				 <input type="text" placeholder="Please specify on the particulars" name="remarks[]" id="category" required>

				 <label for="remark" id="toppadding">Project No. (if any)</label>
				 <input type="text" placeholder="Enter project no." name="projectno[]">



		 </div>
		 </div>

		 <div class="col-6 col-12-medium" class="is-preload" id="myFunction()">
			 <div id="padding">

				 <label for="priceunit" id="toppadding">Price per Unit<span style="color:red;">*</span></label>
				 <br>
				 <input type="number" min="0.00" placeholder="RM" name="priceunit[]" required>
				 <br>
				 <label for="totalprice" id="toppadding">Quantity<span style="color:red;">*</span></label>
				 <br>
				 <input type="number" placeholder="Enter Quantity" name="quantity[]" required>
				 <br>
				 <label for="totalprice" id="toppadding">Total Price<span style="color:red;">*</span></label>
				 <br>
				 <input type="number" min="0.00" placeholder="RM" name="totalprice[]" required>
				 <br>
				 <label for="file" id="toppadding">Upload Receipt<span style="color:red;">*</span></label>
				 <input type="file" name="file[]" accept="image/*" required>
				 <br>
				 <br>
				 <br>
				 <button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">Remove</button>

			 <div/>
		 </div>
	 </div>
	 </div>`);
									});

									$(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
			$('#submit').submit(function(){
           $.ajax({
                url:"submitclaim.php",
                method:"POST",
								enctype: "multipart/form-data",
                data:$('#submitclaim').serialize(),
                success:function(data)
                {
                     $('#submitclaim')[0].reset();
                }
           });
      });
 });
 </script>

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
today = yyyy+'-'+mm+'-'+dd;

document.getElementById('date').value= today;
}
</script>

	</body>
</html>
