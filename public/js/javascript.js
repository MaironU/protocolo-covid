var ruta = "http://192.168.43.148:8000/";

function verDescripcion(name, descripcion){
    var title = document.getElementById('name');
    var description = document.getElementById('descripcion');

    title.innerHTML = name;
    description.innerHTML = descripcion;
}

function toogle(){
    var sidebar = document.getElementById('accordionSidebar');

    let elementStyle = window.getComputedStyle(sidebar);
    let display = elementStyle.getPropertyValue('display');

    if(display === 'none'){
        sidebar.classList.remove('display-none')        
        sidebar.classList.add('display-block')
    }else{
        sidebar.classList.remove('display-block')        
        sidebar.classList.add('display-none')
    }

}
function agregarTemperatura(id){
    var title = document.getElementById('nameT');
    var description = document.getElementById('descripcionT');
    var modal = document.getElementById("openmodal");

    modal.dataset.id = id;

    title.innerHTML = 'Agregar temperatura';
    description.innerHTML = '<div class="p-3 border"><input style="width: 130px" class="focus text-truncate border-0" type="number" placeholder="Temperatura" id="temperatura" name="temperatura" /><span class="px-2 ml-2 bg-primary text-light">° grados</span></div>';
}

function guardarTemperatura(){    
    var temperatura = document.getElementById("temperatura").value  
    document.getElementById("add-temperatura").innerHTML = temperatura + "°";
    document.getElementById("add-temperatura-hidden").value = temperatura;
}

$('#buscarApellidoCel').on("keyup", function(){

    var palabra = this.value
    
    if(palabra != ""){    
        $.ajax({
            url: ruta +`api/buscar/${palabra}`,
            success: function(response) {
                console.log(response)
                document.getElementById("contentCel").innerHTML = ""
                if(response.length > 0){
                    response.forEach(trabajador => {
                        document.getElementById("contentCel").innerHTML += `
                            <a href='${ruta}trabajadores/perfil/${trabajador.trabajador_id}' class='list-group-item border-0 p-0 py-3 ml-1 hover-a'>
                                <i class='fa fa-user mr-3' aria-hidden='true'></i>${trabajador.firstname} ${trabajador.lastname}
                            </a>
                        `
                    });
                }
            },
            error: function(error) {
                console.log(error)
            }
        })
    }else{
        document.getElementById("contentCel").innerHTML = ""
    }
});

$('#buscarApellidoPc').on("keyup", function(){

    var palabra = this.value
    
    if(palabra != ""){    
        $.ajax({
            url: ruta +`api/buscar/${palabra}`,
            success: function(response) {
                console.log(response)
                document.getElementById("contentPc").innerHTML = ""
                if(response.length > 0){
                    response.forEach(trabajador => {
                        document.getElementById("contentPc").innerHTML += `
                            <a href="${ruta}trabajadores/perfil/${trabajador.trabajador_id}" class="list-group-item border-0 p-0 py-3 hover-a">
                                <i class="fa fa-user mx-3" aria-hidden="true"></i>${trabajador.firstname} ${trabajador.lastname}
                            </a>
                        `
                    });
                }
            },
            error: function(error) {
                console.log(error)
            }
        })
    }else{
        document.getElementById("contentPc").innerHTML = ""
    }
});


/*var data = {
        'temperatura': temperatura.toString(),
        'id': parseInt(id)
    }

    $.ajax({
        url: 'http://192.168.1.15:8000/api/reportes/nuevo',
        type: 'POST',
        data: data,
        dataType: 'JSON'
    }).done(function(response) {
        console.log(response)
        if(response === 'agregado'){
            document.getElementById("add-temperatura").innerHTML = temperatura;
        }
    }).fail(function(error) {
        console.log(error)
    })*/