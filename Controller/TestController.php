<?php

session_start();

include 'AppController.php';
include '../Model/UsersModel.php';

class TestController{
	protected $controlleur;
	protected $model;
	
	public function TestController()
	{
		$this->controlleur = new AppController();
		$this->model = new UsersModel();
		if(isset($_POST)&&!empty($_POST))
		{
			if(isset($_POST['operation'])&&!empty($_POST['operation']))
			{
				switch($_POST['operation'])
				{
					case 'ajouterUtilisateur' :
						$this->addUser();
						break;
				}
			}
		}
		else
		{
			if(isset($_GET['page'])&&!empty($_GET['page']))
			{
				switch($_GET['page'])
				{
					case 'Accueil' :
						$this->accueil();
						break;
					case 'Login' :
						$this->login();
						break;
					case 'Note' :
						$this->creationNotes();
						break;
					default :
						$this->accueil();
						break;
				}
			}
		}
	}

	public function accueil()
	{
		$this->controlleur->setCss(array("../assets/css/CrazyInput.css","../assets/css/CrazyMenu.css","../assets/css/CrazyButton.css"));
		$this->controlleur->setJs(array("../assets/js/CrazyInput.js","../assets/js/CrazyButton.js"));
		
		$this->controlleur->setTitle("Creation de compte");
		$this->controlleur->setItems(array("Mail","Mot de passe","Nom"));
		$this->controlleur->setMethode("ajouterUtilisateur");
		$this->controlleur->setAction("../Controller/AuthController.php");
		
		$this->controlleur->setHtml(array('../View/Menu.php','../View/CreateUser.php'));
		$this->controlleur->renderPage();
	}
	
	public function login()
	{
		$this->controlleur->setCss(array("../assets/css/CrazyInput.css","../assets/css/CrazyMenu.css","../assets/css/CrazyButton.css"));
		$this->controlleur->setJs(array("../assets/js/CrazyInput.js","../assets/js/CrazyButton.js"));
		
		$this->controlleur->setTitle("Creation de compte");
				$this->controlleur->setItems(array("Mail","Mot de passe"));
		$this->controlleur->setMethode("ajouterUtilisateur");
		$this->controlleur->setAction("../Controller/AuthController.php");
		
		$this->controlleur->setHtml(array('../View/Menu.php','../View/CreateUser.php'));
		$this->controlleur->renderPage();
		$this->controlleur->renderPage();
	}
	
	public function creationNotes()
	{
		$this->controlleur->setCss(array("../assets/css/CrazyInput.css","../assets/css/CrazyMenu.css","../assets/css/CrazyButton.css"));
		$this->controlleur->setJs(array("../assets/js/CrazyInput.js","../assets/js/CrazyButton.js"));
		
		$this->controlleur->setTitle("Creation de compte");
				$this->controlleur->setItems(array("Titre","Contenu","Date de creation","Hashtag"));
		$this->controlleur->setMethode("ajouterUtilisateur");
		$this->controlleur->setAction("../Controller/AuthController.php");
		
		$this->controlleur->setHtml(array('../View/Menu.php','../View/CreateUser.php'));
		$this->controlleur->renderPage();
	}
	
	
	public function addUser()
	{
		$user_indexes = $this->controlleur->makeIndex($_POST);
		if($user= isset($user_indexes['success']))
			echo json_encode(array('success'=>!$user));
		else
			echo json_encode(array('success'=>!empty($this->model->setUser($user_indexes))));
		//$this->model->setUser($this->check($posted_user[0]),$this->check($posted_user[1]),$this->check($posted_user[2]));
	}
}

$site = new TestController();