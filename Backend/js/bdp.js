let trCont = document.getElementById("trbody");

$(document).ready(function () {
    selectPrestamo();
});

function savePrestamo() {
    let values = {
        material:document.querySelector("#valMat").value,
        solicitante:document.querySelector("#valSol").value,
        area:document.querySelector("#valAre").value
    };
    $.post('../Backend/php/addBDP.php',values,function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                trCont.innerHTML = "";
                selectPrestamo();
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

function selectPrestamo() {
    $.post('../Backend/php/selectBDP.php',{I:"I"},function(respuesta){
        if (respuesta!=null) {
            var data = JSON.parse(respuesta);
            if (data.response == "SUCCESS") {
                let detail = data.detail;
                detail.forEach(row1 => {
                    trCont.innerHTML += `
                    <tr>
                        <td>${row1.fecha}</td>
                        <td>${row1.material}</td>
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