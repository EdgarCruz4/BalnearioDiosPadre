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
  <div id="sidebar">
    <?php
      include_once 'menu.php';
    ?>
  </div>
  <div class="col">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col mt-5 plus">
        <div class="float-right mt-5"><br>
          <a class="btn btn-primary" href="#"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Nuevo</a>
        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-1"></div>
      <div class="col">
        <div class="mb-5">
          <h3>Material de salida</h3>
        </div>
        <table id="example" class="table table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011-04-25</td>
              </tr>
              <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011-07-25</td>
              </tr>
          <tfoot>
              <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
              </tr>
          </tfoot>
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



