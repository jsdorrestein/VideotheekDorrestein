<?php
	if (isset($_POST['submit']))
	{
		require_once("./classes/VideoClass.php");
		if (VideoClass::check_if_film_exists($_POST['naam']))
		{
			//Zo ja, geef een melding dat het emailadres bestaat en stuur
			//door naar register_form.php
			echo "Deze video staat al in de database.<br>
				  Graag een nieuwe invoeren. U wordt doorgestuurd naar<br>
				  het invoeren";
			header("refresh:2;url=index.php?content=toevoegen");
		}
		else
		{
			VideoClass::insert_into_database($_POST);
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
	   <form class="form-horizontal" method="post">
            <div class="form-group">
                 <div class="form-group">
                     <label class="control-label" for="exampleInputPassword1">Naam</label>
                     <input class="form-control" name="naam" placeholder="Naam" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Beschrijving</label>
                    <input class="form-control" name="omschrijving" placeholder="Beschrijving" type="text">	
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Acteur</label>
                    <input class="form-control" name="acteur" placeholder="Acteur" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Genre</label>
                    <input class="form-control" name="genre" placeholder="Genre" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Hoes</label>
                    <input class="form-control" name="hoes" placeholder="Hoes" type="text">
                </div>
				<div class="form-group">
                    <label class="control-label" for="exampleInputPassword1">Verhuurbaaraantal</label>
                    <input class="form-control" name="verhuurbaarAantal" placeholder="verhuurbaarAantal" type="text">
                </div>
                     
                    
                       <input type='submit' name='submit' />
                     </div>
                  </form>
                
               </header>
               
</div>

<?php
	}
?>


