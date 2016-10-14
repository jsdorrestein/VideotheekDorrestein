<?php
require_once('MySqlDatabaseClass.php');
require_once("./config/config.php");


// Maak je sql opdracht

class KoerierClass
{
    //Fields
    private $orderregel;
    private $ophaaldatum;
    private $afleverdatum;
    private $check;

    //Properties
    //getters
    public function getOrderregel()
    {
        return $this->orderregel;
    }
    public function getOphaaldatum()
    {
        return $this->ophaaldatum;
    }
    public function getAfleverdatum()
    {
        return $this->afleverdatum;
    }
    public function getCheck()
    {
        return $this->check;
    }
   
    //setters
    public function setOrderregel($value)
    {
        $this->orderregel = $value;
    }
    public function setOphaaldatum($value)
    {
        $this->ophaaldatum = $value;
    }
    public function setAfleverdatum()
    {
        $this->afleverdatum = $value;
    }
    public function setCheck()
    {
        $this->check = $value;
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
            $object = new KoerierClass();
            
            // Stop de gevonden recordwaarden uit de database in de fields van een OptredenClass-object
            $object->orderregel        = $row['orderregel'];
            $object->ophaaldatum       = $row['ophaaldatum'];
            $object->afleverdatum       = $row['afleverdatum'];
            $object->check             = $row['check'];
            $object_array[]            = $object;
        }
        return $object_array;
    }
    
    public static function find_info_by_orderregel($orderregel)
    {
        $query            = "SELECT 	*
					  FROM 		`filmtransport`
					  WHERE		`orderregel`	=	" . $orderregel;
        $object_array     = self::find_by_sql($query);
        $koerierclassObject = array_shift($object_array);
        return $koerierclassObject;
    }
    
    public static function check_if_order_exists($orderregel)
    {
        global $database;
        $query  = "SELECT `orderregel`
					  FROM	 `filmtransport`
					  WHERE	 `orderregel` = '" . $orderregel . "'";
        $result = $database->fire_query($query);
        //ternary operator
        return (mysqli_num_rows($result) > 0) ? true : false;
    }
	
	 public static function Find_koerier_data()
    {
        global $database;
        $query  ="SELECT Order.id, Order.emailadres, Order.afleverdatum, Order.ophaaldatum, Order.filmid, gebruiker.adres, gebruiker.woonplaats, gebruiker.postcode FROM `Order`, `gebruiker`";
        $result = $database->fire_query($query);
        //ternary operator
        return $result;
    }
    
    
    
    public static function insert_order_database($post)
    {
        global $database;
        $query = "INSERT INTO `filmtransport` (`orderregel`,
										   `ophaaldatum`,
										   `afleverdatum`,
										   `check`)
					  VALUES			  (NULL,
										   '" . $post['ophaaldatum'] . "',
										   '" . $post['afleverdatum'] . "',
										   '" . $post['check'] . "')";
        
        $database->fire_query($query);
        echo "Uw gegevens zijn verwerkt.";
        header("refresh:3;url=index.php?content=koerierHomepage");
    }
    
    
}
?>