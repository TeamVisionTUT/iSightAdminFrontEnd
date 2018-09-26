<?php
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';



class Controller{
	protected $queryObject;
	protected $pdo;
	protected $conditions;
	protected $table;
	protected $con;
	protected $config;
	protected $cols;
	public $msg;
	
	public function __construct(){

		$this->config = require 'core/config.php';
		$this->con = new Connection($this->config);
		$this->pdo = $this->con->getConnect();
		$this->queryObject = new QueryBuilder($this->pdo);
		
	}
	

	public function getUserInfo($user_id){
		$this->table = array('user');
		$this->cols = array('*' => '');
		$this->conditions =  array('user_id = :user_id');
		$this->parameters = array(':user_id' => $user_id);
		$user = $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
		//$count = $this->queryObject->rowCount();
		//print_r($user);
		return $user;
	}
/*

	public function createSuspect($idno,$firstname,$lastname){
		if(!$this->getSuspect($idno)){
			$gender = $this->getGender($idno);
			$nationality = $this->getNationality($idno);
			$this->table = 'suspect';
			$this->conditions =  array();
			$this->cols = array('idno' => $idno,'firstName' => $firstname,'lastname' => $lastname,'gender' => $gender, 'nationality' => $nationality);
			$this->queryObject->insertQuery($this->table,$this->cols,$this->conditions);
			$this->msg = "Adding new record is successful";
			return true;
		}else{
			$this->msg = "Suspect already exists";
			return false;
		}

	}

	public function createCriminalRecord($suspect_no, $crime, $sentence, $place_of_issue, $issuer, $issue_date){
		$this->table = "criminal_record";
		
		$user_id = $_SESSION['user_id'];


		$this->cols = array('suspectno' => $suspect_no, 'rec_date' => $issue_date, 'sentance' => $sentence, 'isued_at' => $place_of_issue, 'isued_by' => $issuer, 'crimeno' => $crime, 'user_id' => $user_id); 
		$this->conditions = array();
		return $this->queryObject->insertQuery($this->table, $this->cols, $this->conditions);
	}

	
	public function getOffence(){
		$this->table = array('crime');
		$this->cols = array('*' => '');
		$this->conditions =  array();
		$this->parameters = array();
		return  $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
	}


	public function searchSuspect($idno){
		$this->table = array('suspect');
		$this->cols = array('*' => '');
		$this->conditions =  array('idno = :idno');
		$this->parameters = array(':idno' => $idno);
		return  $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
	}

	public function getCriminalRecords($suspectNo){
		$this->table = array('criminal_record');
		$this->cols = array('*' => '');
		$this->conditions =  array('suspectNo = :suspectNo');
		$this->parameters = array(':suspectNo' => $suspectNo);
		return  $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
	}

	public function vilidateID($idno){
		$valid = true;
		if(strlen($idno) != 13 || !is_numeric($idno)){
			$valid = false;
			$this->msg = "Invalid ID number";
		}
		
		//get the year
		$year = substr($idno, 0,2);
		$currentYear = date("Y") % 100;
		$prefix = "19";
		if ($year < $currentYear)
		    $prefix = "20";
	    $id_year = $prefix.$year;
	    
	    //get the month
        $id_month = substr($idno, 2,2);
        //get the date
        $id_date = substr($idno, 4,2);

        //check if date is valid
        if(!checkdate($id_month, $id_date, $id_year)){
        	$valid = false;
			$this->msg = "Invalid ID number";
        }
        //check if twelfth digit is an 8 or 9
        if(substr($idno, 11,1) != 8 && substr($idno, 11,1) != 9){
        	$valid = false;
			$this->msg = "Invalid ID number";
        }

        //check if twelfth digit is an 8 or 9
        if(substr($idno, 10,1) != 0 && substr($idno, 10,1) != 1){
        	$valid = false;
			$this->msg = "Invalid ID number";
        }
		return $valid;
	}

	public function updateCR($sentence, $issuePlace, $issuer, $issueDate,$crimeno ,$rec_no){
		$this->table = 'criminal_record';
		$this->cols = array('sentance' => $sentence, 'isued_at' => $issuePlace, 'isued_by' => $issuer, 'rec_date' => $issueDate, 'crimeno'=> $crimeno);
		$this->conditions =  array('rec_no = :rec_no');
		$this->parameters = array('rec_no' => $rec_no);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
	}

	public function updateSuspect($idno, $fname, $lname, $supectNo){
		$gender = $this->getGender($idno);
		$nationality = $this->getNationality($idno);
		$this->table = 'suspect';
		$this->cols = array('idno' => $idno, 'firstName' => $fname, 'lastname' => $lname, 'gender' => $gender, 'nationality' => $nationality);
		$this->conditions =  array('suspectno = :suspectno');
		$this->parameters = array('suspectno' => $supectNo);
		$this->queryObject->updateQuery($this->table,$this->cols,$this->conditions, $this->parameters);
	}

	private function getGender($idno){
		$genderCode = substr($idno, 6,4);
        $gender = (int)$genderCode < 5000 ? "Female" : "Male";
        return $gender;
	}
	private function getNationality($idno){
		$nationCode = substr($idno, 10,1);
        $nationality = (int)$nationCode == 0 ? "South African" : "Non South African";
        return $nationality;
	}
	public function getCrime($crimeno){
		$this->table = array('crime');
		$this->cols = array('crime_description' => '');
		$this->conditions =  array('crimeno = :crimeno');
		$this->parameters = array(':crimeno' => $crimeno);
		return  $this->queryObject-> selectQuery($this->table,$this->cols,$this->conditions,$this->parameters);
	}*/
}
?>