 <div id="headerwrap" id="home" name="home">
	<header class="clearfix">
                
                <?php
	require_once("./classes/LoginClass.php");
	require_once("./classes/SessionClass.php");
	
	if ( !empty($_POST['emailadres']) && !empty($_POST['wachtwoord']))
	{
		// Als email/password combi bestaat en geactiveerd....
		if (LoginClass::check_if_email_password_exists($_POST['emailadres'], 
													   $_POST['wachtwoord'],
													   '1'))
		{
			$session->login(LoginClass::find_login_by_email_password($_POST['emailadres'], 														  $_POST['wachtwoord']));
			
			switch ($_SESSION['rol'])
			{
				case 'klant':
					header("location:index.php?content=klantHomepage");
					break;
				case 'baliemedewerker':
					header("location:index.php?content=baliemedewerkerHomepage");
					break;
				case 'root':
					header("location:index.php?content=rootHomepage");
					break;
				case 'eigenaar':
					header("location:index.php?content=eigenaarHomepage");
					break;
                    case 'koerier':
					header("location:index.php?content=koerierHomepage");
					break;
				default :
					header("location:index.php?content=login_form");			
			}
		}
		else
		{
			echo "Uw email/password combi bestaat niet of uw account is niet geactiveerd.";
				//  header("refresh:4;url=home.php");
		}	
	}
	else
	{
		echo "U heeft een van beide velden niet ingevuld, u wordt doorgestuurd<br>
		naar de inlogpagina. Of uw account is nog niet geactiveerd";
		//header("refresh:5;url=inloggen.php");
	}
?>


               </header>
</div>