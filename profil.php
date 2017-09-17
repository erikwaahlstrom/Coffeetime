<?php
//inkluderar template
include "template.php";
//tom content-variabel som får aktuell kundinformation
$content = '';  
if(isset($_GET['KundID']))
{
	if($_GET['KundID']==$_SESSION['KundID']){
		if(isset($_POST['Email'])) {
            $query = <<<END
            UPDATE kund
            SET Email = '{$_POST['Email']}',
            Losenord = '{$_POST['Losenord']}',
            Fnamn = '{$_POST['Fnamn']}',
            Enamn = '{$_POST['Enamn']}',
            Telefon = '{$_POST['Telefon']}',
            Adress = '{$_POST['Adress']}',
            Postnummer = '{$_POST['Postnummer']}'
            WHERE KundID = '{$_GET['KundID']}'
END;
            $conn->query($query);
    }

        $query = <<<END
        SELECT * FROM kund
        WHERE KundID = '{$_GET['KundID']}';
END;
        $res = $conn->query($query);

        if($res->num_rows > 0) {
            $row = $res->fetch_object();
            //content
            $content = <<<END
                <div id="content" class="container">
                    <form class="col-md-7 col-centered" method="post" action="profil.php?KundID={$row->KundID}">
                        <h3>Kontaktuppgifter</h3>
                        <label >EMAIL</label><input class="form-control" type="text" name="Email" value="{$row->Email}"><br>
                        <label >LÖSENORD</label><input class="form-control" type="text" name="Losenord" value="{$row->Losenord}"><br>
                        <label>FÖRNAMN</label><input class="form-control" type="text" name="Fnamn" value="{$row->Fnamn}"><br>
                        <label>EFTERNAMN</label><input class="form-control" type="text" name="Enamn" value="{$row->Enamn}"><br>
                        <label>TELEFONNUMMER</label><input class="form-control" type="text" name="Telefon" value="{$row->Telefon}"><br>
                        <label>ADRESS</label><input class="form-control" type="text" name="Adress" value="{$row->Adress}"><br>
                        <label>POSTNUMMER</label><input class="form-control" type="text" name="Postnummer" value="{$row->Postnummer}"><br>
                        <input class="btn btn-success" type="submit" value="UPPDATERA">
                        <a class="btn btn btn-danger btn-delete" href="delete.php?KundID={$row->KundID}" onclick="return confirm('Är du säker på att du vill radera ditt konto?')">
                        RADERA</a>
                    </form>
                </div>
END;
    }
        
        
        //hämtar orderhistorik
        
        //hämstar orderhistorik för en kund
        $orderQuery = <<<END
            SELECT * FROM orders WHERE KundID = '{$_SESSION['KundID']}' ORDER BY Datum DESC;
END;
        
        $orderIDQuery = <<<END
            SELECT Datum FROM orders WHERE OrderID = '$orderID';
END;
        
        
        $res = $conn->query($orderQuery);
        
        if($res->num_rows > 0) {
            while($row = $res->fetch_object()) {
                $orderItems = "";
                $orderID = $row->OrderID;
                
                $result = $conn->query("SELECT Datum FROM orders WHERE OrderID = '$orderID';");
                $row = $result->fetch_object();
                $datum = $row->Datum;
                
                $result = $conn->query("SELECT SUM(Pris) AS Summa FROM orderdetaljer WHERE OrderID = '$orderID';");
                $row = $result->fetch_object();
                $summa = $row->Summa; 
                
                $result = $conn->query("SELECT produkt.ProduktID, produkt.ProduktNamn, orderdetaljer.Antal, orderdetaljer.Pris FROM orderdetaljer INNER JOIN produkt ON produkt.ProduktID = orderdetaljer.ProduktID WHERE orderdetaljer.OrderID = '$orderID'");
                
                
                if($result->num_rows > 0) {
                while($row = $result->fetch_object()) {
                $orderItems .= <<<END
                    <tr> 
                        <td class="namn-historik">{$row->ProduktNamn}</td>
                        <td>{$row->Antal}</td>
                        <td class="pris-historik">{$row->Pris} kr</td>
                    </tr>
END;
                }}
                $order .= <<<END
                <h4>Beställning - $datum</h4>
                    <table class="cart cart-historik">
                    
                        <tr>   
                            <th class="productname">PRODUKT</th>
                            <th>ANTAL</th>
                            <th>PRIS</th>
                        </tr>
                        $orderItems
                        <tr> 
                            <td></td>
                            <td>SUMMA</td>
                            <td class="price">$summa kr</td>
                        </tr>
                    </table>
END;
            }
        }
    
        $orders .= <<<END
            $order
END;
        $orderHistorik = <<<END
            <div id="contentorderhistorik" class="container">
                <div id="orderhistorik" class="col-md-7 col-centered">
                    <h3>Orderhistorik</h3>
                    $orders
                </div>
            </div>
END;
        
}
    
    $content .= <<<END
        $orderHistorik
END;
}
//printar ut alla element
echo $header;
echo $content;
echo $footer;
?>