<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Logout</title>
 <meta charset="utf-8">
</head>
<body>

	<?php
	    session_start();
	   session_destroy();
	    echo "Sesion finalizada";
	    header("location:index.php");
	?>
</body>
</html>