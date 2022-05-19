 <?php

 session_start();
if(isset($_SESSION['login'])){
    if($_SESSION['login']){
        header('location:main.php');
    }
}
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-WEB</title>
    <link rel="stylesheet" href="dist/css/fontello.css">
    <link rel="stylesheet" href="dist/css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DATATABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="icon-guidedog">Helpets</h1>
            <div class="text-right" style="position: absolute; right: 4em; top: 1em;">
                <h5 class="text-rigth"><a  id="btnModaIniciarsesion" href="#">Iniciar Sessión</a></h5>
            </div>
            <input type="checkbox" name="" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a href="#">Inicio</a>
                <a href="#">Mascotas</a>
                <a href="#">Blog</a>
                <a href="#">Contacto</a>
            </nav>
        </div>
    </header>
    <main>
        <section id="banner">
            <img src="dist/img/banner.jpg" alt="">
            <div class="contenedor">
                <h2>Mi mascotas favoritas</h2>
                <p>¿Cuál es tu macota favorita?</p>
                <a href="#">Leer mas</a>
            </div>
        </section>
        <section id="bienvenidos">
            <h2>BIENVENIDOS AL HOGAR DE MASCOTAS</h2>
            <p>El hogar de macotas no es un simple lugar de negocio, para nosotros
                tu mascota es nuestra mascota, la trataremos como un integrante mas 
                de nuestra familia
            </p>
        </section>
        <section id="blog">
            <h3>Lo ultimo de nuestro blog</h3>
            <div class="contenedor">
                <article>
                    <img src="dist/img/mascota1.jpg" alt="">
                    <h4>Escoge tu mascota favorita</h4>
                </article>
                <article>
                    <img src="img/imagen2.jpg" alt="">
                    <h4>Una Mascota de acuerdo a tu personalidad</h4>
                </article>
                <article>
                    <img src="dist/img/imagen3.jpg" alt="">
                    <h4>No busques mas, llevame contigo</h4>
                </article>
            </div>
        </section>

         
         <!--Mostrar mascotas index-->
         <section>
            <div class="container">
               
            
            <table class="table table-striped" style="margin-top: 1em;" id="tabla-Pets">
        <thead>
            <th style="width: 8%">Nombre</th>
            <th style="width: 8%">Especie</th>
            <th style="width: 12%">Raza</th>
            
            <th style="width: 12%">Sexo</th>
            <th style="width: 12%">Disponibilidad</th>
            
        </thead>
        <tbody id="body-Pets">
        </tbody>
        </table>

            </div>
        </section>

         <!------------->
        <section id="info">
            <h3>En esta galeria te mostramos que tenemos un compromiso con tu mascota
                Recalcamos que son parte de nuestra familia
            </h3>
            <div class="contenedor">
                <div class="info-mas">
                    <img src="dist/img/info1.jpg" alt="">
                    <h4>Max</h4>
                </div>
                <div class="info-mas">
                    <img src="dist/img/info2.jpeg" alt="">
                    <h4>Jenny</h4>
                </div>
                <div class="info-mas">
                    <img src="dist/img/info3.jpg" alt="">
                    <h4>Rosa</h4>
                </div>
                <div class="info-mas">
                    <img src="dist/img/info4.jpg" alt="">
                    <h4>Cesar</h4>
                </div>
            </div>

        </section>
    </main>


    
    <!-- Modal INICIAR SESSION -->
    <div class="modal fade" data-backdrop="static"  id="modalIniciarSesion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Iniciar Sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="txtNombreUsuario">Nombre de usuario</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" id="txtNombreUsuario" class="form-control">
                                    <span id="spanNombreUsuario"></span>
                                </div>
                            </div>
                            <label for="txtContraseña">Contraseña</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" id="txtContraseña" class="form-control">
                                    <span id="spanContraseña"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnInicarSesion" class="btn btn-primary">Iniciar Sesión</button>
                    <button type="button" id="btnCancelarInicio" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ./wrapper -->
<!--SWEET ALERT -->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- REQUIRED SCRIPTS -->
<script src="https://kit.fontawesome.com/bc7e70a433.js" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- libreria para cargar view en dashboard-->
<script src="dist/js/loadweb.js"></script>
<!-- chartjs cdn-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
       <!-- DATATABLES-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- / -->
<script>
    $(document).ready(function () {

        function loadDataTablePets(){
                $.ajax({
                    url: "controller/CMascotas.php",
                    type: "GET",
                    data: "operation=getListPets",
                    success: function (response) {
                        var tablaPets = $("#tabla-Pets").DataTable();
                        tablaPets.destroy();
                        $("#body-Pets").html(response);
                        $("#tabla-Pets").DataTable({
                            language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                        });
                    }
                });
            }
            loadDataTablePets();   
        // ABRIR MODAL
        $("#btnModaIniciarsesion").click(function(){
            $("#modalIniciarSesion").modal("show");
        });

        $("#btnInicarSesion").click(function(){
            var nombreusuario = $("#txtNombreUsuario").val();;
            var contraseña = $("#txtContraseña").val();

            if(nombreusuario==""){
                ValidarCampo("#txtNombreUsuario","#spanNombreUsuario");
            }else{
                RemoverValidacion("#txtNombreUsuario","#spanNombreUsuario");
                if(contraseña==""){
                    ValidarCampo("#txtContraseña","#spanContraseña");
                }else{
                    RemoverValidacion("#txtContraseña","#spanContraseña");
                    
                    var datos ={
                        'operation'         : 'UserValidation',
                        'nombreusuario'     :  nombreusuario,
                        'contraseña'        :  contraseña   
                    };

                    $.ajax({
                        url: "controller/CUsuarios.php",
                        type: "GET",
                        data: datos,
                        success: function (response) {
                            if($.trim(response)=="1"){
                                window.location.href = "main.php";
                            }else if($.trim(response)=="0"){
                                Swal.fire(
                                'Este usuario no existe',
                                'Iniciar Sesion',
                                'warning'
                                )
                            }else if($.trim(response)=="-1"){
                                Swal.fire(
                                'Contraseña Incorrecta',
                                'Iniciar Sesion',
                                'warning'
                                )
                            }
                        }
                    });
                }
            }
        });


        //Funcion creada para añadirle estilo de alerta cuando un campo obligatorio este vacio
        function ValidarCampo(campo,span){
                $(campo).addClass("is-invalid");
                $(span).html("Completar Por favor :");
                $(span).css("color","red");
                $(span).css("font-size","0.8em");
        }

        //Funcion creada para quitarle los estilos de alerta cuando el campo ya este completo
        function RemoverValidacion(campo,span){
            $(campo).removeClass("is-invalid");
            $(span).html("");
         }
       
        

    });
    function loadDataTablePets(){
                $.ajax({
                    url: "controller/CMascotas.php",
                    type: "GET",
                    data: "operation=getListPetsIndex",
                    success: function (response) {
                        var tablaPets = $("#tabla-Pets").DataTable();
                        tablaPets.destroy();
                        $("#body-Pets").html(response);
                        $("#tabla-Pets").DataTable({
                            language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                        });
                    }
                });
            }
            loadDataTablePets(); 
</script>

</body>
</html> 

