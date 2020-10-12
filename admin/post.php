<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../ecms-login.php?redirect=new-post');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../ecms-login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" >
	</head>
	<body>
		<div class="topnav" id="navbar">
			<a href="http://<?= $_SERVER['SERVER_NAME']; ?>" target="_blank">Visit site</a>
			<a href="index.php">Dashboard</a>
			<a href="posts.php">Posts</a>
			<a href="#">New Post</a>
			<a href="themes.php">Themes</a>
			<a href="info.php">Server's Info</a>
			<a href="https://redirect.erraticstuff.co/cms?page=about">About Erratic CMS</a>
			<a href="#" onclick="alert('OwO\nYou triggered the easter egg\nCopyright &copy; 2020');" style="float: right;">Hello, <?php echo $_SESSION['username']; ?></a>
			<a href="?logout=1" style="color: red; float: right;">Logout</a>
			<a href="javascript:void(0);" class="icon" onclick="pop()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<br>
		<div style="background-color: lightgrey; max-height: 150px; height: auto; width: 100%; padding-top: 20px; padding-bottom: 20px; padding-left: 2px;">Use <a href="https://html-online.com/editor/" target="_blank">html-online.com</a> for convert your paragraph or headings or others to html code</div>
		<br>
		<form action="../erratic-cms/public-page/publish.php" name="content" method="POST">
			<center>
				<textarea placeholder="Paste or type the html code in here!" name="content" style="width: 100% max-width: 100%; height: 100px;"></textarea>
			</center>
			<br>
			<input style="text-align: right;" type="submit" value="Post!">
		</form>
		<h3 style="bottom: 1;">Powered by ErraticCMS</h3>
		<script src="script.js" type="text/javascript"></script>
	</body>
</html>
