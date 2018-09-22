<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Почетна за сопственици
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
echo "<center>";
echo "<h1>ОДДЕЛ ЗА СОПСТВЕНИЦИ</h1>";
echo "<hr>";

echo "<h2>Машини:</h2>"; /* овде почнува за машини */

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Промени</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query="SELECT * FROM `masini`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>машина</th><th>намена</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";
	
echo '<form action="vnes_masini.php" method="post">
Име: <input type="text" name="ime_na_masina">
<br><br>Намена: <input type="text" name="namena">
<br><br><input type="submit" value="Внеси машина">
</form>';

echo "</td><td>";

echo '<form action="promena_masini.php" method="post">
ID: <input type="text" name="id">
<br><br>Име: <input type="text" name="ime_na_masina">
<br><br>Намена: <input type="text" name="namena">
<br><br><input type="submit" value="Промени машина">
</form>';

echo "</td><td>";

echo '<form action="brisi_masini.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши машина">
</form>';

echo "</td></tr></table>";

echo "<h2>Производи:</h2>";			/* ovde pocnuva za proizvodi*/

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Промени</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query="SELECT * FROM `proizvodi`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>производ</th><th>тежина (г.)</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";

echo '<form action="vnes_proizvodi.php" method="post">
Име: <input type="text" name="ime_na_proizvod">
<br><br>Тежина (г.): <input type="text" name="tezina">
<br><br><input type="submit" value="Внеси производ">
</form>';

echo "</td><td>";

echo '<form action="promena_proizvodi.php" method="post">
ID: <input type="text" name="id">
<br><br>Име: <input type="text" name="ime_na_proizvod">
<br><br>Тежина (г.): <input type="text" name="tezina">
<br><br><input type="submit" value="Промени производ">
</form>';

echo "</td><td>";

echo '<form action="brisi_proizvodi.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши производ">
</form>';

echo "</td></tr></table>";

echo "<h2>Шефови:</h2>"; /* овде почнува за шефови */

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Промени</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query="SELECT `ID`, `Ime`, `Prezime`, `korisnicko_ime`, `telefonski_br` FROM `sefovi`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>име</th><th>презиме</th><th>корисничко_име</th><th>телефон</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";

echo '<form action="vnes_shefovi.php" method="post">
Име: <input type="text" name="ime">
<br><br>Презиме: <input type="text" name="prezime">
<br><br>Корисничко име: <input type="text" name="korisnicko_ime">
<br><br>Лозинка: <input type="password" name="lozinka">
<br><br>Телефон: <input type="text" name="telefon">
<br><br><input type="submit" value="Внеси шеф">
</form>';

echo "</td><td>";

echo '<form action="promena_shefovi.php" method="post">
ID: <input type="text" name="id">
<br><br>Име: <input type="text" name="ime">
<br><br>Презиме: <input type="text" name="prezime">
<br><br>Корисничко име: <input type="text" name="korisnicko_ime">
<br><br>Лозинка: <input type="password" name="lozinka">
<br><br>Телефон: <input type="text" name="telefon">
<br><br><input type="submit" value="Промени шеф">
</form>';
	
echo "</td><td>";

echo '<form action="brisi_shefovi.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши шеф">
</form>';
	
echo "</td></tr></table>";

echo "<h2>Работници:</h2>"; /* od ovde pocnuva za rabotnici */

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Промени</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query="SELECT `ID`, `Ime`, `Prezime`, `korisnicko_ime`, `telefonski_broj` FROM `vraboteni`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>име</th><th>презиме</th><th>корисничко_име</th><th>телефон</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";

echo '<form action="vnes_rabotnici.php" method="post">
Име: <input type="text" name="ime">
<br><br>Презиме: <input type="text" name="prezime">
<br><br>Корисничко име: <input type="text" name="korisnicko_ime">
<br><br>Лозинка: <input type="password" name="lozinka">
<br><br>Телефон: <input type="text" name="telefon">
<br><br><input type="submit" value="Внеси работник">
</form>';

echo "</td><td>";

echo '<form action="promena_rabotnici.php" method="post">
ID: <input type="text" name="id">
<br><br>Име: <input type="text" name="ime">
<br><br>Презиме: <input type="text" name="prezime">
<br><br>Корисничко име: <input type="text" name="korisnicko_ime">
<br><br>Лозинка: <input type="password" name="lozinka">
<br><br>Телефон: <input type="text" name="telefon">
<br><br><input type="submit" value="Промени работник">
</form>';
	
echo "</td><td>";

echo '<form action="brisi_rabotnici.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши работник">
</form>';
	
echo "</td></tr></table>";

echo "<h2>Пораки:</h2>"; /* ovde pocnuva za poraki */

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query='SELECT `ID`, `ID_primatel`, `primatel`, `sodrzina` FROM `poraki` WHERE `ID_isprakjac`='.$_SESSION['id'];
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>ID_примател</th><th>примател</th><th>содржина</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";

echo '<form action="vnes_poraki.php" method="post">
ID: <input type="text" name="id">
<br><br>Корисничко име: <input type="text" name="korisnicko_ime">
<br><br>Порака: <input type="text" name="poraka">
<br><br><input type="submit" value="Испрати порака">
</form>';

echo "</td><td>";

echo '<form action="brisi_poraki.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши порака">
</form>';
	
echo "</td></tr></table>";

echo "</center>";

?>
</body></html>