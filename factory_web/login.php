<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Најава</title>
</head>

<body style="background:#EEE8AA">
<?php

extract($_POST);
$user=$_POST['korisnicko'];
$pass=$_POST['lozinka'];
/*tuka prvo treba da se provere user i pass u koja tabela postojat*/
if($user!="" && $pass!="")
{
	$row1="";
	$row2="";
	$row3="";
	$query="SELECT * FROM `sopstvenik` WHERE `korisnicko_ime`='$user'";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	if($result!=false)
	{
		$row=mysql_fetch_row($result);
		$row1=$row;
	}
	mysql_close($database);
	$a1=print_r($row1,true);
	
	$query="SELECT * FROM `sefovi` WHERE `korisnicko_ime`='$user'";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	if($result!=false)
	{
		$row=mysql_fetch_row($result);
		$row2=$row;
	}
	mysql_close($database);
	$a2=print_r($row2,true);
	
	$query="SELECT * FROM `vraboteni` WHERE `korisnicko_ime`='$user'";
	$database = mysql_connect("localhost","root","usbw");
	mysql_set_charset('utf8', $database);
	mysql_select_db("internet_servis_za_kontrola_na_proizvodstvoto_vo_fabrika",$database);
	$result=mysql_query($query, $database);
	if($result!=false)
	{
		$row=mysql_fetch_row($result);
		$row3=$row;
	}
	mysql_close($database);
	$a3=print_r($row3,true);
	
/*proveruva dali se najdeni rezultati vo trite tabeli*/
	if($a1=="" && $a2=="" && $a3=="")
		echo "<center><h1><br><br>Грешка:<br><br>Корисничкото име $user не е пронајдено, ве молиме обидете се пак!<br><br><a href=".'./pocetna.html'.">Врати се назад</a></h1></center>";
	else
	{
		if($a1!="") /*proveruva vo tabelata za sopstvenici*/
		{
			if($row1["4"]==$pass)
				{
					session_start();
					if(!isset( $_SESSION['kor_ime'] ) )
					{
						$_SESSION['kor_ime']="$user";
						$_SESSION['uloga']="sopstvenik";
						$_SESSION['id']=$row1["0"];
					}
					header('Location: home_sopstvenici.php');
					exit();
				}
			else
				echo "<center><h1><br><br>Грешка:<br><br>Лозинката за корисничко име $user е погрешна, ве молиме обидете се пак!<br><br><a href=".'./pocetna.html'.">Врати се назад</a></h1></center>";
		}
		if($a2!="")
		{
			if($row2["4"]==$pass)
				{
					session_start();
					if(!isset( $_SESSION['kor_ime'] ) )
					{
						$_SESSION['kor_ime']="$user";
						$_SESSION['uloga']="shef";
						$_SESSION['id']=$row2["0"];
					}
					header('Location: home_shefovi.php');
					exit();
				}
			else
				echo "<center><h1><br><br>Грешка:<br><br>Лозинката за корисничко име $user е погрешна, ве молиме обидете се пак!<br><br><a href=".'./pocetna.html'.">Врати се назад</a></h1></center>";
		}
		if($a3!="")
		{
			if($row3["4"]==$pass)
				{
					session_start();
					if(!isset( $_SESSION['kor_ime'] ) )
					{
						$_SESSION['kor_ime']="$user";
						$_SESSION['uloga']="rabotnik";
						$_SESSION['id']=$row3["0"];
					}
					header('Location: home_rabotnici.php');
					exit();
				}
			else
				echo "<center><h1><br><br>Грешка:<br><br>Лозинката за корисничко име $user е погрешна, ве молиме обидете се пак!<br><br><a href=".'./pocetna.html'.">Врати се назад</a></h1></center>";
		}
	}
}
else
{
	echo "<center><h1><br><br>Грешка:<br><br>Полињата се празни, ве молиме обидете се пак!<br><br><a href=".'./pocetna.html'.">Врати се назад</a></h1></center>";
}
?>
</body>
</html>