<?php
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";

	include('ecms-config.php');
	// connect to database
	$db = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = hash(sha256, $password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password)
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db, $_POST['usrname']);
		$password = mysqli_real_escape_string($db, $_POST['pwd']);

		if (empty($username)) {
			array_push($errors, "Username can&apos;t be blank");
		}
		if (empty($password)) {
			array_push($errors, "Password can&apos;t be blank");
		}

		if (count($errors) == 0) {
			$password = hash(sha256, $password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				if($_GET['redirect'] == 'admin') {
					header('location: admin/index.php');
				} elseif ($_GET['redirect'] == 'sysinf') {
					header('location: admin/info.php');
				} elseif ($_GET['redirect'] == 'new-post') {
					header('location: admin/post.php');
				} elseif ($_GET['redirect'] == 'posts') {
					header('location: admin/posts.php');
				} elseif ($_GET['redirect'] == 'themes') {
					header('location: admin/themes.php');
				} else {
					header('location: index.php');
				}
				//posts
			}else {
				array_push($errors, "Wrong credentials");
			}
		}
	}

?>
