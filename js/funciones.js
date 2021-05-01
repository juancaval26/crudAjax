function agregarDatos(){

  // identificador del formulario
  // el serialize manda los datos asociativos es decir propiedad:valor de todo el formulario solo es necesario
  // saber el id/clase para acceder al formulario con serialize
  let datos = $('#enviar').serialize();

  // console.log(datos);

  $.ajax({
    method: "POST",
    url: "./modelo/insertar.php",
    data: datos,
    success:function(e) {
      if(e == '1' || e == 1){
        alert("registro exitoso");
        $("#refrescar").load('../index.php');
      }else{
        alert("error de  registro");
      }
    }
  });

  return false;
}

function traerCampos(id, documento, nombre, notap, notad, notaC){

    // d = datos.split('||');
    $('#Aid').val(id);
    $('#Anombre').val(nombre);
    $('#Adocumento').val(documento);
    $('#AnotaP').val(notap);
    $('#AnotaD').val(notad);
    $('#AnotaC').val(notaC);

    // let promedio = (nota1 + nota2 + nota3) / 3;
}
function actualizar(){
  // identificador del formulario
  // el serialize manda los datos asociativos es decir propiedad:valor de todo el formulario solo es necesario
  // saber el id/clase para acceder al formulario con serialize
  let editar = $('#editarCampos').serialize();
  $.ajax({
    method: "POST",
    url: "./modelo/actualizar.php",
    data: editar,
    success:function(e) {
      if(e == 1){
        alert("se actualizo con exito");
        $("#refrescar").load('index.php');
      }else{
        alert("error al actualizar");
        $("#refrescar").load('index.php');
      }
    }
  });
  return false;

}

function eliminarDatos(){
  let eliminar = $('#Aid');
  $.ajax({
    method: "POST",
    url: "./modelo/eliminar.php",
    data: eliminar,
    success:function(e) {
      if(e == 1){
        alert("se eliminaron los datos con exito");
        $("#refrescar").load('index.php');
      }else{
        alert("error al eliminar datos");
        console.log(eliminar);

      }
    }
  });
  return false;
}
