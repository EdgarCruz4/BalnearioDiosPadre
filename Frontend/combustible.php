<?php 
    //Bro si quieres usar las variables de sesion, las puedes llamar de la siguiente forma
    // $_SESSION['name']
    // $_SESSION['name_id']
    echo `<script>selectCombustible();</script>`;
?>
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
    <title>Combustibles</title>
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
                <div class="modal-body">
                    
                    <form id="formDatos" method="POST" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col mt-4">
                                    <label>Fecha</label>
                                    <input type="date" name="" class="form-control" value="<?php echo $today;?>" readonly required>
                                </div>
                            </div>
                            
                            <div class="row mt-4">
                                <div class="col-7">
                                    <label>Combustible</label>
                                    <Select id="valCo" class="custom-select" required>
                                        <option select hidden>Selecciona el combustible</option>
                                        <option value="gasolina">Gasolina</option>
                                        <option value="diésel">Diésel</option>
                                    </Select>
                                </div>

                                <div class="col">
                                    <label>Cantidad requerida</label>
                                    <div class="input-group-prepend">
                                        <input id="valCa" type="number" class="form-control" name="" value="1" min="1" required>
                                        <span class="input-group-text">Lt</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col mt-4">
                                    <label>Nombre del solicitante</label>
                                    <input id="valSo" type="text" name="" class="form-control" placeholder="Nombre del trabajador" maxlength="60" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col mt-4">
                                    <label>Uso</label>
                                    <input id="valUs" type="text" name="" class="form-control" placeholder="Uso que se le dara al combustible" maxlength="60" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerra</button>
                    <button type="button" class="btn btn-primary" onclick="saveConbustible();">Guardar</button>
                </div>
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
          <h3>Combustibles</h3>
        </div>
        <table id="example" class="table table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>Fecha</th>
                  <th>Combustible</th>
                  <th>Trabajador</th>
                  <th>Uso</th>
              </tr>
          </thead>
            <tbody id="trbody">

            </tbody>
          <!-- <tfoot>
              <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
              </tr>
          </tfoot> -->
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
<script src="../Backend/js/conbustible.js"></script>
</html>



