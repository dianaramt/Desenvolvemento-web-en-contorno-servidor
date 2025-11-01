<?php
// Incluimos la librería de funciones
require_once("funciones.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="header" class="container">

    <?php include("elementos/logo.php"); ?>

	 <?php include("elementos/menu.php"); ?>
	
	
	
</div>

<?php include("elementos/pictures.php"); ?>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
			
				<div id="content">
					<h2>Welcome to our website</h2>
					<p> This is the DIV with ID content</p>
				</div>
				
				<?php include("elementos/sidebar.php"); ?>
				
			</div>
		</div>
	</div>
</div>

<?php include("elementos/footer.php"); ?>

</body>
</html>
