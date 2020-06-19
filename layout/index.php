<!DOCTYPE html>
<html>
<head>
	<title>SI Music Player</title>
	<link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>css/style.css">
	<link href="<?php echo ASSET; ?>images/favicon.ico" rel="shortcut icon">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
		<div class="main">
			<?php 

			if (isset($_GET['page'])) {
				include $_GET['page'] . ".php";
			} else {
				include "index_login.php";
			}

			?>

		</div>
</body>
</html>