<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=posts');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
	}

  include('../ecms-config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
</head>
<body>
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
  <div class="topnav" id="navbar">
    <a href="http://<?= $_SERVER['SERVER_NAME']; ?>" target="_blank">Visit site</a>
    <a href="#">Dashboard</a>
    <a href="#">Posts</a>
    <a href="post.php">New Post</a>
    <a href="themes.php">Themes</a>
    <a href="info.php">Server's Info</a>
    <a href="https://redirect.erraticstuff.co/cms?page=about">About Erratic CMS</a>
    <a href="#" onclick="alert('OwO\nYou triggered the easter egg\nCopyright &copy; 2020');" style="float: right;">Hello, <?php echo $_SESSION['username']; ?></a>
    <a href="?logout=1" style="color: red; float: right;">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="pop()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
		<h1>Your Posts</h1>
        <h1>Welp...</h1>
        <p>"Your posts" feature didn't available yet... 😕</p>
		<h3 style="bottom: 1;">Powered by ErraticCMS</h3>
        <script src="script.js" type="text/javascript"></script>
</body>
</html>
