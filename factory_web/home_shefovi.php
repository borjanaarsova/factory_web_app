<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Почетна за шефови
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

echo "<center>";
echo "<hr>";
echo "<h1>ОДДЕЛ ЗА ШЕФОВИ</h1>";
echo "<hr>";

echo "<h2>Преглед:</h2>";

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Машини</th><th>Производи</th><th>Работници</th></tr>";

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

	$query="SELECT `ID`, `korisnicko_ime` FROM `vraboteni`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>корисничко_име</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td></tr></table>";

echo "<h2>Наредби:</h2>"; /* ovde pocnuva za naredbi */

echo "<table border=1  cellspacing=10>";

echo "<tr><th>Приказ</th><th>Внеси</th><th>Бриши</th></tr>";

echo "<tr><td>";

	$query='SELECT `ID`, `ID_masina`, `ID_proizvod`, `ID_kolicina` FROM `naredbi` ';
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>ID_машина</th><th>ID_производ</th><th>количина</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";

echo "</td><td>";

echo '<form action="vnes_naredbi.php" method="post">
ID_машина: <input type="text" name="masina">
<br><br>ID_производ: <input type="text" name="proizvod">
<br><br>Количина: <input type="text" name="kolicina">
<br><br><input type="submit" value="Испрати наредба">
</form>';

echo "</td><td>";

echo '<form action="brisi_naredbi.php" method="post">
ID: <input type="text" name="id">
<br><br><input type="submit" value="Бриши наредба">
</form>';
	
echo "</td></tr></table>";
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

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