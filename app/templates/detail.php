
<body>
    <h1> BLOGoMOVIES | Votre film</h1>

	<article>

		<div><?= $movie->getTitle() ?></div>
		<img src="<?=BASE_URL?>public/upload/<?= $movie->getImdbId()?>.jpg">
		<div>Year: <br><?= $movie->getYear() ?><br>
		<br>Cast: <?= $movie->getCast() ?><br>
		<br>Directors: <?= $movie->getDirectors() ?><br>
		<br>Writers: <?= $movie->getWriters() ?><br>
		<br>Plot: <?= $movie->getPlot() ?><br>
		<br>Rating: <?= $movie->getRating() ?> /10<br></div>

	</article>
	
</body>


