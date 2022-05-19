<div>

<div class="container">
    <div>
        <h2>Control - Mascotas &nbsp;  <i class="fas fa-dog"></i>
 </h2>
    </div>
<hr>
    <div class="row">

        <div class="col-md-12 text-right">
            <button type="button" id="" class="btn btn-success" data-toggle="modal" data-target="#modalRegistrarMascota">Agregar Mascota &nbsp; <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <hr>
    <table class="table table-striped" style="margin-top: 1em;" id="tabla-Pets">
        <thead>
            <th style="width: 8%">Nombre</th>
            <th style="width: 8%">Especie</th>
            <th style="width: 12%">Raza</th>
            <th style="width: 12%">Fecha Rescate</th>
            <th style="width: 12%">Sexo</th>
            <th style="width: 12%">Disponibilidad</th>
            <th style="width: 12%">Opciones</th>
        </thead>
        <tbody id="body-Pets">
        </tbody>
    </table>
</div>

<!-- Modal REGISTRAR MASCOTA-->
<div class="modal fade" data-backdrop="static" id="modalRegistrarMascota" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titulo-h5" class="modal-title">Nuevo Registro - Mascotas <i class="fas fa-clipboard-list-check"></i></h5>
                    <button type="button" id="btnCerrarModal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="formPets">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Nombre :</label>
                        </div>
                        <div class="col-md-7">
                            <input  type="text" id="txtNombreMascota" placeholder="Nombre" maxlength="50" class="form-control">
                            <span id="SpanNombreMascota"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-6">
                                <label>Especie : </label>
                                <select name="" id="optEspecie" class="form-control">
                                    <option  value="" >Selccione</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Raza : </label>
                                <select name="" id="optRaza" class="form-control">
                                    <option  value="" id="getRaza"></option>
                                </select>
                                <span id="SpanRaza"></span>
                            </div>
                    </div>
                    <div class="form-group row">
                         <div class="col-md-5">
                            <label for="">Sexo :</label>
                        </div>
                        <div class="col-md-7">
                             <select name="" id="opcionSexo" class="form-control">
                                <option value="">Sexo</option>
                                <option value='M'>Macho</option>
                                <option value='H'>Hembra</option>
                             </select>
                             <span id="SpanSexo"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Fecha Rescate</label>
                        </div>
                        <div class="col-md-7">
                            <input type="date" id="txtFechaRescate"  maxlength="50" class="form-control">
                            <span id="SpanFecharescate"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Disponibilidad :</label>
                        </div>
                        <div class="col-md-7">
                             <select name="" id="opcionEstado" class="form-control">
                                <option value="">Estado</option>
                                <option value="0">Disponible</option>
                                <option value="1">Adoptado</option>
                             </select>
                             <span id="SpanEstado"></span>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelarRegistroMascota">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarRegistroMascota">Guardar</button>
            </div>
        </div>
    </div>
</div><!-- Final Modal REGISTRAR MASCOTA-->
</div> 


