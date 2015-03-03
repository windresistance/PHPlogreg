<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Log/Reg Template</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div id="container">
		<div class="errors">
			<?php  // get error messages from session if they exist
				if (isset($_SESSION['errors'])) {
					foreach ($_SESSION['errors'] as $error) {
						echo "<p class='errorMsg'>{$error}</p>";
					}
					unset($_SESSION['errors']);
				}
				if (isset($_SESSION['errtype'])) unset($_SESSION['errtype']);
			?>
		</div>
		
		<!-- user login form -->
		<form id="logForm" action="process.php" method="post">
			<h2>User Login</h2>
			<input type="hidden" name="action" value="login">
			<input type="text" name="email" placeholder="Email" autocomplete="off" autofocus>
			<input type="password" name="password" placeholder="Password" autocomplete="off">
			<input type="submit" value="Login">
		</form>
		
		<!-- user registration form -->
		<form id="regForm" action="process.php" method="post">
			<h2>User Registration</h2>
			<input type="hidden" name="action" value="register">
			<input type="text" name="firstName" placeholder="First name" autocomplete="off">
			<input type="text" name="lastName" placeholder="Last name" autocomplete="off">
			<input type="text" name="email" placeholder="Email" autocomplete="off">
			<input type="password" name="password" placeholder="Password" autocomplete="off">
			<input type="password" name="confirmPassword" placeholder="Password confirm" autocomplete="off">
			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>