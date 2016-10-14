<div id="headerwrap" id="home" name="home">
			<header class="clearfix">
     


   <?php
    require_once("./classes/VideoClass.php");
        
    $query = "SELECT film.id, film.naam, film.omschrijving, film.acteur, film.hoes ,film.genre, film.hoes, film.verhuurbaarAantal FROM film WHERE film.verhuurbaarAantal < 30";
    $films = VideoClass::find_by_sql($query);
    echo "<div class='section'><div class='container'><div class='row'>";
    foreach ($films as $value){
         echo "<div class='form-group'>
          <table class='table table-hover'>
            <tbody>
                <td><a href='film.php?id=".$value->getId()."'>".$value->getNaam()."</a></td>
                <td>".$value->getOmschrijving()."</td>
                <td>".$value->getActeur()."</td>
                <td>".$value->getGenre()."</td>
                </tr>
            </tbody>
         </table>
   </div>  
  </div> ";
        
    }
    echo "</div></div></div>";
    //var_dump($films);
?>

          

           </header>
</div>

          