
<style>

    .marginCampo{
        margin-bottom: 2em;
    }

    #contenedor-foto{
        position: relative;
        left: 5em;
    }
    #contendor-archivo{
        position: relative;
        left: 5em;
        top: 1em;    
    }
</style>

<?php
session_start();
?>
<div class="container">
    <div>
        <h2>Personas - Información personal &nbsp;  <i class="fas fa-running" ></i>
 </h2>
    </div>
<hr>

    <div class="row">

        <div class="col-md-12 text-right">
            <button type="button" id="btnNuevaAdopcion" class="btn btn-success" data-toggle="modal" data-target="#modalRegistrarPersona">Agregar Persona &nbsp; <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <hr>
    <table class="table table-striped" style="margin-top: 1em;" id="tabla-personas">
        <thead>
            <th style="width: 12.6%">Nro Documento</th>
            <th style="width: 16.6%">Apellidos</th>
            <th style="width: 16.6%">Nombres</th>
            <th style="width: 16.6%">Teléfono</th>
            <th style="width: 15.6%">Fecha Nacim.</th>
            <th style="width: 19.6%">Config.</th>
            
        </thead>
        <tbody id="body-personas">
        </tbody>
    </table>
</div>


<!-- Modal REGISTRAR PERSONA-->
<div class="modal fade" data-backdrop="static" id="modalRegistrarPersona" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titulo-h5" class="modal-title">Nuevo Registro - Personas <i class="fas fa-clipboard-list-check"></i></h5>
                    <button type="button" id="btnCerrarModal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="formPeople">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Nombres :</label>
                        </div>
                        <div class="col-md-7">
                            <input maxlength="200" type="text" id="txtNombre" placeholder="Nombres" maxlength="50" class="form-control">
                            <span id="SpanNombre"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Apellidos :</label>
                        </div>
                        <div class="col-md-7">
                            <input maxlength="200" type="text" id="txtApellido" placeholder="Apellidos" maxlength="50" class="form-control">
                            <span id="SpanApellido"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Teléfono :</label>
                        </div>
                        <div class="col-md-7">
                            <input maxlength="9" type="tel" id="txtTelefono" placeholder="Teléfono" maxlength="9" class="form-control">
                            <span id="SpanTelefono"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Fecha Nacimiento :</label>
                        </div>
                        <div class="col-md-7">
                            <input type="date" id="txtFechanac" placeholder="Fecha Nacimiento"class="form-control">
                            <span id="SpanFechanac"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <select name="" id="optTipodoc" class="form-control">
                                <option value="">Tipo Documento</option>
                                <option value="D">DNI</option>
                                <option value="N">Carnet Extranj.</option>
                            </select>
                            <span id="SpanTipodoc"></span>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Nro. Documento" maxlength="8" id="txtNumeroDoc">
                            <span id="SpanNumeroDoc"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Correo Electrónico :</label>
                        </div>
                        <div class="col-md-7">
                            <input type="email" class="form-control" placeholder="Correo electrónico" maxlength="50" id="txtCorreoElectronico"> 
                            <span id="SpanCorreo"></span>
                        </div>
                    </div>
                    <label for="">Residencia :</label>
                    <!-- departamentos -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <span>Departamentos : </span>
                            <select name="" id="optDepartamentos" class="form-control">
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span>Provincias : </span>
                            <select name="" id="optProvincias" class="form-control">
                                <option value="" id="getProvincias"></option>
                            </select>
                        </div>
                    </div>
                    <!--/departamentos  -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <span>Distritos : </span>
                            <select name="" id="optDistritos" class="form-control">
                                <option  value="" id="getDistritos"></option>
                            </select>
                            <span id="SpanDistrito"></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelarRegistroPersona">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarRegistroPersona">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- MODAL DETALLE PERSONAS -->
<div class="modal fade" id="modalDetPersona" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INFORMACIÓN - PERSONAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row"> <!-- Dividimos en body en 2 partes-->
                    <div class="col-md-5"> <!--Parte 1 -->
                        <div id="contenedor-foto" style="width: 15em; height: 15em; border: 0.5em solid black; ">
                            <img accept=".jpg" src="img/person-icon.jpg" alt="" style="width: 15em; height: 15em;">
                        </div>
                        <div class="custom-file" style="width: 15em; " id="contendor-archivo">
                            <input type="file" class="custom-file-input" id="archivofoto">
                            <label for="archivofoto" class="custom-file-label">Cambiar Imagen</label>
                        </div>
                    </div>
                    <div class="col-md-7"  ><!-- Parte 2 -->
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Nombres : </label>
                                <label for="" id="labelNombres"></label>
                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for="">Apellidos :</label>
                                <label for="" id="labelApellidos"></label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Fecha Nacimiento : </label>
                                <label for="" id="labelFechanac"></label>

                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for="">Correo Electrónico :</label>
                                <label for="" id="labelCorreo"></label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Tipo Documento : </label>
                                <label for="" id="labelTipodoc"></label>

                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for="">Número Documento:</label>
                                <label for="" id="labelNrodoc"></label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Nivel de confianza : </label>
                                <label for="" id="labelNivelConfianza"></label>
                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for=""> Región : </label>
                                <label for="" id="labelRegion"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Provincia : </label>
                                <label for="" id="labelProvincia"></label>
                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for=""> Distrito : </label>
                                <label for="" id="labelDistrito"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                             <button type="button" class="btn btn-primary" id="btnAgregarVol" data-toggle="modal" data-target="#ModalVol">Agregar Voluntario</button>

                            <button type="button" class="btn btn-danger" id="btnAgregarUsuario">Agregar Usuario</button>

            </div>
        </div>
    </div>
