

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
                mostrarRegistros();
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
/*
function saveConbustible(val2) {
    $.post('../Backend/php/addConbustible.php',val2,function(respuesta2){
        if (respuesta2!=null) {
            var data2 = JSON.parse(respuesta2);
            if (data2.response == "SUCCESS") {
                mostrarRegistros();
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
*/
function mostrarRegistros() {
    $.post('../Backend/php/selectCamionetas.php',{v:"v"},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                let divCont = document.getElementById("divContenedor");
                divCont.innerHTML = `
                
                <table id="example" class="table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Conductor</th>
                        <th>Camioneta</th>
                        <th>Fecha</th>
                        <th>Hr. Salisa</th>
                        <th>Actividad</th>
                        <th>Hr. Entregra</th>
                        <th>Gasolina Cargada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="trbody">
    
                </tbody>
            </table>
                

                `;
                let detail = data.detail;
                let trCont = document.getElementById("trbody");
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
                            <td><button onclick="deleteRegistro(${row1.id});" class="btn btn-danger" id="eliminar">Eliminar</button></td>            
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
                            <td><button onclick="deleteRegistro(${row1.id});" class="btn btn-danger" id="eliminar">Eliminar</button></td>            
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
        
        
        var data = JSON.parse(respuesta);
        console.log(data);
        
        /*if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            console.log("data");
            if (data.response == "SUCCESS") {
                mostrarPrestamos();
                alert("Material devuelto");
            } else {
                alert('Ha ocurrido un error, intetelo mas tarde');
                window.location= '';
            }
        }else{
            alert('Ha ocurrido un error, intetelo mas tarde');
            window.location= '';
        }*/
    });
}

function deleteRegistro(idRegistro) {
    $.post('../Backend/php/deleteCamionetas.php',{id:idRegistro},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                mostrarRegistros();
                alert("El registro ha sido eliminado");
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