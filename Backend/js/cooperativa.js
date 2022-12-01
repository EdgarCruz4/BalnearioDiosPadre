let divCont = document.getElementById("divContenedor");

$(document).ready(function () {
    mostrarPrestamos();
});
function saveNew() {
    let values = {
        concepto:document.querySelector('#valMaterial').value,
        solicitante:document.querySelector('#valSolicitante').value,
        area:document.querySelector('#valArea').value
    };
    $.post('../Backend/php/addCooperativa.php',values,function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                mostrarPrestamos();
                alert("Registrado correctamente");
                document.getElementById('formDatos').reset();
            } else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= '';
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= '';
        }
    });
}

function mostrarPrestamos() {
    $.post('../Backend/php/selectCooperativa.php',{dato:"relleno"},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                
                let detail = data.detail;
                divCont.innerHTML = `
                
                <table id="example" class="table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Material</th>
                        <th>Nombre del solicitante</th>
                        <th>Área</th>
                    </tr>
                    </thead>
                  <tbody id="trbody">
                  </tbody>
                </table>
                
                `;

                let trCont = document.getElementById("trbody");
                detail.forEach(row1 => {
                    trCont.innerHTML += `
                    <tr class="null">
                        <td>${row1.fecha}</td>
                        <td>${row1.concepto}</td>
                        <td>${row1.solicitante}</td>
                        <td>${row1.area}</td>
                    </tr>
                    `;
                });

                $('#example').DataTable();
            } else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= '';
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= '';
        }
    });
}

function updateEstatus(id_prestamo) {
    $.post('../Backend/php/updateCooperativa.php',{id:id_prestamo},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                mostrarPrestamos();
                alert("Material evuelto");
            } else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= '';
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= '';
        }
    });
}