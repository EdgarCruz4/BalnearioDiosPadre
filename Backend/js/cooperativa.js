let trCont = document.getElementById("trbody");

$(document).ready(function () {
    mostrarTodo();
    mostrarPrestamos();
});

function mostrarTodo() {
    $('.eventPendientes').show();
    $('.eventTodo').hide();
    
}

function mostrarPendientes() {
    $('.eventTodo').show();
    $('.eventPendientes').hide();
}

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
                alert("Prestamo registrado");
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
                    if (row1.estatus == 1) {
                        trCont.innerHTML += `
                        <tr id="eventPendientes">
                            <td>${row1.fecha}</td>
                            <td>${row1.concepto}</td>
                            <td>${row1.solicitante}</td>
                            <td>${row1.area}</td>
                            <td><button onclick="updateEstatus(${row1.id});">Entregar</button></td>
                        </tr>
                        `;
                    } else {
                        trCont.innerHTML += `
                        <tr class="eventTodo">
                            <td>${row1.fecha}</td>
                            <td>${row1.concepto}</td>
                            <td>${row1.solicitante}</td>
                            <td>${row1.area}</td>
                            <td>Entregado</td>
                        </tr>
                        `;
                    }
                });
                $('#example').DataTable();
                mostrarTodo();
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