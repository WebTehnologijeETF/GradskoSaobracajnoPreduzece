<?php

class KorisnikModel
{
	// ID
	public $id="";

	public function getID(){
		return $this->id;
	}

	public function setID($vrijednost){
		$this->id = $vrijednost;
	}
	// UserName
	public $userName="";

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($vrijednost){
		$this->userName = $vrijednost;
	}

	// PassHash
	public $passHash="";
	
	public function getPassHash(){
		return $this->passHash;
	}
	public function setPassHash($vrijednost){
		$this->passHash = $vrijednost;
	}

	// Email
	public $email = "";
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($vrijednost)
	{
		$this->email = $vrijednost;
	}

	public $isAdmin = "";
	public function getIsAdmin()
	{
		return $this->isAdmin;
	}
	public function setIsAdmin($vrijednost)
	{
		$this->isAdmin = $vrijednost;
	}
}