<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Log/Reg Template</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<?php
		// set auto-filled form data
		if (isset($_SESSION['formdata'])) {
			$formFirstName = $_SESSION['formdata']['firstName'];
			$formLastName = $_SESSION['formdata']['lastName'];
			$formEmail = $_SESSION['formdata']['email'];
			unset($_SESSION['formdata']);
		} else {
			$formFirstName = "";
			$formLastName = "";
			$formEmail = "";
		}
	?>
	<div class="container">
		<div class="errors">
			<?php
				// get error messages from session if they exist
				if (isset($_SESSION['errors'])) {
					foreach ($_SESSION['errors'] as $error) {
						echo "<p class='errorMsg'>{$error}</p>";
					}
					unset($_SESSION['errors']);
				}
				if (isset($_SESSION['errtype'])) unset($_SESSION['errtype']);
			?>
		</div>
		<form class="form" id="logForm" action="process.php" method="post">
			<h2 class="form-header">Login</h2>
			<input type="hidden" name="action" value="login">
			<p>Email<input class="form-input" type="text" name="email" autocomplete="off" autofocus></p>
			<p>Password<input class="form-input" type="password" name="password" autocomplete="off"></p>
			<input class="form-submit" type="submit" value="Login">
		</form>
		<form class="form" id="regForm" action="process.php" method="post">
			<h2 class="form-header">Register</h2>
			<input type="hidden" name="action" value="register">
			<p>First name<input class="form-input" type="text" name="firstName" autocomplete="off" value="<?= $formFirstName ?>"></p>
			<p>Last name<input class="form-input" type="text" name="lastName" autocomplete="off" value="<?= $formLastName ?>"></p>
			<p>Email<input class="form-input" type="text" name="email" autocomplete="off" value="<?= $formEmail ?>"></p>
			<p>Password<input class="form-input" type="password" name="password" autocomplete="off"></p>
			<p>Password confirm<input class="form-input" type="password" name="confirmPassword" autocomplete="off"></p>
			<input class="form-submit" type="submit" value="Register">
		</form>
	</div>
</body>
</html>