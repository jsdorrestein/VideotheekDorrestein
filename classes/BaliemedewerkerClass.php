<?php
require_once('MySqlDatabaseClass.php');
class BaliemedewerkerClass
{
    //Fields
    private $id;
    private $naam;
    private $omschrijving;
    private $genre;
    private $acteur;
    private $hoes;
    
    public function getId() { return $this->id;  }
    public function getNaam()   {   return $this->naam;  }
    public function getOmschrijving() {  return $this->omschrijving;  }
    public function getGenre()  { return $this->genre;  }
    public function getHoes()  {   return $this->hoes;  }
    public function getActeur()  {  return $this->acteur;  }
    
    public function setId($value)  {  $this->id = $value;   }
    public function setNaam($value)  {   $this->titel = $value;   }
    public function setOmschrijving($value) {  $this->omschrijving = $value;  }
    public function setGenre($value)  {  $this->genre = $value;  }
    public function setActeur($value)   {  $this->acteur = $value;   }
    public function setHoes($value)  {  $this->hoes = $value;  }
    
    
    public function __construct()
    {
        
    }
    
    public static function update_film($post)
    {
        global $database;
        $query = "UPDATE `film` 
					  SET	 `verhuurbaarAantal` = `verhuurbaarAantal` + 1
					  WHERE	 `id`		=	'" . $_POST['id'] . "'";
        $database->fire_query($query);
    }

}