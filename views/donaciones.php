<div>
    <?php
    session_start();
    ?>
<div class="container">
    <div>
        <h2>Donaciones - Control &nbsp;  <i class="fas fa-hand-holding-usd"></i>
 </h2>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" id="" class="btn btn-success" data-toggle="modal" data-target="#modalRegistrarDonacion">Nueva Donación &nbsp; <i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
    <hr>
    <table class="table text-center table-striped" style="margin-top: 1em;" id="tabla-Donacion">
        <thead>
            <th style="width: 20%">Tipo Donación</th>
            <th style="width: 15%">Fecha</th>
            <th style="width: 60%">Descripción</th>
            <th style="width: 5%">Cantidad</th>
        </thead>
        <tbody id="body-Donacion">
        </tbody>
    </table>
</div>

<!-- Modal Registrar Donacion-->
<div class="modal fade" data-backdrop="static" id="modalRegistrarDonacion" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titulo-h5" class="modal-title">Nuevo Registro - Donaciones<i class="fas fa-clipboard-list-check"></i></h5>
                    <button type="button" id="btnCerrarModal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="formDonacion">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Datos Persona:</label>
                        </div>
                        <div class="col-md-3">
                            <input  type="text" id="nrodoc" placeholder="Nro Doc" maxlength="" class="form-control">
                        </div>
                        <div class="cold-md-6">
                        <input  type="text" id="datosPersona" readonly="true" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                         <div class="col-md-5">
                            <label for="">Tipo Donación :</label>
                            <input type="text" name="idusuario" id="idusuario"> 
                        </div>
                        <div class="col-md-7">
                             <select name="" id="opcionDonacion" class="form-control">
                                <option value="">Seleccione</option>
                                <option value='Monetaria'>Monetaria</option>
                                <option value='Material'>Material</option>
                             </select>
                             <span id="SpanopcionDonacion"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Cantidad</label>
                        </div>
                        <div class="col-md-7">
                            <input  type="text" id="txtCantidad" placeholder="" maxlength="" class="form-control">
                            <span id="SpanCantidad"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">Descripción :</label>
                        </div>
                        <div class="col-md-7">
                            <textarea type="text" id="txtDescripcion"  rows="2" placeholder="" maxlength="50" class="form-control"></textarea>
                            <span id="SpanDescripción"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7">
                            <button type="button" class="btn btn-primary" id="btnAgregar">Agregar</button>  
                        </div>
                    </div>
                </form>
            </div>
            <div class="card" style="margin-top: 1em">
            <div class="card-header">
                <h4 class="card-title ">Detalle Compra</h4>
            </div>
            <div class="card-body">
                <table class="table text-center table-striped">
                    <thead>
                        <tr>
                            <th style="width: 80%">Descripcion</th>
                            <th style="width: 10%">Cantidad</th>
                            <th style="width: 10%">Opcion</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="body-tmpDetalle">
                       
                    </tbody>
                </table>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="btnCancelarRegistroDonacion">Cancelar</button>
                <button type="button" class="btn btn-outline-primary" id="btnGuardarRegistroDonacion">Guardar</button>
            </div>
        </div>
    </div>
</div><!-- Final Modal Registrar Donacion-->
</div> 

<script>
    $(document).ready(function () {

        //var idPersona = -1; 

        $("#btnAgregar").click(function (){

            var datos = {
                'operation'     : 'registertmpDetalle',
                'cantidad'      : $("#txtCantidad").val(),
                'descripcion'   : $("#txtDescripcion").val()
            };

            $.ajax({
                url : "controller/CTemporal.php",
                type: "GET",
                data: datos,
                success: function(e){
                    console.log("oK");
                    loadDataTablatemporal();
                }
            });

        });

        // Funciones para Cargar tabla donaciones
        function loadDataTabladonaciones(){
                        $.ajax({
                            url: "controller/CDonaciones.php",
                            type: "GET",
                            data: "operation=getListDonacion",
                            success: function (response) {
                                var tablaDonacion = $("#tabla-Donacion").DataTable();
                                tablaDonacion.destroy();
                                $("#body-Donacion").html(response);
                                $("#tabla-Donacion").DataTable({
                                    language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                                });
                            }
                        });
                    }

        function loadDataTablatemporal(){
                    $.ajax({
                        url: "controller/CTemporal.php",
                        type: "GET",
                        data: "operation=ListTmpDetalle",
                        success: function (e) {
                            $("#body-tmpDetalle").html(e);
                        }
                    });
                }

            $("#body-tmpDetalle").on("click", ".deletetmpDetalle", function (){
                if (confirm("¿Esta seguro de eliminar este registro?")){
                    var idtemporal = $(this).attr("data-idtemporal");
                    
                    var datos ={
                        'operation' :   'deleteTmpDetalle',
                        'idtemporal':   idtemporal
                    };

                    $.ajax({
                        url: 'controller/CTemporal.php',
                        type: 'GET',
                        data: datos,
                        success: function(e){
                            loadDataTablatemporal();
                        }
                    });
                }
            });


            $("#btnGuardarRegistroDonacion").click(function(){
                            var datos = {
                                'operation'     : 'registerDonacion',
                                'idpersona'     : idPersona,
                                'tipodonacion'  : $("#opcionDonacion").val()
                            };

                            $.ajax({
                                url: 'controller/CDonaciones.php',
                                type: 'GET',
                                data: datos,
                                success: function(e){
                                    console.log("Donacion procesada correctamente");
                                }
                            });
                });
                
            function buscarPersona(){
                const nrodoc = $("#nrodoc").val();

                if (nrodoc != ""){

                    var datos = {
                                'operation'  : 'buscarPersona',
                                'nrodoc'     : nrodoc
                            };

                    $.ajax({
                        url: 'controller/CPersonas.php',
                        type: 'GET',
                        data: datos,
                        dataType: 'JSON',
                        success: function(result){
                            idPersona = result.idpersona;
                            $("#datosPersona").val(result.nombres + ' ' +result.apellidos )
                        }
                    });
                }
            }

            $("#nrodoc").keypress(function (event){
                if(event.keyCode == 13){
                    buscarPersona();
                }
            });



        loadDataTabladonaciones();
        loadDataTablatemporal();
        

    });





</script>
