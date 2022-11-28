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
                <input type="hidden" name="id" value="<?php echo $prestamo['id'];?>">
                <div align="center"><button class="btn btn-success" id="recibir">Recibir</button></div>
              <?php
                }
                else{
                  echo 'Entregado';
                }
              ?>
            </td>
            <td>
              <div align="center">
                <input type="hidden" name="id" id="prestamo_id" value="<?php echo $prestamo['id'];?>">
                <button class="btn btn-danger" id="eliminar">Eliminar</button>
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
      $('#eliminar').click(function(){
        var mensaje = confirm("¿Quiere eliminar el registro?");

        if(mensaje == true){
          //confirmación
          var id=$('#prestamo_id').val();
          var ruta="id="+id;

          $.ajax({
            url: '../Backend/eliminar_p.php',
            type: 'POST',
            data: ruta,
            success:function(data){
            prestamo_herramientas();
            }
          })
        }
      });
      $('#recibir').click(function(){
        //confirmación
        var id=$('#prestamo_id').val();
        var ruta="id="+id;

        $.ajax({
          url: '../Backend/prst_hrram_recibido.php',
          type: 'POST',
          data: ruta,
          success:function(data){
            prestamo_herramientas();
          }
        })
      });
    </script>
    <script src="../Backend/js/datatableEspañol.js"></script>


    