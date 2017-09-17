<?php

//inkluderar template
include "template.php";

//skapar en egen img
$img = <<<END
	<div id="screenimg">
	<div id="overlay"></div>
	<div class="row col-md-1 col-centered">
	</div>
	<img class="screenimg" src="img/faq2.jpg" alt="FAQ">
	
	</div>
END;

//content
$content = <<<END
	<div id="content" class="container">

				<h4 class="col-md-7 col-centered">Q-Hur långt tid tar det innan jag får mina varor?</h4>
			<p class="col-md-7 col-centered">	
				A-Vi försöker alltid levera dina varor inom 2-5 arbetsdagar.</p> <br>

				<h4 class="col-md-7 col-centered">Q-Kan jag ångra mitt köp?</h4> 
			<p class="col-md-7 col-centered">	
				A-Ja, du har alltid 14 dagars ångerrätt.</p> <br>

				<h4 class="col-md-7 col-centered">Q-Hur vet jag om min order har skickats?</h4>
			<p class="col-md-7 col-centered">
				A-Du får alltid ett mail när vi har skickat din produkt.</p> <br>

				<h4 class="col-md-7 col-centered">Q-Min produkt krånglar eller fungerar inte, vad ska jag göra?</h4>
			<p class="col-md-7 col-centered">
				A-Om din produkt krånglar eller inte fungerar så har du rätt till att få en ny produkt eller pengar tillbaka. Skicka tillbaka produkten till oss med hjälp av retursedeln du fick med ditt packet.</p>
				<br>

			<h4 class="col-md-7 col-centered">Q-Kan jag spåra mitt paket?</h4>
			<p class="col-md-7 col-centered">
				A-Nej, just nu så erbjuder vi inget sätt att spåra ditt paket men det är en funktion som vi planerar att införa.</p> <br>

			<h4 class="col-md-7 col-centered">Q-Vilka betalsätt erbjuder ni?</h4>
			<p class="col-md-7 col-centered">
				A-Just nu så erbjuder vi betalning via Paypal, men fler betalningsalternativ kommer bli tillgängliga i framtiden.</p> <br> <br>

	</div>
END;

//printar ut alla element
echo $header;
echo $img;
echo $content;
echo $footer;

?>