<?php

//unkluderar template
include "template.php";



$products = ""; //tom variabel som tar emot databasinnehåll

//databasfråga hämtar alla produkter och sorterar på kategori(get-variablen)
$query = <<<END
	SELECT * FROM produkt
	WHERE ProduktID = "{$_GET["id"]}"
END;

//kör databasfrågan
$res = $conn->query($query);

//kollar om det finns data och isåfall printar ut den
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$productTitle = utf8_encode($row->ProduktNamn); //gör om produkt titel till utf-8 (åäö)
		$productDesc = utf8_encode($row->Beskrivning); //gör om produktbeskrivning till utf-8 (åäö)
		$product .= <<<END
			<div class="detailproduct col-md-12">
				<div class="detailcrop pull-left"><img class="productimg" src="{$row->imgUrl}" alt="product"></div>
				<div class="detailinfo">
					<h4 class="detailtitle pull-left">$productTitle</h4>
					<p class="detaildesc">$productDesc</p>
					<div class="detail{$row->Lagerstatus} img-circle"></div><h6 class="detailstatus">LAGERSTATUS</h6>
					<p class="detailprice">{$row->Pris}kr</p>
					<a class="btn btn-success detailbtn" href="products.php?category={$row->Kategori}&amp;id={$row->ProduktID}">KÖP</a>
				</div>
			</div>
END;
	}
}

//hämtar get variabel och gör den till stora bokstäver
$title = strtoupper($_GET["category"]);

//content
$content = <<<END
	<div id="content" class="container">
		<div id="products" class="col-md-10 col-centered">
			<p class="col-md-4 col-centered">$title</p>
			$product
		</div>
	</div>
END;

//printar ut alla element
echo $header;
echo $content;
echo $footer;

?>