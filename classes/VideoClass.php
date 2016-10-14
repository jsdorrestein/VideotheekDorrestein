<?php
require_once('/MySqlDatabaseClass.php');
require_once("./config/config.php");


// Maak je sql opdracht

class VideoClass
{
    //Fields
    private $id;
    private $naam;
    private $omschrijving;
    private $genre;
    private $acteur;
    private $hoes;
    private $verhuurbaarAantal;
    //Properties
    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getNaam()
    {
        return $this->naam;
    }
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function getActeur()
    {
        return $this->acteur;
    }
    public function getHoes()
    {
        return $this->hoes;
    }
    public function getVerhuurbaarAantal()
    {
        return $this->verhuurbaarAantal;
    }
    //setters
    public function setId($value)
    {
        $this->id = $value;
    }
    public function setNaam($value)
    {
        $this->naam = $value;
    }
    public function setOmschrijving()
    {
        $this->omschrijving = $value;
    }
    public function setGenre()
    {
        $this->genre = $value;
    }
    public function setActeur()
    {
        $this->acteur = $value;
    }
    public function setHoes()
    {
        $this->hoes = $value;
    }
    public function setverhuurbaarAantal()
    {
        $this->verhuurbaarAantal = $value;
    }
    
    //Constuctor
    public function __construct()
    {
    }
    
    //Methods
    public static function find_by_sql($query)
    {
        
        global $database;
        
        
        $result = $database->fire_query($query);
        
        
        $object_array = array();
        
        // Doorloop alle gevonden records uit de database
        while ($row = mysqli_fetch_array($result)) {
            // Een object aan van de OptredenClass (De class waarin we ons bevinden)
            $object = new VideoClass();
            
            // Stop de gevonden recordwaarden uit de database in de fields van een OptredenClass-object
            $object->id                = $row['id'];
            $object->naam              = $row['naam'];
            $object->omschrijving      = $row['omschrijving'];
            $object->genre             = $row['genre'];
            $object->acteur            = $row['acteur'];
            $object->hoes              = $row['hoes'];
            $object->verhuurbaarAantal = $row['verhuurbaarAantal'];
            $object_array[]            = $object;
        }
        return $object_array;
    }
    
    public static function find_info_by_id($id)
    {
        $query            = "SELECT 	*
					  FROM 		`film`
					  WHERE		`id`	=	" . $id;
        $object_array     = self::find_by_sql($query);
        $videoclassObject = array_shift($object_array);
        return $videoclassObject;
    }
    
    public static function check_if_film_exists($naam)
    {
        global $database;
        $query  = "SELECT `naam`
					  FROM	 `film`
					  WHERE	 `naam` = '" . $naam . "'";
        $result = $database->fire_query($query);
        //ternary operator
        return (mysqli_num_rows($result) > 0) ? true : false;
    }
    
    public static function delete_by_id($id)
    {
                
        $sql    = "DELETE FROM `film` WHERE `id` = '" . $id . "'";
        $link   = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASENAME);
        $result = mysqli_query($link, $sql);
                
        $yesOrNo = ($result) ? "" : "niet ";

				echo "Het verwijderen is " . $yesOrNo . "gelukt.<br>
					U wordt doorgestuurd naar de vorige pagina";
        header("refresh:1;url=index.php?content=verwijderen");
        
    }
    
    public static function insert_film_database($post)
    {
        global $database;
        $query = "INSERT INTO `film` (`id`,
										   `naam`,
										   `omschrijving`,
										   `genre`,
                                           `acteur`,
                                           `hoes`,
										   `verhuurbaarAantal`)
					  VALUES			  (NULL,
										   '" . $post['naam'] . "',
										   '" . $post['omschrijving'] . "',
										   '" . $post['genre'] . "',
                                           '" . $post['acteur'] . "',
                                           '" . $post['hoes'] . "',
										   '" . $post['verhuurbaarAantal'] . "')";
        
        $database->fire_query($query);
        echo "Uw gegevens zijn verwerkt.";
        header("refresh:3;url=index.php?content=toevoegen");
    }
    
    
}
?>