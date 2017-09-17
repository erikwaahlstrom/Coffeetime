<?php
//Session - cookie
session_name('CoffeeTime');
session_start();
 ?>
<!DOCTYPE html>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Vibur' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dosis:400,700,600,500,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<title>Coffeetime</title>
    <script src="js/responsiveslides.min.js"></script>
	<script src="js/slider.js"></script>


<?php

error_reporting(E_ERROR | E_PARSE);
//databas connect
$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "coffeetime";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//databas connect - Slut

//kundvagn
if(!isset($_SESSION['kundvagn'])) {
	$_SESSION['kundvagn'] = array();
}

//räkna antalet produkter i kundvagn
$cartQty = count($_SESSION['kundvagn']);

//headern
if(isset($_SESSION['KundID']))
{
//$header = <<<END
//	<div id="topnav"> 
//		<div class="container-fluid col-md-10 col-centered">
//			<a href="index.php"><p class="pull-left"><img src="img/logo.svg" alt="logo">CoffeeTime</p></a>
//            
//			<ul class="row col-md-6 pull-right topnav-wrap">
//				<li><a href="omoss.php">OM OSS</a></li>
//				<li><a href="kontakt.php">KONTAKT</a></li>
//				<li><a href="logout.php">LOGGA UT</a></li>
//				<li><a href="profil.php?KundID={$_SESSION['KundID']}">INLOGGAD SOM {$_SESSION['Email']}</a></li>
//				<li class="pull-right"><a href="cart.php"><div class="btn btn-default"><div class="glyphicon glyphicon-shopping-cart"></div>KUNDVAGN ($cartQty)</div></a></li>
//			</ul>
//		</div>
//	</div>
//	<div id="bottomnav">
//		<div class="container">
//			<ul class="row col-md-10 col-centered">
//				<li><a href="products.php?category=kaffekokare">KAFFEKOKARE</a></li>
//				<li><a href="products.php?category=presskannor">PRESSKANNOR</a></li>
//				<li><a href="products.php?category=kapselmaskin">KAPSELMASKIN</a></li>
//				<li><a href="products.php?category=mokabryggare">MOKABRYGGARE</a></li>
//				<li><a href="products.php?category=espressomaskin">ESPRESSOMASKIN</a></li>
//			</ul>
//		</div>
//	</div>
//END;

$header = <<<END
<div class="navbar navbar-default navbar-static-top">
	
		<div class="container">	

		<div class="navbar-header">
		
		<button class="navbar-toggle" data-target=".navbar-collapse"
		 data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>


		<div class="pull-right" id="kvagn-global"><a href="cart.php"><div class="btn btn-default kundvagnknapp"></div><div class="glyphicon glyphicon-shopping-cart"></div>KUNDVAGN ($cartQty)</a></div>

		<a class="navbar-brand" href="index.php"><p class="pull-left">
		<img src="img/logo.svg" alt="logo">Coffeetime</p></a>

	</div>

		<div class="navbar-collapse collapse">

			<ul id="navbar-right" class="nav navbar-nav navbar-right">

				<li><a href="omoss.php">OM OSS</a></li>
				<li><a href="kontakt.php">KONTAKT</a></li>
				<li><a href="logout.php">LOGGA UT</a></li>
				<li><a href="profil.php?KundID={$_SESSION['KundID']}">INLOGGAD SOM {$_SESSION['Email']}</a></li>
				<li class="pull-right" id="kvagn-lokal"><div class="btn btn-default kundvagnknapp"><div class="glyphicon glyphicon-shopping-cart"></div><a href="cart.php" class="vit">KUNDVAGN ($cartQty)</a></div>

			</ul>

			</div>
          
		</div>

		<div class="navbar-collapse collapse" id="collapse2">

			<ul class="nav navbar-nav" id="bottomnav">

				<li><a href="products.php?category=kaffekokare">KAFFEKOKARE</a></li>
				<li><a href="products.php?category=presskannor">PRESSKANNOR</a></li>
				<li><a href="products.php?category=kapselmaskin">KAPSELMASKIN</a></li>
				<li><a href="products.php?category=mokabryggare">MOKABRYGGARE</a></li>
				<li><a href="products.php?category=espressomaskin">ESPRESSOMASKIN</a></li>

			</ul>

	</div>
</div>
END;
}
else
{
//$header = <<<END
//	<div id="topnav"> 
//		<div class="container-fluid col-md-10 col-centered">
//			<a href="index.php"><p class="pull-left"><img src="img/logo.svg" alt="logo">CoffeeTime</p></a>
//			<ul class="row col-md-5 pull-right">
//				<li><a href="omoss.php">OM OSS</a></li>
//				<li><a href="kontakt.php">KONTAKT</a></li>
//				<li><a href="login.php">LOGGA IN</a></li>
//				<li><a href="login.php">BLI MEDLEM</a></li>
//				<li class="pull-right"><a href="cart.php"><div class="btn btn-default"><div class="glyphicon glyphicon-shopping-cart"></div>KUNDVAGN ($cartQty)</div></a></li>
//			</ul>
//		</div>
//	</div>
//	<div id="bottomnav">
//		<div class="container">
//			<ul class="row col-md-10 col-centered">
//				<li><a href="products.php?category=kaffekokare">KAFFEKOKARE</a></li>
//				<li><a href="products.php?category=presskannor">PRESSKANNOR</a></li>
//				<li><a href="products.php?category=kapselmaskin">KAPSELMASKIN</a></li>
//				<li><a href="products.php?category=mokabryggare">MOKABRYGGARE</a></li>
//				<li><a href="products.php?category=espressomaskin">ESPRESSOMASKIN</a></li>
//			</ul>
//		</div>
//	</div>
//END;

$header = <<<END
<div class="navbar navbar-default navbar-static-top">
	
		<div class="container">	

		<div class="navbar-header">
		
		<button class="navbar-toggle" data-target=".navbar-collapse"
		 data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>


		<div class="pull-right" id="kvagn-global"><a href="cart.php"><div class="btn btn-default kundvagnknapp"></div><div class="glyphicon glyphicon-shopping-cart"></div>KUNDVAGN ($cartQty)</a></div>

		<a class="navbar-brand" href="index.php"><p class="pull-left">
		<img src="img/logo.svg" alt="logo">Coffeetime</p></a>

	</div>

		<div class="navbar-collapse collapse">

			<ul id="navbar-right" class="nav navbar-nav navbar-right" >

				<li><a href="omoss.php">OM OSS</a></li>
				<li><a href="kontakt.php">KONTAKT</a></li>
				<li><a href="login.php">LOGGA IN</a></li>
				<li><a href="login.php">BLI MEDLEM</a></li>
				<li class="pull-right" id="kvagn-lokal"><div class="btn btn-default kundvagnknapp"><div class="glyphicon glyphicon-shopping-cart"></div><a href="cart.php" class="vit">KUNDVAGN ($cartQty)</a></div>

			</ul>

			</div>
          
		</div>

		<div class="navbar-collapse collapse" id="collapse2">

			<ul class="nav navbar-nav" id="bottomnav">

				<li><a href="products.php?category=kaffekokare">KAFFEKOKARE</a></li>
				<li><a href="products.php?category=presskannor">PRESSKANNOR</a></li>
				<li><a href="products.php?category=kapselmaskin">KAPSELMASKIN</a></li>
				<li><a href="products.php?category=mokabryggare">MOKABRYGGARE</a></li>
				<li><a href="products.php?category=espressomaskin">ESPRESSOMASKIN</a></li>

			</ul>

	</div>
</div>
END;
}
//element där slider eller bild ligger
$img = <<<END
	<div id="screenimg"></div>
