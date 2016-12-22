<?php

namespace Model\Entity;

class Movie
{
	private $id; //clef primaire
	private $imdbId;
	private $title;
	private $year;
	private $cast;
	private $directors;
	private $writers;
	private $plot;
	private $rating;
	private $name;
	private $movieId;
	private $genreId;


	private $validationErrors = []; //contient les erreurs de validation


	public function isValid()
	{
		$isValid = true;

		return $isValid;
	}

	public function getid()
	{
		return $this->id;
	}

	//getter pour les erreurs de validation

	public function getValidationErrors()
	{
		return $this->validationErrors;
	}
	public function __construct()
	{	
	}

	public function getImdbId()
	{
		return $this->imdbId;
	}
	public function setImdbId($imdbId)
	{
		$this->imdbId = $imdbId;
	}

	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getYear()
	{
		return $this->year;
	}
	public function setYear($year)
	{
		$this->year = $year;
	}

	public function getCast()
	{
		return $this->cast;
	}
	public function setCast($cast)
	{
		$this->cast = $cast;
	}
	
	public function getDirectors()
	{
		return $this->directors;
	}
	public function setDirectors($directors)
	{
		$this->directors = $directors;
	}

	public function getWriters()
	{
		return $this->writers;
	}

	public function setWriters($writers)
	{
		$this->writers = $writers;
	}
	
	public function getPlot()
	{
		return $this->plot;
	}
	public function setPlot($plot)
	{
		$this->plot = $plot;
	}

	public function getRating()
	{
		return $this->rating;
	}
	public function setRating($rating)
	{
		$this->plot = $plot;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getMovieId()
	{
		return $this->movieId;
	}
	public function setMovieId($movieId)
	{
		$this->movieId = $movieId;
	}
}