<?php
require_once('VijestModel.php');
require_once('KorisnikModel.php');
function getPDO() {
	return new PDO("mysql:dbname=wt8;host=127.11.231.130;charset=utf8", "dbihorac", "password1");
}

function fechVijestiSaKomentarima() {
	$query = getPDO()->query("SELECT * FROM vijest LEFT OUTER JOIN komentar ON vijest.id = komentar.vijest JOIN korisnik ON korisnik.UserID = vijest.autor");
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	$toReturn = array();
	if($query->rowCount()){
		$lastId = 0;
	   foreach($result as $row){
		 
		 if($lastId != $row['id']) {
			 $newsItem = new VijestModel();
			 
			 $newsItem->setId($row['id']);
			 $newsItem->setDatumKreiranja($row['vrijeme']);
			 $newsItem->setAutor($row['Username']);
			 $newsItem->setTitle($row['naslov']);
			 $newsItem->setTekst($row['skraceno']);
			 $newsItem->setDetaljanTekst($row['tekst']);
			 $newsItem->setSlika($row['slika']);
			 
			 foreach($result as $subrow) {
				if ($subrow['vijest'] == $row['id']) {
					$comment = new KomentItem();
					$commentList = $newsItem->getComments();
					
					$comment->setId($subrow['komentar_id']);
					$comment->setaDatumKreiranja($subrow['kom_vrijeme']);
					$comment->setAutor($subrow['kom_autor']);
					$comment->setContent($subrow['kom_text']);
					$comment->setEmail($subrow['kom_email']);
					
					array_push($commentList, $comment);
					$newsItem->setComments($commentList);
				}
			 }
			 array_push($toReturn, $newsItem);
		 }
		 $lastId = $row['id'];
	   }
		
	}
	return $toReturn;
}
function fetchNewsItemWithComments($id) {
	
	$preparedQuery = "SELECT * FROM vijest LEFT OUTER JOIN komentar ON vijest.id = komentar.vijest JOIN korisnik ON korisnik.UserID = vijest.autor WHERE vijest.id = :id";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	if($query->rowCount()){
	   foreach($result as $row)
	   {
	   		$newsItem = new VijestModel();
			 
			$newsItem->setId($row['id']);
			$newsItem->setDatumKreiranja($row['vrijeme']);
			$newsItem->setAutor($row['Username']);
			$newsItem->setTitle($row['naslov']);
			$newsItem->setTekst($row['skraceno']);
			$newsItem->setDetaljanTekst($row['tekst']);
			$newsItem->setSlika($row['slika']);
			 
			foreach($result as $subrow) {
				if ($subrow['vijest'] == $row['id']) 
				{
					$comment = new KomentItem();
					$commentList = $newsItem->getComments();
					
					$comment->setId($subrow['komentar_id']);
					$comment->setaDatumKreiranja($subrow['kom_vrijeme']);
					$comment->setAutor($subrow['kom_autor']);
					$comment->setContent($subrow['kom_text']);
					$comment->setMail($subrow['kom_email']);
					
					array_push($commentList, $comment);
					$newsItem->setComments($commentList);
				}
			}
	
		return $newsItem;
		}
	}
	return null;
	
}
function saveComment($comment, $id) {
	
	$preparedQuery = "INSERT INTO komentar (kom_autor, kom_email, kom_text, vijest) VALUES (:author, :email, :content, :id)";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':author' => $comment->getAutor(),':email' => $comment->getMail(), ':content' => $comment->getSadrzaj() ,':id' => $id));
	
}
function getCommentCount($id)
{
	$preparedQuery = "SELECT Count(*) AS broj FROM komentar where vijest = :id";
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	if($query->rowCount())
	{
		foreach($result as $row)
	   	{
			return $row['broj'];
		}
	}
}
function fechNovostiAfterID($id)
{
	$preparedQuery = "SELECT * FROM vijest LEFT OUTER JOIN komentar ON vijest.id = komentar.vijest JOIN korisnik ON korisnik.UserID = vijest.autor where id > :id";
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	$toReturn = array();
	if($query->rowCount()){
		$lastId = 0;
	   foreach($result as $row){
		 
		 if($lastId != $row['id']) {
			 $newsItem = new VijestModel();
			 
			 $newsItem->setId($row['id']);
			 $newsItem->setDatumKreiranja($row['vrijeme']);
			 $newsItem->setAutor($row['Username']);
			 $newsItem->setTitle($row['naslov']);
			 $newsItem->setTekst($row['skraceno']);
			 $newsItem->setDetaljanTekst($row['tekst']);
			 $newsItem->setSlika($row['slika']);
			 
			 foreach($result as $subrow) {
				if ($subrow['vijest'] == $row['id']) {
					$comment = new KomentItem();
					$commentList = $newsItem->getComments();
					
					$comment->setId($subrow['komentar_id']);
					$comment->setaDatumKreiranja($subrow['kom_vrijeme']);
					$comment->setAutor($subrow['kom_autor']);
					$comment->setContent($subrow['kom_text']);
					$comment->setEmail($subrow['kom_email']);
					
					array_push($commentList, $comment);
					$newsItem->setComments($commentList);
				}
			 }
			 array_push($toReturn, $newsItem);
		 }
		 $lastId = $row['id'];
	   }
		
	}
	return $toReturn;
}