END;
//content
$content = <<<END
	<div id="content" class="container"></div>
END;
//footer
//$footer = <<<END
//	<div id="footer" class="footer">
//		<div class="container-fluid col-md-10 col-centered">
//			<ul id="footermenu" class="row col-md-5 col-centered">
//				<li><a href="omoss.php">Om oss</a></li>
//				<li><a href="kontakt.php">Kontakt</a></li>
//				<li><a href="faq.php">FAQ</a></li>
//				<li><a href="villkor.php">Villkor</a></li>
//			</ul>
//			<div id="paypal" class="row col-md-2 pull-right">
//				<p>Betala säkert med</p>
//				<img src="img/paypalen.png" alt="paypal">
//			</div>
//			<p class="copy row col-md-2 col-centered">&copy coffeetime.se</p>
//		</div>
//	</div>
//END;


$footer = <<<END
<footer>

<div class="container">
		<div class="row">
			<div class="col-md-6 col-centered">
				<ul>
					<li><a href="omoss.php">Om oss</a></li>
					<li><a href="kontakt.php">Kontakt</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="villkor.php">Villkor</a></li>
				</ul>
			</div>
		</div><!-- end row -->	

			<div class="row">
				<div id="paypal" class="col-md-2">
					<p>Betala säkert med</p>
					<img src="img/paypalen.png" alt="paypal">
				</div>	
			</div><!-- end row -->

		<div class="row">
				<div class="col-md-2 col-centered">
					<p>&copy; coffeetime.se</p>
				</div>	
			</div><!-- end row -->

	</div><!-- end container -->

</footer>
END;
?>