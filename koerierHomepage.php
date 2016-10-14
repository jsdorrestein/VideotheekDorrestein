
           <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
                
  <h1>Jelle koerier</h1><hr>
           <p>Welkom op de pagina voor de koerier.</p>
          





<?php
		 require_once("./classes/KoerierClass.php");
         $query = "SELECT filmtransport.orderregel, filmtransport.ophaaldatum, filmtransport.afleverdatum, filmtransport.check FROM filmtransport";
         $koerier = KoerierClass::find_by_sql($query);
         echo "<div class='section'><div class='container'><div class='row'>";
 
        // foreach ($koerier as $value){

?>


</header>
</div>