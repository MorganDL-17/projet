<body>
    <h1>BLOGoMOVIES | Search</h1>

<div>
	$movie = $search
	<br>Your results: <?=$search ?><br>
	<img src="<?=BASE_URL?>public/upload/<?= $movie->getImdbId()?>.jpg">

</div>
</body>