<?php include('ecms-module-su.php') ?>
<?php include('ecms-config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?=  ECMS_SITE_NAME; ?> - Login</title>
	<link rel="stylesheet" type="text/css" href="admin/style.css">
</head>
<body>

<div class="login">
	<form method="post" action="#login">
		<h2>Login</h2>
		<?php include('admin/errors.php'); ?>
			<label>Username</label><br>
			<input type="text" name="usrname"><br>
			<label>Password</label><br>
			<input type="password" name="pwd"><br>
			<button type="submit" class="btn" name="login">Login</button>
	</form>
</div>

</body>
</html>
