<?php
    var_dump($_POST);
   session_start();
    
        $_SESSION["Ophaaldatum"] = $_POST["Ophaaldatum"];
		require_once("./classes/HuurClass.php");
		      
    var_dump($_SESSION);

        HuurClass::insert_orderitem_database($_SESSION);

        HuurClass::send_email($_SESSION);
?>


