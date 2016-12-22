<?php
namespace Controller;

use View\View; // on peut donc l'utiliser juste comme View plus bas

use \Model\Manager\MovieManager;


class DefaultController 
{
	//Affiche la page d'accueil
	public function home()
	{
		$currentPage = (empty($_GET['page']))?1:$_GET['page']; 		//crée une instance de notre gestionnaire d'entité
																	//pour récupérer les derniers articles à afficher
		$movieManager = new \Model\Manager\MovieManager();	
		$movies = $movieManager->findMovies($currentPage);

		// oompte le nb total de films
		$count = $movieManager->countAll();
		//Données qu'on rend disponible ds la vue
		$data = [	
			"movies"=> $movies,
			//la variable ds home.php s'appelle du coup moviesCount
			"moviesCount" => $count,
			"currentPage"=> $currentPage
			];
		View::show("home.php", "Accueil", $data);
	}

	public function detail()
	{
		$movieManager = new \Model\Manager\MovieManager();
		$id = $_GET['id'];
		$movie = $movieManager->findOne($id);

		View::show("detail.php", "Details", ["movie" => $movie]);
	}

	// Affiche un seul article
	public function movieDetails()
	{
		//crée une instance du manager
		$movieManager= new \Model\Manager\MovieManager();

		//récupère l'id dans l'URL
		if (!empty($_GET['id'])){
			$id = $_GET['id'];
		}
		else {
			//s'il n'y a pas d'id dans l'URL, retourne une 404
			return $this->error404();
		}
		$movie = $movieManager->findOne($id);
		//si le movie n'existe pas, erreur 404
		if (empty($movie)){
			return $this->error404();
		}

		//affiche la vue en lui passant le movie
		View::show("movie_details.php", $movie->getTitle(), ["movie" => $movie]);
	}

	// Crée un nouvel article. Affiche ET traite le formulaire
	public function createMovie()
	{
		//crée une nouvelle instance d'article
		$movie = new \Model\Entity\Movie();

		//si le formulaire est soumis...
		if (!empty($_movie)){
			var_dump($_movie);

			//hydrate l'instance à partir des données du form
			$movie->setTitle( $_movie['title'] );
			$movie->setContent( $_movie['content'] );

			//demande au manager de sauvegarder l'instance
			$movieManager= new \Model\Manager\movieManager();
			$movieManager->create($movie);
		}

		View::show("movie_create.php", "Publier un nouvel article", ["movie"=>$movie]);
	}
	// Affiche la page d'erreur 404
	 
	public function error404()
	{
		//envoie une entête 404 (pour notifier les clients que ça a foiré)
		header("HTTP/1.0 404 Not Found");
		View::show("errors/404.php", "Oups ! Perdu ?");
	}
}