<script>
$(document).ready(function () {

    var idmascota = -1;
    var nuevoregistro = true;

    //ASIGNANDO FUNCIONES A EVENTOS 
        $("#btnGuardarRegistroMascota").click(RegistrarMascota);
        $("#btnCancelarRegistroMascota").click(CancelarRegistroMascota);
        $("#btnCerrarModal").click(CancelarRegistroMascota);
        $("#optEspecie").change(loadRaza);
        
    function RegistrarMascota(){
        var nombre = $("#txtNombreMascota").val();
        var raza = $("#optRaza").val();
        var sexo = $("#opcionSexo").val();
        var fecharescate = $("#txtFechaRescate").val();
        var disponibilidad = $("#opcionEstado").val();

        if(nombre==""){
            ValidarCampo("#txtNombreMascota","#SpanNombreMascota");
        }else{
            RemoverValidacion("#txtNombreMascota","#SpanNombreMascota");
            if(raza==""){
                ValidarCampo("#optRaza","#SpanRaza");
            }else{
                RemoverValidacion("#optRaza","#SpanRaza");
                if(sexo==""){
                    ValidarCampo("#opcionSexo","#SpanSexo");
                }else{
                    RemoverValidacion("#txtopcionSexo","#SpanSexo");
                    if(fecharescate==""){
                        ValidarCampo("#txtFechaRescate","#SpanFechaRescate");
                    }else{
                        RemoverValidacion("#txtFechaRescate","#SpanFechaRescate");
                    if(disponibilidad==""){
                            ValidarCampo("#opcionEstado","#SanEstado");
                        }else{
                            RemoverValidacion("#opcionEstado","#SpanEstado");
                                    var datos = {
                                    'nombre'        : nombre,
                                    'idraza'        : raza,
                                    'sexo'          : sexo,
                                    'fecharescate'  : fecharescate,
                                    'disponibilidad': disponibilidad
                                    };

                                    if(nuevoregistro){
                                        datos['operation'] = "registerPets";
                                    }else{
                                        datos['operation'] = "updateMascota";
                                        datos['idmascota'] = idmascota;
                                    }
                                    Swal.fire({
                                    title: '¿Guardar Registro?',
                                    showDenyButton: true,
                                    confirmButtonText: 'Aceptar',
                                    denyButtonText: `Cancelar`,
                                    }).then((result) => {
                                    if (result.isConfirmed) {

                                            $.ajax({
                                            url: "controller/CMascotas.php",
                                            type: "GET",
                                            data: datos,
                                            success: function (response) {
                                                if($.trim(response)=="1"){
                                                    console.log(datos);
                                                    loadDataTablePets();
                                                    resetForm();
                                                    idmascota = -1;
                                                    Swal.fire(
                                                    'Guardado Correctamente',
                                                    'Mascotas - Guardar',
                                                    'success'
                                                    )
                                                }else{
                                                    Swal.fire(
                                                    'Error al registrar',
                                                    'Mascotas-Guardar',
                                                    'warning'
                                                    )
                                                    loadDataTablePets();
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

    // Funciones para Cargar Datos Mascotas
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

    // Obtenemos los datos para actualizar
    $("#body-Pets").on("click",".modificarMascota", function(){ 
                idmascota = $(this).attr("data-idmascota");
                var datos = {
                    'operation' : 'getPetsId',
                    'idmascota' : idmascota
                };

                $.ajax({
                    url: "controller/CMascotas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        var datos = JSON.parse(response);
                        console.log(datos);
                        nuevoregistro = false; 
                        $("#modalRegistrarMascota").modal('show');
                        $("#titulo-h5").html("Modificar Registro - Mascotas");

                        //Enviamos los datos obtenidos a su caja de texto correspondiente
                        $("#txtNombreMascota").val(datos.nombre);
                         $("#optEspecie").val(datos.idespecie);
                        $("#getRaza").val(datos.raza);
                        $("#getRaza").html(datos.raza);
                        $("#opcionSexo").val(datos.sexo);
                        $("#txtFechaRescate").val(datos.fecharescate);
                        $("#opcionEstado").val(datos.disponibilidad);
                        idmascota = datos.idmascota;
                    }
                });
            });



            function loadEspecie(){
                $.ajax({
                    url: "controller/CMascotas.php",
                    type: "GET",
                    data: "operation=loadEspecie",
                    success: function (response) {
                        $("#optEspecie").html(response);
                    }
                });
            }

            function loadRaza(){
                var idespecie = $("#optEspecie").val();

                var datos = {
                    'operation' :   'loadRaza',
                    'idespecie' : idespecie
                };
                $.ajax({
                    url: "controller/CMascotas.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        $("#optRaza").html(response);
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
            function CancelarRegistroMascota(){
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
                $("#formPets")[0].reset();
                $("#modalRegistrarMascota").modal('hide');
                $("#titulo-h5").html("Nuevo Registro - Personas");
                $("#getRaza").val("");
                $("#getRaza").html("");
                nuevoregistro = true;
                idmascota = -1;
            }
            
            loadDataTablePets();
            loadEspecie();
});


</script>






