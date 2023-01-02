<?php
	require '../Backend/script/consultas.php';
    $consulta = new consultas();

	$name = $consulta->session_star_menu();
    $route = '../';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
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
			<li><a style="text-decoration:none" href="cooperativa.php">Cooperativa</a></li>
			<li><a style="text-decoration:none" href="BDP.php">Balneario Dios Padre</a></li>
			<li><a style="text-decoration:none" href="prst_hrram.php">Control de herramientas</a></li>
			<li><a style="text-decoration:none" href="combustible.php">Combustibles</a></li>
			<li><a style="text-decoration:none" href="camionetas.php">Camionetas</a></li>
			<li><a style="text-decoration:none" class="active" data-toggle="modal" data-target="#usuario">Usuario</a></li>
			<li><a style="text-decoration:none" class="active" href="../Backend/exit.php">Salir</a></li>
		</ul>

		<div class="main">
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</div>

	<div>
		<!-- Modal -->
		<div class="modal fade" id="usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="../Backend/usu_edit.php">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Nombre del nuevo trabajador</label>
                                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Apellidos</label>
                                <input type="text" name="apellido" class="form-control" placeholder="Apellido paterno y materno" required>
                            </div>
                        </div>
                    </div>
					<div class="alert alert-warning" role="alert">
						<b>Solo editar cuando ingrese un nuevo trabajador</b> que remplace el puesto de uno de los recepcionistas de la bodega!
						<p><b>La sesión se cerrara al cambiar el nombre.</b></p>
					</div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>&nbsp;&nbsp;Cerra</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;Guardar</button>
                </div>
                </form>
                </div>
            </div>
        </div>
        <!-- exit modal -->
	</div>
</body>
<!--js link--->
<script type="text/javascript" src="../Backend/js/script.js"></script>
<script src="bootstrap/js/jquery-3.6.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>