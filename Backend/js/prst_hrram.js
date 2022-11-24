$(document).ready(function () {
    prestamo_herramientas();
  });

  $('#guardar').click(function(){
    var fecha=$('#fecha').val();
    var material=$('#material').val();
    var nombre=$('#nombre').val();
    var entrega=$('#entrega').val();
    var area=$('#area').val();
    console.log(fecha);

    var ruta="fecha="+fecha+"&material="+material+"&nombre="+nombre+"&entrega="+entrega+"&area="+area;

    $.ajax({
      url: '../Backend/prst_hrram_insert.php',
      type: 'POST',
      data: ruta,
      success:function(data){
        material=$('#material').val('');
        prestamo_herramientas();
      }
    })
  });

  function prestamo_herramientas(){
    $.ajax({
      url: '../Backend/tabla_prestamoh.php',
      success:function(r){
        $('#herramientas').html(r);
      }
    });
  }