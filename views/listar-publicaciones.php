<?php
  include_once '../models/Conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->getConexion();

  $consulta = "SELECT * FROM publisher;";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $empleados = $resultado->fetchAll(PDO::FETCH_ASSOC)
?>



<!doctype html>
<html lang="es">
  <head>
    <title>Principal de empleados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    
  <div class="container">
      <div class="card mt-5">
        <div class="card-header bg-info text-center" >
        <h4 class="text-light" >Lista de Publicaciones</h4>
        </div>
        
        
        <div class="card mb-3 ">
          <label for="public" class="form-label">Publicaciones:</label>
            <select name="public" id="public" class="form-select" required>
              <option value="">Seleccione</option>
            </select>
        </div>
        

        <div class="container">
          <div class="card mt-3 text-center">
            <table id="tablaEmpleados" class="table mt-3 border-danger " id="example">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">FulName</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Race</th>
                  

                </tr>
              </thead>
              <tbody>
                
                <tr>
                </tr>
                  
              </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

    <script> 
    document.addEventListener("DOMContentLoaded", () => {

        function $(id) {return document.querySelector(id)}

        //Funcion
        //
        (function (){
          fetch(`../controllers/public.controller.php?operacion=listar`)
            .then(respuesta => respuesta.json())
            .then(datos => {
              datos.forEach(element => {
                const tagOption = document.createElement("option")
                tagOption.value = element.id
                tagOption.innerHTML = element.publisher_name
                $("#public").appendChild(tagOption)
              });
            })
            .catch(e => {
              console.error(e)
            })
        })();
    })
    (function(){
        $('#tablaEmpleados').DataTable();
      });
    </script>

  </body>
</html>
