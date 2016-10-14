                         <?php
if (isset($_POST['update'])) {
    echo "Film is beschikbaar aan database.";
    
    header("refresh:4;url=index.php?content=baliemedewerkerHomepage");
    
    require_once("./classes/BaliemedewerkerClass.php");
    
    BaliemedewerkerClass::update_film($_POST);
    
    } 
    else 
    {

    ?>


<div id="headerwrap" id="home" name="home">
  <header class="clearfix">
             
      
      <form role="form" action='' method='post'>
            <div class="form-group">
                <label for="id">Id van de film</label>
                <input type="text" class="form-control" name="id" placeholder="Voer id in.">
            </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>
        </form>
      
      </header>
</div>
    
    <?php
}

?>