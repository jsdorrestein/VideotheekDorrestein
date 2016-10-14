<?php
	if (isset($_POST['submit']))
	{
		require_once("./classes/LoginClass.php");
		if (LoginClass::check_if_email_exists($_POST['emailadres']))
		{
			//Zo ja, geef een melding dat het emailadres bestaat en stuur
			//door naar register_form.php
			echo "Het door u gebruikte emailadres is al in gebruik.<br>
				  Gebruik een ander emailadres. U wordt doorgestuurd naar<br>
				  het registratieformulier";
			header("refresh:2;url=index.php?content=register_form");
		}
		else
		{
			LoginClass::insert_into_database($_POST);
            // echo "Op naar de loginclass::insert into database!";
		}
        //echo "Er is op de submit knop gedrukt!";
	}
	else
	{
?>
<!DOCTYPE html>

           <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	<h3>Registratieformulier</h3>
		<form  method='post'>
			Naam: <input type='text' name='naam' /><br>
            Achternaam: <input type='text' name='achternaam' /><br>
            Adres: <input type='text' name='adres' /><br>
            Postcode: <input type='text' name='postcode' /><br>
            Woonplaats: <input type='text' name='woonplaats' /><br>
			Emailadres: <input type='text' name='emailadres' /><br>
			<input type='submit' name='submit' />
		</form>
               </header>
</div>

<?php
	}
?>







