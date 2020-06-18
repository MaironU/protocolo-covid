function verDescripcion(name, descripcion){
    console.log(descripcion)
    var title = document.getElementById('name');
    var description = document.getElementById('descripcion');

    title.innerHTML = name;
    description.innerHTML = descripcion;
}