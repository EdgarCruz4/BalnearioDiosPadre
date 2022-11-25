<?php
    require 'script/consultas.php';
    $consulta = new consultas();
    $route = '../';
    ?>

    <table id="example" class="table table-bordered" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>Fecha</th>
            <th width="20%">Material</th>
            <th>Solicitante</th>
            <th>Entrega</th>
            <th>Área</th>
            <th>Recibe</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $result_consulta = $consulta->get_prestamos_renta($route);
        while($prestamo = $result_consulta->fetch_assoc())
        {
        ?>
        <tr>
            <td><?php echo $prestamo['fecha'];?></td>
            <td><?php echo $prestamo['material-obserbaciones'];?></td>
            <td><?php echo $prestamo['solicitante'];?></td>
            <td><?php echo $prestamo['almacenista_entrega'];?></td>
            <td><?php echo $prestamo['area'];?></td>
            <td>
              <?php
                if(empty($prestamo['almacenista_recibe'])){
                  echo 'En prestamo';
                }
                else{
                  echo $prestamo['almacenista_recibe'];
                }
              ?>
            </td>
            <td>
              <?php
                if($prestamo['id_estatus'] == 1)
                {
              ?>
                <form method="POST" action="../Backend/prst_hrram_recibido.php">
                  <input type="hidden" name="id" value="<?php echo $prestamo['id'];?>">
                  <div align="center"><button class="btn btn-success">Recibir</button></div>
                </form>
              <?php
                }
                else{
                  echo 'Entregado';
                }
              ?>
            </td>
        </tr>
    <?php
        }
    ?>
    </tbody>

    <script>
      $(document).ready(function () {
    $('#example').DataTable()
      });
    </script>
    <script src="../Backend/js/datatableEspañol.js"></script>


    