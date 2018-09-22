<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Испраќање на порака
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
if($_POST['korisnicko_ime']!="" && $_POST['id']!="" && $_POST['poraka']!="")
{
	$idk=$_POST['id'];
	$ki=$_POST['korisnicko_ime'];
	$po=$_POST['poraka'];
	$ii=$_SESSION['id'];
	$ik=$_SESSION['kor_ime'];
	$iu=$_SESSION['uloga'];
	$ul="rabotnik";
	$query="INSERT INTO `poraki`(`ID_isprakjac`, `isprakjac`, `uloga_isprakjac`, `ID_primatel`, `primatel`,`uloga_primatel`, `sodrzina`) VALUES ('$ii','$ik','$iu','$idk','$ki','$ul','$po')";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
if ($_SESSION['uloga']=="shef")
	echo "<center><h1>Успешно испратена порака!<br><br><a href=".'./home_shefovi.php'.">Врати се назад</a></h1></center>";
else
	echo "<center><h1>Успешно испратена порака!<br><br><a href=".'./home_sopstvenici.php'.">Врати се назад</a></h1></center>";	
}
else
{
	if ($_SESSION['uloga']=="shef")
		echo "<center><h1><br><br>Грешка:<br><br>Полињата се празни, ве молиме обидете се пак!<br><br><a href=".'./home_shefovi.php'.">Врати се назад</a></h1></center>";
	else
		echo "<center><h1><br><br>Грешка:<br><br>Полињата се празни, ве молиме обидете се пак!<br><br><a href=".'./home_sopstvenici.php'.">Врати се назад</a></h1></center>";
}
?>
</body></html>