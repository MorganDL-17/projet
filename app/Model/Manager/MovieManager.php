<?php

namespace Model\Manager;

use Model\Db;
use PDO;
use Model\Entity\movie;


class MovieManager {
	
	public function findMovies($page)
 {
   $numPerPage = 12; //nbre de films par page
   $offset = ($page-1) * $numPerPage; //nbre de films à sauter ds la requete
   $sql = "SELECT * FROM movies 
           ORDER BY rating DESC
           LIMIT $numPerPage
           OFFSET $offset";  

   $dbh = Db::getDbh();    
   $stmt = $dbh->prepare($sql);
   $stmt->execute();

   $results = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Model\Entity\Movie");    
   return $results;
 }

    public function create(movie $movie)
    {    
      $sql = "INSERT INTO movies (imdbId, title, year, cast, directors, writers, plot)
				      VALUES (:imdbId, :title, :year, :cast, :directors, :writers, :plot)";

        $dbh = Db::getDbh();        
        $stmt = $dbh->prepare($sql);

  		  $stmt->bindValue(":imdbId", $movie->getImdbId());
        $stmt->bindValue(":title", $movie->getTitle());
      	$stmt->bindValue(":year", $movie->getYear());
		    $stmt->bindValue(":cast", $movie->getCast());
		    $stmt->bindValue(":directors", $movie->getDirectors());
		    $stmt->bindValue(":writers", $movie->getWriters());
		    $stmt->bindValue(":plot", $movie->getPlot());

          return $stmt->execute();
    }

  	public function findOne($id)
    {    

      $sql = "SELECT *
                 FROM movies
                 WHERE id = :id";

      $dbh = Db::getDbh();        
      $stmt = $dbh->prepare($sql);
      $stmt -> bindValue(":id", $id); //donne une valeur au paramètre

      $stmt->execute();

      $result = $stmt->fetchObject('\Model\Entity\Movie');        
        return $result;

    }
       
    public function countAll()
    {
        $sql = "SELECT COUNT(*) FROM movies";
        $dbh = Db::getDbh(); 
        $stmt= $dbh->prepare($sql);
        $stmt->execute();
        $count= $stmt->fetchColumn(); //qd on récupère une seule cell

        return $count;
    }

    public function searchMovies($search,$page)
 {
       $sql = "SELECT * FROM movies 
          WHERE $search = :%title% AND
          WHERE $search = :%year% AND
          WHERE $search = :%cast% AND
          WHERE $search = :%directors% AND
          WHERE $search = :%writers% AND
          WHERE $search = :plot AND
          WHERE $search = :rating";
   
   $dbh = Db::getDbh();    
   $stmt = $dbh->prepare($sql);
   $stmt->execute();
   $search = $stmt->fetchAll();

   return $search;
 }

}




