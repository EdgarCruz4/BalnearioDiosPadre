<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive navbar using only html css</title>
	<!-- CSS Personalisado -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/table.css">

	<!-- Internet -->
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

	<!-- icono -->
    <link href="img/dios-padre.webp" rel="icon">

</head>
<body>

	<div class="header">
		<div class="logo">
			<span><img src="img/dios-padre.webp"></span>
		</div>

		<ul class="navbar">
			<li><a style="text-decoration:none" href="#" class="active">Herramientas</a></li>
			<li><a style="text-decoration:none" href="#">Material</a></li>
			<li><a style="text-decoration:none" href="#">Balneario Dios Padre</a></li>
			<li><a style="text-decoration:none" href="mtrSalida.php">Material de salida</a></li>
			<li><a style="text-decoration:none" href="combustible.php">Combustibles</a></li>
			<li><a style="text-decoration:none" href="camionetas.php">Camionetas</a></li>
		</ul>

		<div class="main">
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</div>

</body>
<!--js link--->
<script type="text/javascript" src="../Backend/js/script.js"></script>
<script src="bootstrap/js/jquery-3.6.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>