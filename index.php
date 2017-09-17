<?php

//unkluderar template
include "template.php";

//skapar en egen img
$img = <<<END
	<div id="screenimg">
		<div id="overlay"></div>
		<ul class="rslides">
			<li>
				<img class="slideimg" src="img/coffee1.jpg" alt="coffee"/>
			</li>
			<li>
				<img class="slideimg" src="img/coffee3.jpg" alt="coffee"/>
			</li>
			<li>
				<img class="slideimg" src="img/coffee2.jpg" alt="coffee"/>
			</li>
		</ul>
	</div>
END;

//content
$content = <<<END
	<div id="content" class="container">
		<p class="col-md-7 col-centered">
			CoffeTime, kaffemaskiner på nätet.
			<p class="col-md-7 col-centered">Vi är din kaffebutik på nätet! Våra produkter är specifikt utvalda för att garanterat brygga kaffe av högsta kvalitet. Våra produkter innefattar maskiner av flera olika byggprocesser, se vårt produktutbud för att se vilka.</p>
			<p class="col-md-7 col-centered">Oavsett om du är erfaren kaffeentusiast eller letar efter nya smakupplevelser så välkomnar vi dig till en värld av kvalitetsbryggeri som resulterar i kaffe som det skall smaka.</p>
		
	</div>
END;

//printar ut alla element
echo $header;
echo $img;
echo $content;
echo $footer;

?>

