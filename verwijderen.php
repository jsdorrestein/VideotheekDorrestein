<div id="headerwrap" id="home" name="home">
  <header class="clearfix">
    <?php
      if (isset($_POST['submit']))
      {
        require_once("./classes/VideoClass.php");
        if (VideoClass::delete_by_id($_POST['filmID']))
        {
            //Zo ja, geef een melding dat het emailadres bestaat en stuur
            //door naar register_form.php
            echo "De film is niet verwijderd.<br>
                  Probeer het nog een keer.";
            header("refresh:2;url=index.php?content=verwijderen");
        }
        else
        {
            echo "Het is Gelukt!";
        }
       
      }
      else
      {
        require_once("./classes/VideoClass.php");
         $query = "SELECT film.id, film.naam, film.omschrijving, film.acteur, film.hoes ,film.genre, film.hoes, film.verhuurbaarAantal FROM film";
         $films = VideoClass::find_by_sql($query);
         echo "<div class='section'><div class='container'><div class='row'>";
 
         foreach ($films as $value){
           ?>
    <form method='POST'>
      <tbody>
        <td><a href='index.php?content="<?php $value->getNaam(); ?>"'></a></td>
        <td><?php echo $value->getOmschrijving(); ?> </td>
        <br>
        <td><?php echo $value->getActeur(); ?>"</td>
        <br>
        <td><?php echo $value->getGenre(); ?></td>
        <br>
     
      </tbody>
      <input type="hidden" name="filmID" value="<?php echo $value->getId(); ?>">
      <input type="submit" name="submit" >
    </form>



<?php
    }
  }
  ?>
</header>
</div>