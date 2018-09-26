<?php
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';

class UserController{
	protected $pdo;
	protected $config;
	protected $table;
	protected $conditions;
	protected $cols;
	protected $queryObject;
	protected $conObject;
	public $msg;

	public function __construct(){
		$this->config = require 'core/config.php';
		$this->conObject = new Connection($this->config);
		$this->pdo = $this->conObject->getConnect();
		$this->queryObject = new QueryBuilder($this->pdo);
		$this->msg = "";
	}

	public function login($username, $password){
		$this->table = array('user','registration');
		$this->cols = array('user_id' => 'user_id');
		$this->conditions =  array("email = :email", "password = :password","user_id = :user_id");
		$this->parameters = array(':email' => $username, ':password' => $password);

		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);

		if($this->queryObject->rowCount()){
			
			$_SESSION['login'] = true;
			$_SESSION['user_id'] = $user[0]['user_id'];	
			header('Location: user.php');
			
		}else{
			$this->msg = "Invalid username and/or password.";
		}
		return $user;
	}


}