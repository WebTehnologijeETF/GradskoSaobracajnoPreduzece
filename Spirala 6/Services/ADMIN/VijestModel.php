<?php
require_once("KomentarModel.php");
 
class VijestModel
{
	
  function __construct() 
  {
	$this->komentari = array();
  }
  // id
  private $id = "";
  
  public function getId()
  {
      return $this->id;
  }
  
  public function setId($vrijednost)
  {
      $this->id = $vrijednost;
  }
  
  // datum
  private $datumKreiranja = "";
  
  public function getDatumKreiranja()
  {
      return $this->datumKreiranja;
  }
  
  public function setDatumKreiranja($vrijednost)
  {
      $this->datumKreiranja = $vrijednost;
  }
  
  // Autor
  private $autor = "";
  
  public function getAutor()
  {
      return $this->autor;
  }
  
  public function setAutor($vrijednost)
  {
      $this->autor = $vrijednost;
  }
  
  
  // naslov
  private $naslov = "";
  
  public function getTitle()
  {
      return $this->naslov;
  }
  
  public function setTitle($vrijednost)
  {
      $this->naslov = $vrijednost;
  }
  
  // tekst
  private $tekst = "";
  
  public function getTekst()
  {
      return $this->tekst;
  }
  
  public function setTekst($vrijednost)
  {
      $this->tekst = $vrijednost;
  }
  
  // detaljanTekst
  private $detaljanTekst = "";
  
  public function getDetaljanTekst()
  {
      return $this->detaljanTekst;
  }
  
  public function setDetaljanTekst($vrijednost)
  {
      $this->detaljanTekst = $vrijednost;
  }
  
  // komentari
  private $komentari;
  
  public function getComments()
  {
      return $this->komentari;
  }
  
  public function setComments($vrijednost)
  {
      $this->komentari = $vrijednost;
  }	

  // slika
  private $slika ="";
  
  public function getSlika()
  {
    $this->slika;
  }
  public function setSlika($vrijednost)
  {
    $this->slika = $vrijednost;
  }

}

