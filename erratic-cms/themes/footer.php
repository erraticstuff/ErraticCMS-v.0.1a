
			    <div class="container-footer">
					<hr>
					<div class="container-footer-text-1">
						<span>Copyright &copy; <?= ECMS_SITE_NAME; ?> 2020 at<a href="<?= $_SERVER['SERVER_NAME']; ?>"><address><?= $_SERVER['SERVER_NAME']; ?></address></a></span>
						<br>
						<strong>Proudly powered by Erratic CMS</strong>
						<br><br>
					</div>
				</div>
			</div>
		<script>
		/*
Source code by W3Schools
Modified by Erratic Stuff
Copyright Erratic Stuff 2020
*/
var loader;

	function body() {
	loader = setTimeout(showPage, 3500);
}

function showPage() {
	document.getElementById("loader").style.display = "none";
	document.getElementById("main-content").style.display = "block";
}
		</script>
</html>
