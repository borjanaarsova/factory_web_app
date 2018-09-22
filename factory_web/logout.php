<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
Одјава
</title>
</head>
<body style="background:#EEE8AA">
<?php
session_start();
/* remove all session variables */
session_unset(); 
/* destroy the session */
session_destroy();
header('Location: pocetna.html');
exit();
?>
</body></html>