
let divCont = document.getElementById("divContenedor");

$(document).ready(function () {
    selectCombustible();
});

function saveConbustible() {
    let values = {
        combustible:document.querySelector('#valCo').value,
        gasolina_cargada:document.querySelector("#valCa").value+" litros de "+document.querySelector("#valCo").value,
        conductor:document.querySelector("#valSo").value,
        actividad:document.querySelector("#valUs").value
    };
    $.post('../Backend/php/addConbustible.php',values,function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                selectCombustible();
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

function selectCombustible() {
    $.post('../Backend/php/selectCombustible.php',{dato:"relleno"},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);

            if (data.response == "SUCCESS") {
                let detail = data.detail;

                divCont.innerHTML = `
            
                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Combustible</th>
                                <th>Trabajador</th>
                                <th>Uso</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="trbody">

                        </tbody>
                    </table>
                
                `;

                
                    let trCont = document.getElementById("trbody");
                    detail.forEach(row1 => {

                        trCont.innerHTML += `
                        <tr>
                            <td>${row1.fecha}</td>
                            <td>${row1.combustible}</td>
                            <td>${row1.solicitante}</td>
                            <td>${row1.concepto}</td>
                            <td><button onclick="deleteRegistro(${row1.id});" class="btn btn-danger" id="eliminar">Eliminar</button></td>            
                        </tr>
                        `;
                    })
                

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

function deleteRegistro(idRegistro) {
    $.post('../Backend/php/deleteCombustible.php',{id:idRegistro},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                selectCombustible();
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