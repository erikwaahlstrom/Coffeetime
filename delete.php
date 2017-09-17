<?php
include('template.php');
//raderar användare
if(isset($_GET['KundID']))
{
	$query = <<<END
	DELETE FROM kund
	WHERE KundID = '{$_GET['KundID']}'
END;
$conn->query($query);
	echo "<script>window.location.replace('logout.php');</script>";
}
echo $header;
echo $content;
echo $footer;
?>