 <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
                

          





<?php
		 require_once("./classes/KoerierClass.php");
         $query = "SELECT filmtransport.orderregel, filmtransport.ophaaldatum, filmtransport.afleverdatum, filmtransport.check FROM filmtransport";
         $koerier = KoerierClass::find_by_sql($query);
         echo "<div class='section'><div class='container'><div class='row'>";
 
        // foreach ($koerier as $value){
  foreach ($koerier as $value){
           ?>

         
                
      <tbody>
        <td>Orderregel: <a href='index.php?content="<?php $value->getOrderregel(); ?>"'></a></td>
          <br>
        <td>Ophaaldatum: <?php echo $value->getOphaaldatum(); ?> </td>
        <br>
        <td>Afleverdatum: <?php echo $value->getAfleverdatum(); ?></td>
        <br>
        <td>Check of film is opgehaald: <?php echo $value->getCheck(); ?></td>
        <br>
     
          <br>
      </tbody>

                
<?php
    }
  
  ?>
       
</header>
</div>