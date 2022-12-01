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
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $result_consulta = $consulta->get_prestamos_renta($route);
        while($prestamo = $result_consulta->fetch_assoc())
        {
          $prestamoId = $prestamo['id'];
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
                <div align="center">
                  <button class="btn btn-success" id="recibir" onclick="recibir('<?php echo $prestamoId;?>')">Recibir</button>
                </div>
              <?php
                }
                else{
                  echo 'Entregado';
                }
              ?>
            </td>
            <td>
              <div align="center">
                <button class="btn btn-danger" id="eliminar" onclick="eliminar('<?php echo $prestamoId;?>')">Eliminar</button>
              </div>
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
      function eliminar(prestamoId){
        var mensaje = confirm("¿Quiere eliminar el registro?");

        if(mensaje == true){
          //confirmación
          // var id=$('#prestamo_id').val();
          var ruta="id="+prestamoId;

          $.ajax({
            url: '../Backend/eliminar_p.php',
            type: 'POST',
            data: ruta,
            success:function(data){
            prestamo_herramientas();
            }
          })
        }
      };
      function recibir(prestamoId){
        //confirmación
        // var id=$('#prestamo_id').val();
        var ruta="id="+prestamoId;

        $.ajax({
          url: '../Backend/prst_hrram_recibido.php',
          type: 'POST',
          data: ruta,
          success:function(data){
            prestamo_herramientas();
          }
        })
      };
    </script>
    <script src="../Backend/js/datatableEspañol.js"></script>


    