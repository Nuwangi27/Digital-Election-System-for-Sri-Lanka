<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="loginpage.css">
</head>

<body>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo.gif" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login1.php" method="post">

						<?php if (isset($_GET['error'])) { ?>
							<p class="error">
								<?php echo $_GET['error']; ?>
							</p>
						<?php } ?>
						<!--label created here-->
						<label>Username</label>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="username">
						</div>
						<label>Password</label>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value=""
								placeholder="password">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							
							<button type="button" name="button" class="btn login_btn">Login</button>
						</div>
						<!--
		 <label>User Name</label>
		 <input type="text" name="uname" placeholder="User Name"><br>

		 <label>Password</label>
		 <input type="password" name="password" placeholder="Password"><br>

		 <button type="submit">Login</button>
-->
					</form>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>