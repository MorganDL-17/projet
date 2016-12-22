<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>public/css/style.css">

</head>
<body>
	<div class="container">

		<?php //include le fichier spécifié à la fin des méthodes de contrôleurs ?>
		<?php include("app/templates/$page.php") ?>
	
	</div>
</body>
</html>