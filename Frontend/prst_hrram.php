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
    <title>Control de prestamo de herramientas</title>
</head>
<body>
  <div id="sidebar">
    <?php
      include_once 'menu.php';
      $today = date('Y-m-d');
      $time = date('h:i:s');
    ?>
  </div>
  <div class="col">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col mt-5 plus">
        <div class="float-right mt-5"><br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Nuevo
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="../Backend/prst_hrram_insert.php">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="<?php echo $today;?>" readonly required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col mt-4">
                                <label>Material/Observación</label>
                                <textarea class="form-control" name="material" rows="3" placeholder="Material prestado" maxlength="500"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col mt-4">
                                <label>Nombre del solicitante</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del solicitante" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col mt-4">
                                <label>Entrega</label>
                                <input type="text" name="" class="form-control" value="<?php echo $name;?>" placeholder="Nombre del quien entrega" readonly required>
                                <input type="hidden" name="entrega" class="form-control" value="1" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col mt-4">
                                <label>Área</label>
                                <input type="text" name="area" class="form-control" placeholder="Área de uso" maxlength="60" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerra</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <!-- exit modal -->

        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-1"></div>
      <div class="col">
        <div class="mb-5">
          <h3>Control de prestamo de herramientas y renta</h3>
        </div>
        <table id="example" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Material/Observación</th>
                    <th>Solicitante</th>
                    <th>Entrega</th>
                    <th>Recibe</th>
                    <th>Área</th>
                </tr>
            </thead>
            <?php
            $result_consulta = $consulta->get_prestamos_renta($route);
            while($prestamo = $result_consulta->fetch_assoc())
            {
            ?>
            <tbody>
                  <tr>
                      <td><?php echo $prestamo['fecha'];?></td>
                      <td><?php echo $prestamo['material-obserbaciones'];?></td>
                      <td><?php echo $prestamo['solicitante'];?></td>
                      <td><?php echo $prestamo['id_almacenista_entrega'];?></td>
                      <td>
                        <?php
                          if($prestamo['id_almacenista_recibe'] == 1){
                            echo $prestamo['id_almacenista_entrega'];
                          }
                          else{
                          ?>
                            <form method="POST" action="../Backend/prst_hrram_recibido.php">
                              <input type="hidden" name="id" value="<?php echo $prestamo['id'];?>">
                              <div align="center"><button class="btn btn-success">Recibido</button></div>
                            </form>
                          <?php
                          }
                        ?>
                      </td>
                      <td><?php echo $prestamo['area'];?></td>
                  </tr>
            </tbody>
            <?php
            }
            ?>
      </table>
      </div>
      <div class="col-sm-1"></div>
    </div>
  </div>
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



