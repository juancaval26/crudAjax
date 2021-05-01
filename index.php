<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>crud php/ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>
  <body>
    <form method="post" id="enviar">
      <div class="container" id="refrescar">
        <h1 class="text-center">crud php/ajax</h1>
        
        <div class="row">
          <div class="col-md-3">
            <section class="form-group ">
              <label for="nombre">nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="" placeholder="nombre">
            </section>
            <section class="form-group">
              <label for="documento">documento</label>
              <input type="text" class="form-control" name="documento" id="documento" value="" placeholder="documento">
            </section>
            <section class="form-group">
              <label for="notaP">nota primaria</label>
              <input type="number" class="form-control" name="notaP" id="notaP" value="" placeholder="nota primaria">
            </section>
            <section class="form-group">
              <label for="notaD">nota desempeño</label>
              <input type="number" class="form-control" name="notaD" id="notaD" value="" placeholder="nota desempeño">
            </section>
            <section class="form-group">
              <label for="notaC">nota comportamiento</label>
              <input type="number" class="form-control" name="notaC" id="notaC" value="" placeholder="nota comportamiento">
            </section>
            <section>
              <button type="submit" name="guardar" id="guardar" class=" btn-sm btn-success">enviar</button>
              <input type="reset" class="btn-sm btn-danger" value="Limpiar formulario">
            </section>
        </div>
      </form>

          <div class="col-md-9 mt-3" >
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Documento</th>
                  <th>Nombres</th>
                  <th >Nota Principal</th>
                  <th >Nota Desempeño</th>
                  <th >Nota Comportamiento</th>
                  <th >Promedio</th>
                  <th >Opciones</th>
                </tr>
              </thead>
              <?php
              require "baseDatos/bd.php";

              $sql = "SELECT * FROM estudiantes";
              $resultado =mysqli_query($conexion, $sql);
              while ($fila = mysqli_fetch_array($resultado)) { //dejar asi

               ?>
              <tbody>
                <tr>
                  <th><?php echo $fila[0]; ?></th>
                  <td><?php echo $fila[1]; ?></td>
                  <td><?php echo $fila[2]; ?></td>
                  <td><?php echo $fila[3]; ?></td>
                  <td><?php echo $fila[4]; ?></td>
                  <td><?php echo $fila[5]; ?></td>
                  <td><?php echo $fila[6]; ?></td>

                  <td>
                    <button type="button" onclick="traerCampos('<?php echo $fila['Id'] ?>','<?php echo $fila['Documento'] ?>','<?php echo $fila['Nombres'] ?>',
                      '<?php echo $fila['NotaP'] ?>','<?php echo $fila['NotaD'] ?>','<?php echo $fila['NotaC'] ?>')" data-toggle="modal" data-target="#exampleModal" class="btn-sm btn-warning my-1" name="button">Editar</button>
                  </td>
                </tr>
              </tbody>
             <?php } ?> <!-- dejar asi -->
            </table>
          </div>
        </div>
      </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" id="editarCampos">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <section class="form-group ">
                      <label for="">nombre</label>
                      <input type="text" class="form-control" name="Anombre" id="Anombre" value="" placeholder="nombre">
                    </section>
                    <section class="form-group">
                      <label for="">documento</label>
                      <input type="text" class="form-control" name="Adocumento" id="Adocumento" value="" placeholder="documento">
                    </section>
                    <section class="form-group">
                      <label for="">nota primaria</label>
                      <input type="number" class="form-control" name="AnotaP" id="AnotaP" value="" placeholder="nota primaria">
                    </section>
                    <section class="form-group">
                      <label for="">nota desempeño</label>
                      <input type="number" class="form-control" name="AnotaD" id="AnotaD" value="" placeholder="nota desempeño">
                    </section>
                    <section class="form-group">
                      <label for="">nota comportamiento</label>
                      <input type="number" class="form-control" name="AnotaC" id="AnotaC" value="" placeholder="nota comportamiento">
                    </section>
                    <input type="number" name="Aid" id="Aid" value="" readonly>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
              <button type="submit" id="actualizar" class="btn btn-success">Guardar Cambios</button>
              <button type="submit" id="eliminarD" name="quitar" class="btn btn-danger">Eliminar</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script>
      $(document).ready(function(){
        $("#guardar").on('click', function(e){
          e.preventDefault();
          agregarDatos();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#actualizar").on('click', function(e){
          e.preventDefault();
          actualizar();
        });
      });
    </script>

    <script>
      $(document).ready(function(){
        $("#eliminarD").on('click', function(e){
          e.preventDefault();
          eliminarDatos();
        });
      });
    </script>
  </body>
</html>
