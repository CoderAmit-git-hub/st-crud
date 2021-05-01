<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login your profile</title>
	<!-- Bootstrap Css Link -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Favicon Css Link -->
	<link rel="shortcut icon" href="assets/images/fav.ico" type="image/x-icon">
	<!-- Custom Css Link -->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<?php 

		if( isset($_POST['sub_btn']) ){
		// Data store
			$name     = $_POST['fname'];
			$rep_name = str_replace(' ','_',$name);
			$uname    = $_POST['uname'];
			$email    = $_POST['email'];
			$age      = $_POST['age'];
			$cell     = $_POST['cell'];
			$pass     = $_POST['pass'];
			$com_pass = $_POST['com_pass'];
			$loct     = $_POST['loct'];
			$photo    = $_FILES['img_file']['name'];
			$pho_tmp  = $_FILES['img_file']['tmp_name'];

		// Confirm password
			if( $pass==$com_pass ){
				$valid_pas = true;
			}else{
				$valid_pas = false;
			}

		// Form validate
			if( empty($name) || empty($uname) || empty($email) || empty($age) || empty($cell) || empty($pass) || empty($com_pass) || empty($loct) ){
				$mass = '<p class="alert alert-warning alert-dismissible fade show">All field are required !<button class="btn btn-close"></button></p>';
			}elseif( $age < 18 || $age > 100 ){
				$mass = '<p class="alert alert-warning alert-dismissible fade show">Your age is more than 17 and less than 101.<button class="btn btn-close"></button></p>';
			}elseif( $valid_pas==false ){
				$mass = '<p class="alert alert-warning alert-dismissible fade show">Password don\'t matched.<button class="btn btn-close"></button></p>';
			}else{

				$stu -> upLoadFile($_FILES['img_file'],'assets/images/');

				$mass = $stu -> stuDataInsert( $name, $uname, $email, $age, $cell, $pass, $loct, $photo, 'active' );
			}
		}

	 ?>

<br>
	<!-- Sign in form -->
	<div class="container">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<div class="card w-50 m-auto">
				<div class="card-header">
					<h2>Register Now</h2>

				<!-- Form submit result -->
					<?php 
						if( isset($mass) ){
							echo $mass;
						}
					 ?>

				</div>
				<div class="card-body">
					<div class="mb-3 row">
						<label for="intOne" class="col-sm-3 col-form-label">Full name</label>
						<div class="col-sm-9">
						<input name="fname" type="text" class="form-control" id="intOne" placeholder="Type your name...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intTwo" class="col-sm-3 col-form-label">Username</label>
						<div class="col-sm-9">
						<input name="uname" type="text" class="form-control" id="intTwo" placeholder="Type username...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intThree" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
						<input name="email" type="email" class="form-control" id="intThree" placeholder="Type email...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intFour" class="col-sm-3 col-form-label">Age</label>
						<div class="col-sm-9">
						<input name="age" type="text" class="form-control" id="intFour" placeholder="Type age...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intFive" class="col-sm-3 col-form-label">Cell</label>
						<div class="col-sm-9">
						<input name="cell" type="text" class="form-control" id="intFive" placeholder="Type cell...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intSix" class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
						<input name="pass" type="password" class="form-control" id="intSix" placeholder="Type password...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intSeven" class="col-sm-3 col-form-label">Confirm Password</label>
						<div class="col-sm-9">
						<input name="com_pass" type="password" class="form-control" id="intSeven" placeholder="Type confirm password...">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intEight" class="col-sm-3 col-form-label">Location</label>
						<div class="col-sm-9">
							<select name="loct" id="intEight" class="form-select">
								<option value="">-Select-</option>
								<option value="Dhaka">Dhaka</option>
								<option value="Mymensingh">Mymensingh</option>
								<option value="Rangpur">Rangpur</option>
								<option value="Rajshahi">Rajshahi</option>
								<option value="Khulna">Khulna</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Comilla">Comilla</option>
								<option value="Barishal">Barishal</option>
								<option value="Chittagong">Chittagong</option>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="intNine" class="col-sm-3 col-form-label">Profile Photo</label>
						<div class="col-sm-9">
						<input name="img_file" type="file" class="form-control" id="intNine">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button name="sub_btn" type="submit" class="btn btn-success">Register</button>
				</div>
				<div class="card-footer text-end">
					<span class="col-sm-6 text-start text-primary">Already have an account -> </span>
					<span class="col-sm-6 text-end pl-20"><a href="data.php" class="btn btn-primary text-center">Student Data</a></span>
				</div>
			</div>
		</form>
	</div>

<br>
<br>
<br>
<br>

	<!-- Javascript File Link -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/custom.js"></script>
	
</body>
</html>