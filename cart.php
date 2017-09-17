<?php 
include_once("config.php");
//unkluderar template
include "template.php";

//loopar igenom kundvagn och printar ut den
foreach($_SESSION['kundvagn'] as $item => $cartItem) {
	$produktId = $cartItem['id'];
	$produktNamn = $cartItem['productName'];
	$antal = $cartItem['qty'];
	$pris = $cartItem['price'] * $antal;
	$img = $cartItem['img'];
	$totalPrice += $pris; //totala summan


	$cartId = $item;
	$cartProducts .= <<<END
		<tr>
			<td><img src="$img" alt="produktbild"></td>
			<td class="productname"><p>$produktNamn<p></td>
			<td class="antal">$antal</td>
			<td class="price">$pris kr</td>
			<td><a class="glyphicon glyphicon-trash" href="cartdelete.php?id=$cartId"></a></td>
		</tr>
END;
}

//kundvagnen
$cart = <<<END
		<table class="cart">
			<tr>
				<th></th>
				<th class="productname">PRODUKT</th>
				<th>ANTAL</th>
				<th>PRIS</th>
				<th class="tabort">TA BORT</th>
			</tr>
			$cartProducts
			<tr>
				<td></td>
				<td></td>
				<td>SUMMA</td>
				<td class="price">$totalPrice kr</td>
				<td></td>
			</tr>
		</table>
END;

//content
$content = <<<END
	<div id="content" class="container">
		<div id="products" class="col-md-10 col-centered">
			<h1 class="col-md-4 col-centered">KUNDVAGN</h1>
			$cart
			<a class="btn btn-success pull-right btn-cart" href="checkout.php?KundID={$_SESSION['KundID']}">TILL KASSAN</a>
			<a class="btn btn-danger pull-right btn-cart" href="cartdelete.php">TÖM KUNDVAGN</a>
		</div>
	</div>
END;

//printar ut alla element
echo $header;
echo $content;
echo $footer;

?>