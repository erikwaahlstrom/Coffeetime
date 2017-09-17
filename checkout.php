<?php
include_once("config.php");
//unkluderar template
include "template.php";

if(isset($_SESSION['KundID'])) {
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
                <td class="productname"><p>$produktNamn</p></td>
                <td>$antal</td>
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
                    <th>TA BORT</th>
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
                <h1 class="col-md-4 col-centered">KASSA</h1>
                $cart
            </div>
        </div>
END;
    

    
    //Hämtar användaruppgifter som visas för att informera om vilken adress produkterna kommer skickas till
    if(isset($_GET['KundID'])) {
        if($_GET['KundID']==$_SESSION['KundID']) {

            //hämta ort
            $queryOrt = <<<END
                SELECT Ort FROM postadress
                INNER JOIN kund
                ON postadress.Postnummer = kund.Postnummer;
END;
            $res = $conn->query($queryOrt);
            if($res->num_rows > 0) {
                $row = $res->fetch_object();

                $ort = <<<END
                    <label>ORT</label><input class="form-control" type="text" name="Postnummer" value="{$row->Ort}">
END;
            }

            //hämta resten av kundinformationen
            $query = <<<END
            SELECT * FROM kund
            WHERE KundID = '{$_GET['KundID']}';
END;
            $res = $conn->query($query);

            if($res->num_rows > 0) {
                $row = $res->fetch_object();
            //content
            $content .= <<<END
                <div id="contentcheckout" class="container">
                    <form class="col-md-7 col-centered" method="post" action="profil.php?KundID={$row->KundID}">
                        <h3>Leveransadress</h3>
                        <label>FÖRNAMN</label><input class="form-control" type="text" name="Fnamn" value="{$row->Fnamn}"><br>
                        <label>EFTERNAMN</label><input class="form-control" type="text" name="Enamn" value="{$row->Enamn}"><br>
                        <label>E-POST</label><input class="form-control" type="text" name="Email" value="{$row->Email}"><br>
                        <label>TELEFONNUMMER</label><input class="form-control" type="text" name="Telefon" value="{$row->Telefon}"><br>
                        <label>ADRESS</label><input class="form-control" type="text" name="Adress" value="{$row->Adress}"><br>
                        <label>POSTNUMMER</label><input class="form-control" type="text" name="Postnummer" value="{$row->Postnummer}"><br>
                        $ort
                    </form>
                </div>
END;
            }

        }
    }
    
    //visar fraktsätt
    $content .= <<<END
        <div id="fraksatt" class="container">
            <div class="col-md-7 col-centered">
                <h3>Fraktsätt</h3>
                <input type="radio" class="form-control frakt" checked><label class="frakt-label">Postpaket</label> Fraktkostnad: 0kr!<p>Leverans sker till Postens uthämtningsställe. Medtag giltig legitimation på beställaren vid avhämtning. Normal leveranstid: nästkommande vardag.</p>
            </div>
        </div>
END;
    
    
    //visar betalsätt
    $content .= <<<END
        <div id="betalsatt" class="container">
            <div class="col-md-7 col-centered" id="betala">
                <h3>Betalsätt</h3>
                <input type="radio" class="form-control frakt" checked><label class="frakt-label"><img class="kassa-paypal" src="img/paypalen.png" alt="paypal"></label>
                <p>När du betalar med PayPal kommer du hänvisas vidare till PayPals betalsida efter du klickat på "Slutför köp". Efter betalning hänvisas du tillbaka till CoffeeTime där du får ditt kvitto.</p>
            </div>
        </div>
END;
    
    //visar betalnings knapp och summa
    $slutforbetalning = <<<END
            <div class="col-md-3 col-centered" id="slutfor">
                <h3>Total summa att betala: <span class="checkout-price">$totalPrice kr</span></h3>
                <form method="post" action="process.php">
END;
    
    foreach($_SESSION['kundvagn'] as $item => $cartItem) {
        $results = $conn->query("SELECT ProduktID, ProduktNamn, Beskrivning, Pris FROM produkt WHERE ProduktID='{$cartItem['id']}' LIMIT 1");
        $row = $results->fetch_object();
        
        $paypalProduktID = $row->ProduktID;
        $paypalProduktNamn = $row->ProduktNamn;
        $paypalBeskrivning = $row->Beskrivning;
        
        $slutforbetalning .= <<<END
            <input type="hidden" name="item_name[$item]" value="$paypalProduktNamn" />
            <input type="hidden" name="item_code[$item]" value="$paypalProduktID" />
            <input type="hidden" name="item_desc[$item]" value="$paypalBeskrivning" />
            <input type="hidden" name="item_qty[$item]" value="{$cartItem['qty']}" />
END;
    }
    
    $slutforbetalning .= <<<END
                <input type="submit" class="btn btn-success btn-checkout" value="SLUTFÖR KÖP">
            </form>
        </div>
END;
    
    $content .= <<<END
        $slutforbetalning
END;
    

}

else {
    echo "<script>alert('Du måste vara inloggad för att kunna slutföra din beställning.');</script>";
}





//printar ut alla element
echo $header;
echo $content;
echo $footer;

?>