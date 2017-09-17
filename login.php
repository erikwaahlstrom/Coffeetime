<?php
//inkluderar template
include "template.php";

if(isset($_POST['Email'], $_POST['Losenord']))
{
	$query = <<<END
	SELECT Email, Losenord, KundID FROM kund
	WHERE Email = '{$_POST['Email']}'
	AND Losenord = '{$_POST['Losenord']}'
END;
$res = $conn->query($query);
	if($res->num_rows > 0)
	{
		$row = $res->fetch_object();
		$_SESSION["Email"] = $row->Email;
		$_SESSION["KundID"] = $row->KundID;
		echo "<script>window.location.replace('index.php');</script>";
	}
}

if(isset($_POST['Email'], $_POST['Losenord'], $_POST['Fnamn'], $_POST['Enamn'], $_POST['Telefon'], $_POST['Adress'], $_POST['Postnummer']))
{
$query = <<<END
	INSERT INTO kund(Email,Losenord,Fnamn,Enamn,Telefon,Adress,Postnummer)
	VALUES('{$_POST['Email']}','{$_POST['Losenord']}','{$_POST['Fnamn']}','{$_POST['Enamn']}','{$_POST['Telefon']}','{$_POST['Adress']}','{$_POST['Postnummer']}')
END;
$conn->query($query);
echo "<script>window.location.replace('index.php');</script>";
}

$content = <<<END

<div id="content" class="container">
	<div class="col-md-10 col-centered">
		<form id="loginform" class="col-md-5 pull-left" action="login.php" method="post">
			<h3>Logga in</h3>
			<p>Redan medlem? Logga in här</p>
			<label>EMAIL</label><input class="form-control" type="text" name="Email"><br>
			<label>LÖSENORD</label><input class="form-control" type="password" name="Losenord">
			<input class="btn btn-success" type="submit" value="LOGGA IN">
		</form>

		<form id="signupform" class="col-md-5 pull-right" action="login.php" method="post">
			<h3>Bli medlem</h3>
			<p>Inte medlem än? Registera dig här</p>
			<label>EMAIL</label><input class="form-control" type="text" name="Email"><br>
			<label>LÖSENORD</label><input class="form-control" type="password" name="Losenord"><br>
			<label>FÖRNAMN</label><input class="form-control" type="text" name="Fnamn"><br>
			<label>EFTERNAMN</label><input class="form-control" type="text" name="Enamn"><br>
			<label>TELEFONNUMMER</label><input class="form-control" type="text" name="Telefon"><br>
			<label>ADRESS</label><input class="form-control" type="text" name="Adress"><br>
			<label>POSTNUMMER</label><input class="form-control" type="text" name="Postnummer">
			<input class="btn btn-success" type="submit" value="BLI MEDLEM">
		</form>
	</div>
</div>

END;

//printar ut alla element
echo $header;
echo $content;
echo $footer;

?>


