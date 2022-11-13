<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="css/datatable/jquery.dataTables.min.css">
    <!-- icono -->
    <link href="img/dios-padre.webp" rel="icon">
    <title>Document</title>
</head>
<body>
    <!-- Menu -->
    <div id="sidebar">
        <?php
        include_once 'menu.php';
        ?>
    </div>
    <!-- Fin del menu -->
    <!-- Contenido -->
    <main>
        <div class="col content_form">
            <form method="POST" enctype="multipart/form-data" action="../Backend/act_mst_insert.php">
                <div class="form-group">
                    <div class="row mt-5">
                        <div class="col-sm-1"></div>
                        <div class="col mt-4">
                            <label>Titulo</label>
                            <input type="text" name="act_titulo" class="form-control" placeholder="Titulo de la actividad a registrar" maxlength="40" required>
                        </div>
                        <div class="col-sm-3 mt-4">
                            <label>Inicio de Act.</label>
                            <input type="datetime-local" name="act_finicio" class="form-control" value="<?php echo $today;?>" required>
                        </div>
                        <div class="col-sm-3 mt-4">
                            <label>Fin de Act.</label>
                            <input type="datetime-local" name="act_ffin" class="form-control" value="<?php echo $today;?>" required>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6 mt-4">
                            <label>Descripción resumida</label>
                            <input type="text" name="act_dscrp_breve" class="form-control" placeholder="Descripción resumida del evento o actividad" maxlength="60" required>
                        </div>
                        <div class="col mt-4">
                            <label>Correo</label>
                            <input type="text" name="act_email" class="form-control" placeholder="Para mas informes (solo si es necesario)">
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-1"></div>
                        <div class="col mt-4">
                            <label>Descripción detallada</label>
                            <textarea class="form-control" name="act_dscrp" rows="3" placeholder="Descripción detallada del evento o actividad" maxlength="500"></textarea>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5 mt-4">
                            <label>URL</label>
                            <input type="text" name="act_url" class="form-control" placeholder="Agregar una URL solo si es necesario">
                        </div>
                        <div class="col mt-4">
                            <label>Imagen ilustrativa</label>
                            <input type="file" name="act_img" class="form-control-file" accept="image/*" required>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-1"></div>
                            <div class="col">
                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
            </form>
        </div>
    </main>  
    <!-- Fin del contenido -->
</body>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/b0b8de238a.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
</html>