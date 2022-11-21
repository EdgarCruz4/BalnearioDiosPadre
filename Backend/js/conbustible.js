let trCont = document.getElementById("trbody");

$(document).ready(function () {
    selectCombustible();
});

function saveConbustible() {
    let values = {
        gasolina_cargada:document.querySelector("#valCa").value+" litros de "+document.querySelector("#valCo").value,
        conductor:document.querySelector("#valSo").value,
        actividad:document.querySelector("#valUs").value
    };
    $.post('../Backend/php/addConbustible.php',values,function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                trCont.innerHTML = "";
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
                detail.forEach(row1 => {
                    trCont.innerHTML += `
                    <tr>
                        <td>${row1.fecha}</td>
                        <td>${row1.combustible}</td>
                        <td>${row1.solicitante}</td>
                        <td>${row1.concepto}</td>
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