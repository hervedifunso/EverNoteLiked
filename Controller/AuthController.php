<?php

session_start();

/**
 * Created by PhpStorm.
 * User: JOACHIM
 * Date: 11/06/2017
 * Time: 01:55
 */


include '../Model/UsersModel.php';

class AuthController{
	
	protected $model;
	
	public function AuthController()
	{
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
						$this->pageWeb(array("Mail","Mot de passe","Nom"));
						break;
					case 'Login' :
						$this->pageWeb(array("Mail", "Mot de passe"));
						break;
					default :
						$this->pageWeb();
						break;
				}
			}
		}
	}

	public function pageWeb($elements)
	{
		$styleVue=array("../assets/css/CrazyInput.css","../assets/css/CrazyMenu.css","../assets/css/CrazyButton.css");
		$evenementsVue=array("../assets/js/CrazyInput.js","../assets/js/CrazyButton.js");
		
		$title="Creation de compte";
		$donneesVue=$elements;
		$operation="ajouterUtilisateur";
		$nomCont="../Controller/AuthController.php";
		
		include '../View/Menu.php';
		include '../View/CreateUser.php';
	}
	
	
	public function addUser()
	{
		$user_indexes = $this->makeIndex($_POST);
		if($user= isset($user_indexes['success']))
			echo json_encode(array('success'=>!$user));
		else
			echo json_encode(array('success'=>!empty($this->model->setUser($user_indexes))));
		//$this->model->setUser($this->check($posted_user[0]),$this->check($posted_user[1]),$this->check($posted_user[2]));
	}
	
	public function makeIndex($raw_user_datas)
	{
		array_shift($raw_user_datas);
		$user_datas=array();
		$posted_indexes=array_keys($raw_user_datas);
		$posted_user=array_values($raw_user_datas);
		for($i=0;$i<count($raw_user_datas);$i++)
			if(!empty($posted_user[$i]))
				$user_datas = array_merge($user_datas,array("user_".$posted_indexes[$i]=>$this->check($posted_user[$i])));
			else $user_datas['success']=false;
		return $user_datas;
	}
	
	//a mettre dans classe outil
	public function check($test)
	{
		if(isset($test)&&!empty($test)) return strip_tags($test);
		else return '';
	}
}

$site = new AuthController();