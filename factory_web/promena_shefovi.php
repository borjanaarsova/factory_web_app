<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Промена на шефови
</title>
</head>
<body style="background:#EEE8AA">
<?php
session_start();
if(!isset( $_SESSION['kor_ime'] ) )
	{
	header('Location: pocetna.html');
	exit();
	}

echo "<h3>Најавен корисник: ".$_SESSION['kor_ime']."<br><br>Улога: ".$_SESSION['uloga']."<br><br>ID: ".$_SESSION['id']."<br><br>";
echo "<a href=".'./logout.php'.">ОДЈАВИ СЕ</a></h3>";
echo "<hr>";
if($_POST['ime']!="" && $_POST['prezime']!="" && $_POST['korisnicko_ime']!="" && $_POST['lozinka']!="" && $_POST['telefon']!="" && $_POST['id']!="")
{
	$im=$_POST['ime'];
	$pr=$_POST['prezime'];
	$ki=$_POST['korisnicko_ime'];
	$lo=$_POST['lozinka'];
	$te=$_POST['telefon'];
	$id=$_POST['id'];
	$query="UPDATE `sefovi` SET `Ime`='$im',`Prezime`='$pr',`korisnicko_ime`='$ki',`lozinka`='$lo',`telefonski_br`='$te' WHERE `ID`='$id'";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
echo "<center><h1>Успешна промена!<br><br><a href=".'./home_sopstvenici.php'.">Врати се назад</a></h1></center>";	
}
else
	echo "<center><h1><br><br>Грешка:<br><br>Полињата се празни, ве молиме обидете се пак!<br><br><a href=".'./home_sopstvenici.php'.">Врати се назад</a></h1></center>";

?>
</body></html>