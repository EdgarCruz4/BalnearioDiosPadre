let trCont = document.getElementById("trbody");

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
                trCont.innerHTML = "";
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
                trCont.innerHTML = "";
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