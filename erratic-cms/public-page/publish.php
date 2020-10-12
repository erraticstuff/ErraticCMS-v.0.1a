
<?php
/*
$username = "root";
$password = "";
$database = "cms";
$content = $_POST['content'];
$title = $_POST['content-title'];
$id = rand(1,999);
$mysqli = new mysqli("localhost", $username, $password, $database);
$query="INSERT INTO posts (posts_id, title, content, id) VALUES ($id, $title , $content, $id)";
$mysqli->query("$query");
$mysqli->close();
*/
?>
<?php

$content = $_POST['content'];
//$name = $_POST['title'];
$id0 = rand(0,999);
$hash = md5($id0);
$id2 = $id0;
//mkdir($path, 777);
if($_SERVER['SERVER_NAME'] !== "localhost") {
	$info = "Oops. We can not post your page";
	$id2 = "N/A";
} else {
	if(!empty($content)) {
		$myfile = fopen("$hash.html", "w") or die("Oops. We can not post your page");
		//$txt = "John Doe\n";
		//fwrite($myfile, $txt);
		$txt = $content;
		fwrite($myfile, $txt);
		fclose($myfile);
		$info = "OwO Blog posted!";
	} else {
		$info = "Oops!\nWe think your post is completely empty!";
		$id2 = "N/A";
	}

		session_start();

		if (!isset($_SESSION['username'])) {
			$_SESSION['msg'] = "You must log in first";
			header('location: login.php');
		}

		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['username']);
			header("location: ../login.php");
		}
}

//	include('post-module.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
		<style>
		body {
		  margin: 0;
		  font-family: Arial, Helvetica, sans-serif;
		}

		.topnav {
		  overflow: hidden;
		  background-color: black;
		}

		.topnav a {
		  float: left;
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		  background-color: black;
		}

		.topnav a:hover {
		  background-color: grey;
		  color: yellow;
		}

		.topnav a.active {
		  color: white;
		  background-color: black;
		}

		.topnav a:visited {
		  color: white;
		  background-color: black;
		}

		.topnav .icon {
		  display: none;
		}

		@media screen and (max-width: 600px) {
		  .topnav a:not(:first-child) {display: none;}
		  .topnav a.icon {
		    float: right;
		    display: block;
		  }
		}

		@media screen and (max-width: 600px) {
		  .topnav.responsive {position: relative;}
		  .topnav.responsive .icon {
		    position: absolute;
		    right: 0;
		    top: 0;
		  }
		  .topnav.responsive a {
		    float: none;
		    display: block;
		    text-align: left;
		  }
		}
		</style>
	</head>
	<body>
		<div class="topnav" id="navbar">
			<a href="http://<?= $_SERVER['SERVER_NAME']; ?>" target="_blank">Visit site</a>
			<a href="../../admin">Dashboard</a>
			<a href="../../admin/posts.php">Posts</a>
			<a href="../../admin/post.php">New Post</a>
			<a href="../../admin/themes.php">Themes</a>
			<a href="../../admin/info.php">Server's Info</a>
			<a href="#">About Erratic CMS</a>
			<a href="#" onclick="alert('OwO\nYou triggered the easter egg\nCopyright &copy; 2020');" style="float: right;">Hello, <?php echo $_SESSION['username']; ?></a>
			<a href="?logout=1" style="color: red; float: right;">Logout</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<br>
		<?= $info ?><br>
		Page ID :
		<a href="../../?<?php echo $id2; ?>"><?php echo $id2; ?></a>
		<script>
function myFunction() {
	var x = document.getElementById("navbar");
	if (x.className === "topnav") {
		x.className += " responsive";
	} else {
		x.className = "topnav";
	}
}
</script>
	</body>
</html>