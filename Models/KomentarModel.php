<?php

class KomentItem
{
  // ID
  public $id = "";
  
  public function getId()
  {
      return $this->id;
  }
  
  public function setId($vrijednost)
  {
      $this->id = $vrijednost;
  }
  
  // datum
  public $datumKreiranja = "";
  
  public function getDatumKreiranja()
  {
      return $this->datumKreiranja;
  }
  
  public function setaDatumKreiranja($vrijednost)
  {
      $this->datumKreiranja = $vrijednost;
  }
  
  // Autor
  public $autor = "";
  
  public function getAutor()
  {
      return $this->autor;
  }
  
  public function setAutor($vrijednost)
  {
      $this->autor = $vrijednost;
  }
  
  
  // mail
  public $mail = "";
  
  public function getMail()
  {
      return $this->mail;
  }
  
  public function setMail($vrijednost)
  {
      $this->mail = $vrijednost;
  }
  
  // sadrzaj
  public $sadrzaj = "";
  
  public function getSadrzaj()
  {
      return $this->sadrzaj;
  }
  
  public function setSadrzaj($vrijednost)
  {
      $this->sadrzaj = $vrijednost;
  }
}