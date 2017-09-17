<?php

//unkluderar template
include "template.php";

//skapar en egen img
$img = <<<END
	<div id="screenimg">
	<div id="overlay"></div>
	<div class="row col-md-2 col-centered">
	</div>
	<img class="screenimg" src="img/villkor2.jpg" alt="omossbild">
	
	</div>
END;

//content
$content = <<<END
	<div id="content" class="container">
					<br><h4 class="col-md-7 col-centered"> Returer </h4>
			<p class="col-md-7 col-centered">
			Eventuell returfrakt bekostas av kunden. Gäller även vid reklamationer. Vi har förmånliga fraktavtal och kan erbjuda subventionerad frakt om ni kontaktar oss före retur av varor.</p>

					<br><h4 class="col-md-7 col-centered"> Beställning </h4>
			<p class="col-md-7 col-centered">Alla beställningar sker via CoffeTimes hemsida. Det går även bra att skicka e-post till oss på info@CoffeTime.se.</p>

					<br><h4 class="col-md-7 col-centered"> Betalningalternativ </h4>
			<p class="col-md-7 col-centered">Just nu så erbjuds endast Paypal som betalningsalternativ men inom snar framtid så kommer fler alternativ att finnas tillgängliga.</p>

					<br><h4 class="col-md-7 col-centered"> Avbeställning </h4>
			<p class="col-md-7 col-centered">Avbeställning av order är möjlig utan kostad för kund fram till den tidpunkt ordern effektuerats. Effektuering sker vanligtvis genom att faktura och frakthandlingar skapas. Avbeställning efter det att ordern effektuerats är ej möjlig. Du som kund är i fall vi effektuerat din order i samtliga fall skyldig att mottaga försändelsen. Avbeställning av icke lagervara vilken köpts speciellt för kund är ej möjlig efter det att vi beställt samma vara från vår leverantör eller programmerat denna vara själva. En avbeställning är ej giltig förrän bekräftelse härom mottagits från oss.</p>

					<br><h4 class="col-md-7 col-centered"> Ångerrätt </h4>
			<p class="col-md-7 col-centered">Som privatperson har du enligt Distansavtalslagen rätt att ångra ett köp inom 14 kalenderdagar, dock lägst 7 arbetsdagar, från mottagandet. För att begära ångerrätt enligt Distansavtalslagen kontaktar du oss så kan vi se om du uppfyller de förutsättningar som krävs för att tillämpa ångerrätten, och i sådana fall uppger de uppgifter vi behöver. Varan skall vara i obrukat skick och i oskadat orginalemballage. Återsändande av vara vilken returneras med hänvisning till Distansavtalslagen sker på kunds bekostnad då Distansavtalslagen ej ger kund rätt att begära återbetalning av kostnader för transport eller annan utförd tjänst.</p>

					<br><h4 class="col-md-7 col-centered"> Reklamationer </h4>
			<p class="col-md-7 col-centered">Privatpersoner har enligt konsumentköplagen tre års reklamationsrätt oavsett vilken garantitid som gäller på en vara. Reklamation skall göras inom skälig tid från det att felet upptäckts. Det är vid reklamation efter garantitidens utgång köparen som skall påvisa att fel man anmärker på fanns redan vid leveranstillfället.</p>

					<br><h4 class="col-md-7 col-centered"> Personuppgifter </h4>
			<p class="col-md-7 col-centered">Vi följer Personuppgiftslagen (PuL), det innebär att vi är skyldiga att skydda dina personuppgifter och inte ge ut dem till tredjepart.</p>
		 <br> <br>
	</div>
END;

//printar ut alla element
echo $header;
echo $img;
echo $content;
echo $footer;

?>