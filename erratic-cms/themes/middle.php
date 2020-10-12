
	<body>
		<div>
			<h1><?= ECMS_SITE_NAME; ?></h1>
			<h3><?= ECMS_SITE_DESC; ?></h3>
			<hr>
			<div class="nav">
				<a href="#">Home</a>
				<a href="?page_id=123">Blog</a>
				<a href="?page_id=1332">Contact</a>
			</div>
			<div class="container-main">
				<?= include 'erratic-cms/public-page/display.php'; ?>
			</div>
