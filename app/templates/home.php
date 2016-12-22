<body>
    <h1>BLOGoMOVIES</h1>

<p></p>

<div>
	<br>Discover <?=$moviesCount ?> films...<br>

	<a href="?page=<?= $currentPage-1 ?>">Previous /</a>
	<a href="?page=<?= $currentPage+1 ?>"> Next</a>

</div>

<form action="" method="post">
  Select a movie:<br> <input type="text"><br>
  <input type="submit" name="Searching" value="OK">
</form>

<?php foreach($movies as $movie): ?>

<a href="<?=BASE_URL?>detail?id=<?= $movie->getId(); ?>">
<img src="<?=BASE_URL?>public/upload/<?= $movie->getImdbId()?>.jpg"></a>

<?php endforeach; ?>

</body>
