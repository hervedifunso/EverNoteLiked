<?php
/**
 * Created by PhpStorm.
 * User: JOACHIM
 * Date: 11/06/2017
 * Time: 00:21
 */

class UsersModel{
	protected $connection;
    protected $database;
	protected $tableUsers;
	
	public function UsersModel()
	{

		try {
			$this->connection = new MongoClient();
			$this->database = $this->connection->EverNoteLike;
			$this->tableUsers = $this->database->Users;
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	public function setUser($user_datas)
	{
		return $this->tableUsers->insert($user_datas);
		/*$utilisateur = $this->tableUsers->find();
		foreach($utilisateur as $nom)
			echo $nom['user_Nom']."\n";*/
	}
	
}
 
 /*
function getAllUsers() {
    $m = new MongoClient();
    $db = $m->EverNoteLike;
    $coll = $db->Users;
    $cursor = $coll->find();
}

function displayAllUsers()
{

}

foreach ($cursor as $doc) {
    echo("Bienvenue " . $doc["name"] . " !");
}*/