</div>


<!-- MODAL AGREGAR VOLUNTARIO -->
<div class="modal fade" id="ModalVol" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo - Voluntario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" class="form-group">
                    <label for="optRolesVol">Elegir rol de Voluntario</label>
                    <select name="" id="optRolesVol" class="form-control">
                        <option value="">Roles</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        // Varialble que ayudaran a realizar el proceso de actualizacion
        var idpersona = -1;
        var nuevoregistro = true;



            //ASIGNANDO FUNCIONES A EVENTOS 
            $("#btnGuardarRegistroPersona").click(RegistrarPersona);
            $("#optDepartamentos").change(loadProvincias);
            $("#optProvincias").change(loadDistritos);
            $("#btnCancelarRegistroPersona").click(CancelarRegistroPer);
            $("#btnCerrarModal").click(CancelarRegistroPer);

            //Implementando dataTable


            // FUNCION DE REGISTRO
            function RegistrarPersona(){
                var nombres = $("#txtNombre").val();
                var apellidos = $("#txtApellido").val();
                var telefono = $("#txtTelefono").val();
                var tipodoc = $("#optTipodoc").val();
                var numerodoc = $("#txtNumeroDoc").val();
                var correo = $("#txtCorreoElectronico").val();
                var fechanac = $("#txtFechanac").val();
                var iddistrito = $("#optDistritos").val();

                if(nombres==""){
                    ValidarCampo("#txtNombre","#SpanNombre");
                }else{
                    RemoverValidacion("#txtNombre","#SpanNombre");
                    if(apellidos==""){
                        ValidarCampo("#txtApellido","#SpanApellido");
                    }else{
                        RemoverValidacion("#txtApellido","#SpanApellido");
                        if(telefono==""){
                            ValidarCampo("#txtTelefono","#SpanTelefono");
                        }else{
                            RemoverValidacion("#txtTelefono","#SpanTelefono");
                            if(fechanac==""){
                                ValidarCampo("#txtFechanac","#SpanFechanac");
                            }else{
                                RemoverValidacion("#txtFechanac","#SpanFechanac");
                                if(tipodoc==""){
                                    ValidarCampo("#optTipodoc","#SpanTipodoc");
                                }else{
                                    RemoverValidacion("#optTipodoc","#SpanTipodoc");
                                    if(numerodoc==""){
                                        ValidarCampo("#txtNumeroDoc","#SpanNumeroDoc");
                                    }else{
                                        RemoverValidacion("#txtNumeroDoc","#SpanNumeroDoc");
                                        if(correo==""){
                                            ValidarCampo("#txtCorreoElectronico","#SpanCorreo");
                                        }
                                        else{
                                            RemoverValidacion("#txtCorreoElectronico","#SpanCorreo");
                                            if(iddistrito==""){
                                                ValidarCampo("#optDistritos","#SpanDistrito");
                                            }else{
                                                RemoverValidacion("#optDistritos","#SpanDistrito");
                                                        var datos = {
                                                        'nombres'   : nombres,
                                                        'apellidos' : apellidos,
                                                        'fechanac'  : fechanac,
                                                        'nrodoc'    : numerodoc,
                                                        'tipodoc'   : tipodoc,
                                                        'telefono'  : telefono,
                                                        'correo'    : correo,
                                                        'iddistrito': iddistrito
                                                    };

                                                    if(nuevoregistro){
                                                        datos['operation'] = "registerPerson";
                                                    }else{
                                                        datos['operation'] = "updatePerson";
                                                        datos['idpersona'] = idpersona;
                                                    }
                                                    Swal.fire({
                                                    title: '¿Guardar Registro?',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Aceptar',
                                                    denyButtonText: `Cancelar`,
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {

                                                            $.ajax({
                                                            url: "controller/CPersonas.php",
                                                            type: "GET",
                                                            data: datos,
                                                            success: function (response) {
                                                                if($.trim(response)=="1"){
                                                                    loadDataTable();
                                                                    resetForm();
                                                                    idpersona = -1;
                                                                    Swal.fire(
                                                                    'Guardado Correctamente',
                                                                    'Personas - Guardar',
                                                                    'success'
                                                                    )
                                                                }else{
                                                                    Swal.fire(
                                                                    'Error al registrar',
                                                                    'Suscripciones-Guardar',
                                                                    'warning'
                                                                    )
                                                                    loadDataTable();
                                                                }
                                                            }
                                                        });   


                                                    } })
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Obtenemos los datos para actualizar
            $("#body-personas").on("click",".modificar", function(){ //Casi completo
                idpersona = $(this).attr("data-idpersona");
                var datos = {
                    'operation' : 'getPersonbyID',
                    'idpersona' : idpersona
                };

                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        var datos = JSON.parse(response);//COnvertimos la respuesta en un JSON
                        console.log(datos);
                        nuevoregistro = false; 
                        $("#modalRegistrarPersona").modal('show');
                        $("#titulo-h5").html("Modificar Registro - Personas");

                        //Enviamos los datos obtenidos a su caja de texto correspondiente
                        $("#txtNombre").val(datos.nombres);
                        $("#txtApellido").val(datos.apellidos);
                        $("#txtTelefono").val(datos.telefono);
                        $("#optTipodoc").val(datos.tipodoc);
                        $("#txtNumeroDoc").val(datos.nrodoc);
                        $("#txtCorreoElectronico").val(datos.correo);
                        $("#txtFechanac").val(datos.fechanac);
                        $("#optDepartamentos").val(datos.iddepartamento);
                        $("#getProvincias").val(datos.idprovincia);
                        $("#getProvincias").html(datos.provincia);
                        $("#getDistritos").val(datos.iddistrito);
                        $("#getDistritos").html(datos.distrito);
                        idpersona = datos.idpersona;


                    }
                });
            });
            

            $("#body-personas").on("click",".get", function(){
                idpersona = $(this).attr("data-idpersona");
                var datos ={
                    'operation' : 'getPersonbyID',
                    'idpersona' : idpersona
                };                

                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        $("#modalDetPersona").modal("show");
                        var json = JSON.parse(response);
                        $("#labelNombres").html(json.nombres);
                        $("#labelApellidos").html(json.apellidos);
                        $("#labelFechanac").html(json.fechanac);
                        $("#labelCorreo").html(json.correo);
                        $("#labelTipodoc").html(json.tipodoc);
                        $("#labelNrodoc").html(json.nrodoc);
                        $("#labelNivelConfianza").html(json.nivelconfianza);
                        $("#labelRegion").html(json.departamento);
                        $("#labelProvincia").html(json.provincia);
                        $("#labelDistrito").html(json.distrito);
                        console.log(idpersona);

                    }
                });
            });


            // Funciones para Cargar Datos 
            function loadDataTable(){
                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: "operation=getListPeople",
                    success: function (response) {
                        var tablaPer = $("#tabla-personas").DataTable();
                        tablaPer.destroy();
                        $("#body-personas").html(response);
                        $("#tabla-personas").DataTable({
                            language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                        });
                    }
                });
            }
/* departamentos  */
            function loadDepartamentos(){
                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: "operation=loadDepartamentos",
                    success: function (response) {
                        $("#optDepartamentos").html(response);
                    }
                });
            }
            /* departamentos*/

            function loadProvincias(){
                var iddepartameto = $("#optDepartamentos").val();

                var datos = {
                    'operation' :   'loadProvincias',
                    'iddepartamento' : iddepartameto
                };
                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        $("#optProvincias").html(response);
                    }
                });
            }

            function loadDistritos(){
                var idprovincia = $("#optProvincias").val();

                var datos = {
                    'operation' : 'loadDistritos',
                    'idprovincia' : idprovincia
                };

                $.ajax({
                    url: "controller/CPersonas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        $("#optDistritos").html(response);
                    }
                });
            }

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

            // Funcion para cancelar el proceso de registro
            function CancelarRegistroPer(){
                Swal.fire({
                title: '¿Cancelar Proceso?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
                }).then((result) => {
                if (result.isConfirmed) {
                    resetForm();
                 } })
            }

            // REINICIAR FORM
            function resetForm(){
                $("#formPeople")[0].reset();
                $("#modalRegistrarPersona").modal('hide');
                $("#titulo-h5").html("Nuevo Registro - Personas");
                $("#getProvincias").val("");
                $("#getProvincias").html("");
                $("#getDistritos").val("");
                $("#getDistritos").html("");
                nuevoregistro = true;
                idpersona = -1;

            }
            // Ejecutando funciones
            loadDataTable();
            loadDepartamentos();

        
    });
</script>