<?php

//inkluderar template
include "template.php";

//skapar en egen img
$img = <<<END
	<div id="screenimg">
	<div id="overlay"></div>
	<div class="row col-md-2 col-centered">
	</div>
	<img class="screenimg" src="img/omoss2.jpg" alt="omossbild">
	</div>
END;

//content
$content = <<<END
	<div id="content" class="container">
		<p class="col-md-7 col-centered">
			CoffeeTime är en nätbutik som startades under våren 2015. CoffeeTimes affärsidé är att erbjuda olika slags kaffemaskiner för att nå ut till en breddare kundkrets oavsett om det är i sitt eget hem, på ett café eller kontor. För att bäst kunna dra nytta av våra produkter så har vi handplockat ett urval av de bästa kaffemaskinerna som finns på marknaden idag. Krav vi kan ställa eftersom vi enbart sysslar med kaffemaskiner.
			<p class="col-md-7 col-centered">CoffeeTime har ett stort utbud av kaffekokare från de ledande tillverkarna. Likaså presskvarnar, kapselmaskiner, mokkabryggare & espressomaskiner. De allra flesta produkterna finns i lager för omgående leverans.</p>
			<p class="col-md-7 col-centered">Självklart går det också bra att kontakta oss om du har några frågor angående produkterna. För information om hur du når oss, tryck på Kontakt i menyn ovan. Kom ihåg att du som konsument alltid har minst två års garanti när du handlar av oss. Läs mer om våra garantier under villkor.</p>
		
	</div>
END;

//printar ut alla element
echo $header;
echo $img;
echo $content;
echo $footer;

?>