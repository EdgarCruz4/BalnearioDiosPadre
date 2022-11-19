let trCont = document.getElementById("trbody");

$(document).ready(function () {
    mostrarRegistros();
});

function mostrarTodo() {
    $('.eventPendientes').show();
    $('.eventTodo').hide();
    
}

function mostrarPendientes() {
    $('.eventTodo').show();
    $('.eventPendientes').hide();
}

function saveCambionetasAndConbustible() {
    let values = {
        conductor:document.querySelector("#valConductor").value,
        camioneta:document.querySelector("#valCamioneta").value,
        actividad:document.querySelector("#valActividad").value,
        gasolina_cargada:document.querySelector("#valGasolina").value+" litros de gasolina"
    };
    saveCamionetas(values);
}

function saveCamionetas(val1) {
    $.post('../Backend/php/addCamionetas.php',val1,function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                saveConbustible(val1);
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

function saveConbustible(val2) {
    $.post('../Backend/php/addConbustible.php',val2,function(respuesta2){
        if (respuesta2!=null) {
            var data2 = JSON.parse(respuesta2);
            if (data2.response == "SUCCESS") {
                trCont.innerHTML = "";
                mostrarRegistros();
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

function mostrarRegistros() {
    $.post('../Backend/php/selectCamionetas.php',{v:"v"},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                let detail = data.detail;
                detail.forEach(row1 => {
                    if (row1.estatus == 1) {
                        trCont.innerHTML += `
                        <tr class="null">
                            <td>${row1.conductor}</td>
                            <td>${row1.camioneta}</td>
                            <td>${row1.fecha}</td>
                            <td>${row1.hora_salida}</td>
                            <td>${row1.actividad}</td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" value="">
                                    <div align="center"><button class="btn btn-success" onclick="updateEstatus(${row1.id});">Entregada</button></div>
                                </form>
                            </td>
                            <td>${row1.gasolina_cargada}</td>
                        </tr>
                        `;
                    } else {
                        trCont.innerHTML += `
                        <tr class="eventTodo">
                            <td>${row1.conductor}</td>
                            <td>${row1.camioneta}</td>
                            <td>${row1.fecha}</td>
                            <td>${row1.hora_salida}</td>
                            <td>${row1.actividad}</td>
                            <td><div align="center">${row1.hora_entrega}</div></td>
                            <td>${row1.gasolina_cargada}</td>
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

function updateEstatus(id_prestamo){
    $.post('../Backend/php/updateCamioneta.php',{id:id_prestamo},function(respuesta){
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