function getUserByEmail($email)
{
	$preparedQuery = "SELECT * FROM korisnik WHERE Email = :email";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':email' => $id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	if($query->rowCount()){
	   foreach($result as $row)
	   {
	   		$korisnik = new KorisnikModel();
			 
			$korisnik->setId($row['UserID']);
			$korisnik->setUserName($row['Username']);
			$korisnik->setPassHash($row['Password']);
			$korisnik->setEmail($row['Email']);
			$korisnik->setIsAdmin($row['Admin']);
			return $korisnik;
		}
	}
		return null;
}

function getAllUsers()
{
	$query = getPDO()->query("SELECT * FROM korisnik");
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	$toReturn = array();
	if($query->rowCount()){
	   foreach($result as $row)
	   {
	   		$korisnik = new KorisnikModel();
			 
			$korisnik->setId($row['UserID']);
			$korisnik->setUserName($row['Username']);
			$korisnik->setPassHash($row['Password']);
			$korisnik->setEmail($row['Email']);
			$korisnik->setIsAdmin($row['Admin']);
			array_push($toReturn, $korisnik);
		}
		return $toReturn;
	}
	return null;
}

function getUserByUserName($username)
{
	$preparedQuery = "SELECT * FROM korisnik WHERE Username = :username";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':username' => $username));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	if($query->rowCount()){
	   foreach($result as $row)
	   {
	   		$korisnik = new KorisnikModel();
			 
			$korisnik->setId($row['UserID']);
			$korisnik->setUserName($row['Username']);
			$korisnik->setPassHash($row['Password']);
			$korisnik->setEmail($row['Email']);
			$korisnik->setIsAdmin($row['Admin']);
			return $korisnik;
		}
	}
		return null;
}

function getUserByID($id)
{
	$preparedQuery = "SELECT * FROM korisnik WHERE UserID = :id";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);
	if($query->rowCount()){
	   foreach($result as $row)
	   {
	   		$korisnik = new KorisnikModel();
			 
			$korisnik->setId($row['UserID']);
			$korisnik->setUserName($row['Username']);
			$korisnik->setPassHash($row['Password']);
			$korisnik->setEmail($row['Email']);
			$korisnik->setIsAdmin($row['Admin']);
			return $korisnik;
		}
	}
	return null;
}

function addUser($user) {
	
	$preparedQuery = "INSERT INTO korisnik (Username, Password, Email, Admin) VALUES (:username, :password, :email, :admin)";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':username' => $user->{'userName'},':password' => $user->{'passHash'}, ':email' => $user->{'email'} ,':admin' => $user->{'isAdmin'}));
}

function updateUser($user) {
	
	$preparedQuery = "UPDATE korisnik SET  (Username, Password, Email, Admin) VALUES (:username, :password, :email, :admin) WHERE UserID = :id";
	
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':username' => $user->userName,':password' => $user->passHash, ':email' => $user->email ,':admin' => $user->isAdmin,':id' => $user->id));
}

function deleteUser($user)
{
	$preparedQuery = "DELETE FROM korisnik WHERE  UserID = :id";
	$query = getPDO()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $user));
}
?>