<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Почетна за работници
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
echo "<h1>ОДДЕЛ ЗА РАБОТНИЦИ</h1>";
echo "<hr>";
echo "<h2>Наредби:</h2>";

	$query="SELECT * FROM `naredbi`";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
if ($result!=false)
	{
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>машина</th><th>производ</th><th>количина</th></tr>";
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";
	}
else
	echo "Нема наредби";

echo "<h2>Пораки:</h2>";
	$result="";
	$query="SELECT * FROM `poraki` WHERE `ID_primatel`=".$_SESSION['id'];
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	mysql_close($database);
if ($row=mysql_fetch_row($result))
	{
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>ID_испраќач</th><th>испраќач</th><th>улога_испраќач</th><th>ID_примател</th><th>примател</th><th>улога_примател</th><th>содржина</th></tr>";
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	for($counter=0; $row=mysql_fetch_row($result); $counter++)
	{
	print("<tr>");
	foreach($row as $key=>$value)
	print("<td>$value</td>");
	print("</tr>");
	}
	echo "</table>";
	}
else
	echo "Нема пораки";

echo "</center>";
?>
</body></html>