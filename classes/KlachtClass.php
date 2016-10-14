<?php
	require_once("MySqlDatabaseClass.php");
    require_once("./config/config.php");
	class KlachtClass
	{
	
		//Fields
		private $id;
		private $email;
		private $klacht;

		//Properties
		//getters
		public function getId() { return $this->id; }
		public function getEmail() { return $this->email; }
		public function getKlacht() { return $this->klacht; }

		//setters
		public function setId($value) { $this->id = $value; }
		public function setEmail($value) { $this->email = $value; }
		public function setKlacht() { $this->klacht = $value; }

		
		//Constructor
		public function __construct() {}
		//Methods
		/* Hier komen de methods die de informatie in/uit de database stoppen/halen
		*/
		public static function find_by_sql($query)
		{
			// Maak het $database-object vindbaar binnen deze method
			global $database;
			// Vuur de query af op de database
			$result = $database->fire_query($query);
			// Maak een array aan waarin je LoginClass-objecten instopt
			$object_array = array();
			// Doorloop alle gevonden records uit de database
			while ( $row  = mysqli_fetch_array($result))
			{
				// Een object aan van de LoginClass (De class waarin we ons bevinden)
			$object = new KlachtClass();
				
				// Stop de gevonden recordwaarden uit de database in de fields van een OptredenClass-object
				$object->id				    = $row['id'];
				$object->email 				= $row['email'];
				$object->klacht     		= $row['klacht'];
				$object_array[] = $object;
			}
			return $object_array;
		}
		
		public static function insert_into_database($post)
		{
			global $database;
		    $query = "INSERT INTO `klacht` (`id`,
										   `email`,
										   `klacht`)
					  VALUES			  (NULL,
										   '".$post['email']."',
										   '".$post['klacht']."')";
			
			$database->fire_query($query);
			$last_id = mysqli_insert_id($database->getDb_connection());
			echo "Uw gegevens zijn verwerkt.";
			header("refresh:3;url=index.php?content=klachten");
		}
        
		public static function check_if_klacht_exists($id)
		{
            var_dump($id);
			global $database;
			$query = "SELECT `id`
					  FROM	 `klacht`
					  WHERE	 `id` = '".$id."'";
			$result = $database->fire_query($query);
			//ternary operator
			return (mysqli_num_rows($result) > 0) ? true : false;
		}
		}

?>