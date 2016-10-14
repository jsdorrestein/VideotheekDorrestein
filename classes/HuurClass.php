<?php
	require_once('MySqlDatabaseClass.php');
    require_once('./config/config.php');

	class HuurClass
	{
		//Fields
		private $id;
		private $emailadres;
		private $ophaaldatum;
        private $afleverdatum;
        private $filmid;
        private $prijs;
        
		//Properties
		//getters
		public function getId() { return $this->id; }
		public function getEmailadres() { return $this->emailadres; }
		public function getOphaaldatum() { return $this->ophaaldatum; }
        public function getAfleverdatum() { return $this->afleverdatum; }
        public function getFilmid() { return $this->filmid; }
        public function getPrijs() { return $this->prijs; }
		//setters
		public function setId($value) { $this->id = $value; }
		public function setEmailadres($value) { $this->emailadres = $value; }
		public function setOphaaldatum($value) { $this->ophaaldatum = $value; }
        public function setAfleverdatum($value) { $this->afleverdatum = $value; }
        public function setFilmid($value) { $this->filmid = $value; }
        public function setPrijs($value) { $this->prijs = $value; }
		//Constuctor
		public function __construct() {}
		//Methods
        public static function insert_orderitem_database($post)
        {
            global $database;
            $query = "INSERT INTO `order` (`emailadres`,
                                           `ophaaldatum`,
                                           `afleverdatum`,
                                           `filmid`,
                                           `prijs`) 
                      VALUES              ('". $post['emailadres']."',
                                           '". $post['Ophaaldatum']."',
                                           '". $post['Afleverdatum']."',
                                           '". $post['filmid']."',
                                           5)";
//            echo $_SESSION['id'];
//            echo $post['titel'];
//            echo $post['prijs'];
            //echo $query;
            $database->fire_query($query);
            $last_id = mysqli_insert_id($database->getDb_connection());
            echo "Uw gegevens zijn verwerkt.";
            header("refresh:3;url=index.php?content=klantHomepage");
        }
		
		public static function find_by_sql($query)
    {
        
        global $database;
        
        
        $result = $database->fire_query($query);
        
        
        $object_array = array();
        
        // Doorloop alle gevonden records uit de database
        while ($row = mysqli_fetch_array($result)) {
            // Een object aan van de OptredenClass (De class waarin we ons bevinden)
            $object = new HuurClass();
            
            // Stop de gevonden recordwaarden uit de database in de fields van een OptredenClass-object
            $object->emailadres        = $row['emailadres'];
            $object->ophaaldatum       = $row['ophaaldatum'];
            $object->afleverdatum       = $row['afleverdatum'];
            $object->filmid             = $row['filmid'];
			$object->emailadres = $row['emailadres'];
			$object_array[]            = $object;
        }
        return $object_array;
    }
        public static function clear_order()
        {
            global $database;
            $query =    "DELETE * FROM `order` WHERE `id` = " . $_SESSION['id'] . " ";
            echo $query;
//            $database->fire_query($query);
        }
        public static function remove_item_order($post)
        {
            global $database;
            $query =    "DELETE FROM `order` WHERE `emailadres` = " . $_SESSION['emailadres'] . "
                                                    AND `id` = " . $post["id"]. " ";
//            echo $query;
            $database->fire_query($query);
            echo "Uw gegevens zijn verwerkt.";
            header("refresh:4;url=index.php?content=klantHomepage");
        }
        public static function send_email($post)
		{
			$to = $post['emailadres'];
			$subject = "Huurbevestiging Jelle.";
			$message = "Geachte heer/mevrouw <br>";
			$message .= "Hierbij heeft u uw huurbevestiging bij videotheek Jelle."."<br>";
            $message .= "De filmkosten zijn 5 euro per week."."<br>";
			$message .= "De datum dat de video wordt afgeleverd is ".$post['Afleverdatum']."<br>";
            $message .= "De datum dat de video wordt opgehaald is ".$post['Ophaaldatum']."<br>";
			$message .= "Met vriendelijke groet,"."<br>";
			$message .= "Jelle Dorrestein"."<br>";
			$headers = 'From: no-reply@project.nl'."\r\n";
			$headers .= 'Reply-To: info@project.nl'."\r\n";
			$headers .= 'Cc: admin@project.nl'."\r\n";
			$headers .= 'Bcc: accountant@project.nl'."\r\n";
			//$headers .= "MIME-version: 1.0"."\r\n";
			//$headers .= "Content-type: text/plain; charset=iso-8859-1"."\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1"."\r\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();
			mail( $to, $subject, $message, $headers);
		}
        
            public static function check_if_email_exists($emailadres)
		{	
			var_dump($emailadres);
			global $database;
			$query = "SELECT `emailadres`,   FROM	 `order`
					  WHERE	 `emailadres` = '".$emailadres."'";
			$result = $database->fire_query($query);

			
		}
    }
?>