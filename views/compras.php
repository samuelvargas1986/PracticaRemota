
<!-- <span>Compras</span> -->
<?php
session_start();
//echo md5($_SESSION['idusuario']);
?>

<div>

    <div class="container">
        <div>
            <h2>Control - Compras &nbsp;  <i class="fas fa-dog"></i>
     </h2>
     
     </div>
    <hr>
        <div class="row">
    
            <div class="col-md-12 text-right">
                <button type="button" id="" class="btn btn-success" data-toggle="modal" data-target="#modalRegistrarCompra">Agregar Compra &nbsp; <i class="fas fa-plus-circle"></i></button>
            </div>
        </div>
        <hr>
        <table class="table table-striped" style="margin-top: 1em;" id="tabla-Compras">
            <thead>
                
                <th style="width: 12%" >Fecha Compra</th>
                <th style="width: 12%">Usuario Compra</th>
                <th style="width: 12%">Nota</th>
                <th style="width: 12%">Total</th>
                <th style="width: 12%">Opciones</th>
            </thead> 
            <tbody id="body-Compras">  

            </tbody>
            
        </table>
        
    </div>
    
    <!-- MODAL REGISTRA COMPRA -->
    <div class="modal fade" data-backdrop="static" id="modalRegistrarCompra" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="titulo-h5" class="modal-title">Nuevo Registro - Compras <i class="fas fa-clipboard-list-check"></i></h5>
                        <button type="button" id="btnCerrarModal" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <!--  -->
                <div class="modal-body">
                    <form action="" id="formPets">
                         <!--FECHA COMPRA  -->
                         <div class="form-group row">
                            <div class="col-md-4">
                                <label for="">FECHA COMPRA</label> <!--FECHA COMPRA  -->
                                <input type="date" id="txtFechaRescate"  maxlength="50" class="form-control">
                                <span id="SpanFecharescate"></span>
                            </div>
                            <div class="col-md-4"> <!-- USUARIO -->
                                <label for="">USUARIO :</label>
                                 <select name="" id="optUsuario" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                 <label for="">NOTA :</label>
                                 <input  type="text" id="txtNota" placeholder="Nota" maxlength="50" class="form-control">
                                <span id="SpanNombreMascota"></span>
                             </div> 
                           
                        </div>
    
                        <!-- INICIO TABLA -->
                        <div>
                        <div class="container">
                            
                        <!-- PRODUCTO -->
                        <div class="form-group row">
                                                
                                                <div class="col-md-4">
                                                    <label for="">PRODUCTO :</label>                                            
                                                    <input  type="text" id="txtProducto" placeholder="Producto" maxlength="50" class="form-control">
                                                    <span id="SpanNombreMascota"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">CANTIDAD :</label>
                                                    <input  type="number" id="txtCantidad" placeholder="Cantidad" maxlength="50" class="form-control">
                                                    <span id="SpanNombreMascota"></span>
                                                </div>  
                                                <div class="col-md-4">
                                                    <label for="">PRECIO :</label>
                                                    <input  type="number" id="txtPrecio" placeholder="Precio" maxlength="50" class="form-control">
                                                    <span id="SpanNombreMascota"></span>
                                                </div>                                      
                        </div>
                        <hr>
                           
    
                                <div class="col-md-12 text-right">
                                    <!--<button type="button" id="add_product_compra" class="btn btn-success" >Agregar Producto &nbsp; <i class="fas fa-plus-circle"></i></button>-->
                                    <a href="#" id="add_product_compra" class="link_add"><i class="fas fa-plus"></i>Agregar</a>
                                </div>
                          
                        <hr>
                            
                            <table class="table table-striped" style="margin-top: 1em;" id="tbl_compra">
                                <thead>
                                    <th style="width: 40%">PRODUCTO</th>
                                    <th style="width: 15%">CANTIDAD</th>
                                    <th style="width: 15%">PU</th>
                                    <th style="width: 15%">TOTAL</th>
                                    <th style="width: 15%">OPCIONES</th>
                                    
                                </thead>
                                <tbody id="detalle_compra">
                                </tbody>

                                <tfoot id="detalle_totales">

                                 </tfoot>
    
    
                            </table>
                        </div>
                        </div> 
                        <!-- FIN TABLA -->
    
                      
                        
                       
                        
                       
                        
                    </form>
                </div>
                <!--  -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  id="btn_anular_compra" data-dismiss="modal">Anular Compra</button>
                    <button type="button" class="btn btn-primary" id="btn_procesar_compra" style="display: none;">Procesar Compra</button>
                </div>
            </div>
        </div>
    </div><!-- Final Modal REGISTRAR MASCOTA-->


    <!-- MODAL DETALLE PERSONAS -->
<div class="modal fade" id="modalDetCompras" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INFORMACIÓN - COMPRAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row"> <!-- Dividimos en body en 2 partes-->
                    
                    <div class="col-md-12"  ><!-- Parte 2 -->
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Fecha Compra : </label>
                                <label for="" id="labelFecha"></label>
                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for="">Usuario Compra :</label>
                                <label for="" id="labelUsuario"></label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 marginCampo">
                                <label for="">Nota : </label>
                                <label for="" id="labelNota"></label>

                            </div>
                            <div class="col-md-6 marginCampo">
                                <label for="">Total Compra :</label>
                                <label for="" id="labelTotal"></label>

                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-12 marginCampo">
                                
                            <table class="table table-striped" style="margin-top: 1em;" id="tabla-Det">
                                <thead>
                                    
                                    <th style="width: 50%" style="text-align: center;">Nombre Producto</th>
                                    <th style="width: 25%" style="text-align: center;">Cantidad</th>
                                    <th style="width: 25%" style="text-align: center;">Precio Unidad</th>
                                </thead> 
                                <tbody id="body-Det">  

                                </tbody>
                                
                            </table>

                            </div>
                        </div>

                   
                     
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>



    
    <script>
        

    //MUESTRA MODAL DETALLES

        $(document).ready(function () {

            var idcompra = -1;
            $("#body-Compras").on("click",".get", function(){
                idcompra = $(this).attr("data-idcompra");
                var datos ={
                    'operation' : 'getComprasbyID',
                    'idcompra' : idcompra
                };
                
                var datosd ={
                    'operation' : 'getListComprasbyID',
                    'idcompra' : idcompra
                };

                $.ajax({
                    url: "controller/CCompras.php",
                    type: "GET",
                    data: datos,
                    success: function (response) {
                        $("#modalDetCompras").modal("show");
                        var json = JSON.parse(response);
                        $("#labelFecha").html(json.fechcompra);                       
                        $("#labelUsuario").html(json.nombreusuario);
                        $("#labelNota").html(json.nota);
                        $("#labelTotal").html(json.totalcompra);
                        console.log(idcompra);

                    }
                });
            
                function loadDataTableDt(){
                    $.ajax({
                        url: "controller/CCompras.php",
                        type: "GET",
                        data: datosd,
                        success: function (response) {
                            
                            var tablaDet = $("#tabla-Det").DataTable();
                            tablaDet.destroy();
                            $("#body-Det").html(response);
                            $("#tabla-Det").DataTable({
                                language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                            });
                        }
                    });
                }

                loadDataTableDt();
            
            });


            $("#body-Compras").on("click",".del", function(){
                Swal.fire({
                title: '¿Eliminar?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
                }).then((result) => {
                if (result.isConfirmed) {
                    idcompra = $(this).attr("data-idcompra");
                    var datos ={
                        'operation' : 'deleteComprasbyID',
                        'idcompra' : idcompra
                    };
                        $.ajax({
                        url: "controller/CCompras.php",
                        type: "GET",
                        data: datos,
                        success: function (response) {
                            window.location.reload();
                            console.log(idcompra);

                        }
                    });
                 }else{
                    window.location.reload(); 
                 } })

                
                       
            });

            function EliminarCompra(){
                
            }


            
          
        var usuarioid = '<?php echo $_SESSION['idusuario']; ?>';
        serchForDetalle(usuarioid);
           

        function loadDataTableCompras(){
                    $.ajax({
                        url: "controller/CCompras.php",
                        type: "GET",
                        data: "operation=getListCompras",
                        success: function (response) {
                            var tablaPets = $("#tabla-Compras").DataTable();
                            tablaPets.destroy();
                            $("#body-Compras").html(response);
                            $("#tabla-Compras").DataTable({
                                language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                            });
                        }
                    });
                }
    
                function loadUsuarios(){
                    $.ajax({
                        url: "controller/CCompras.php",
                        type: "GET",
                        data: "operation=loadUsuarios",
                        success: function (response) {
                            $("#optUsuario").html(response);
                        }
                    });
                }
    
               function loadDataTableDetcompra(){
                    $.ajax({
                        url: "controller/CCompras.php",
                        type: "GET",
                        data: "operation=getListDetcompra",
                       
                    });
                }
    
                
                
                //Agregar producto al detalle
                $('#add_product_compra').click(function(e){
                    e.preventDefault();
                    if($('#txtCantidad').val() > 0)
                    {
                        var nombreproducto = $('#txtProducto').val();
                        var cantidad = $('#txtCantidad').val();
                        var preciounidad   = $('#txtPrecio').val();
                        var action   = 'addProductoDetalle';

                        $.ajax({
                            url : 'views/ajax.php',
                            type: "POST",
                            async : true,
                            data: {action:action,nombreproducto:nombreproducto,cantidad:cantidad,preciounidad:preciounidad},

                            success: function(response)
                            {
                                //console.log(response);
                                if(response != 'error')
                                {
                                    var info = JSON.parse(response);
                                    //console.log(info);
                                    $('#detalle_compra').html(info.detalle);
                                    $('#detalle_totales').html(info.totales);

                                    $('#txtProducto').val('');
                                    $('#txtCantidad').val('');
                                    $('#txtPrecio').val('');

                                }else{
                                    console.log('no data');
                                }
                                viewProcesar();
                            },
                            error: function(error) {
                            }
                        });
                    }
                });

                //ANULAR COMPRA
                $('#btn_anular_compra').click(function(e){
                    
                    e.preventDefault();
                    var rows = $('#detalle_compra tr').length;

                    if(rows > 0)
                    {
                        var action   = 'anularCompra';

                        $.ajax({
                            url : 'views/ajax.php',
                            type: "POST",
                            async : true,
                            data: {action:action},

                            success: function(response)
                            {
                               // console.log(response);
                                if(response != 'error')
                                {
                                   location.reload();

                                }
                            },
                            error: function(error) {
                            }
                        });
                    }
                });

                 //PROCESAR COMPRA
                 $('#btn_procesar_compra').click(function(e){
                    
                    e.preventDefault();
                    var rows = $('#detalle_compra tr').length;

                    if(rows > 0)
                    {
                        var action   = 'procesarCompra';
                        var nota = $('#txtNota').val();

                        $.ajax({
                            url : 'views/ajax.php',
                            type: "POST",
                            async : true,
                            data: {action:action,nota:nota},

                            success: function(response)
                            {
                                //console.log(response);
                                if(response != 'error')
                                {
                                   // var info = JSON.parse(response);
                                    //console.log(info);
                                  location.reload();

                               }else{
                                   console.log('no data');
                               }
                            },
                            error: function(error) {
                            }
                        });
                    }
                });
    
    
                loadDataTableDetcompra();
                loadDataTableCompras();
                loadUsuarios();
            });

   

    function del_product_detalle(iddetallecompra){
        var action = 'delProductoDetalle';
        var id_detalle = iddetallecompra;
        $.ajax({
                            url : 'views/ajax.php',
                            type: "POST",
                            async : true,
                            data: {action:action,id_detalle:id_detalle},

                            success: function(response)
                            {
                               //console.log(response);
                               if(response != 'error')
                                {
                                    var info = JSON.parse(response);
                                    //console.log(info);
                                    $('#detalle_compra').html(info.detalle);
                                    $('#detalle_totales').html(info.totales);

                                    $('#txtProducto').val('');
                                    $('#txtCantidad').val('');
                                    $('#txtPrecio').val('');

                                }else{
                                    $('#detalle_compra').html('');
                                    $('#detalle_totales').html('');
                                }
                               viewProcesar();
                            },
                            error: function(error) {
                            }
                        });
    }

    function viewProcesar(){
        if($('#detalle_compra tr').length > 0)
        {
            $('#btn_procesar_compra').show();
        }else{
            $('#btn_procesar_compra').hide();
        }
    }

    function serchForDetalle(id){
        var action = 'serchForDetalle';
        var user = id;

                    $.ajax({
                            url : 'views/ajax.php',
                            type: "POST",
                            async : true,
                            data: {action:action,user:user},

                            success: function(response)
                            {
                                //console.log(response);
                                if(response != 'error')
                                {
                                    var info = JSON.parse(response);
                                    //console.log(info);
                                    $('#detalle_compra').html(info.detalle);
                                    $('#detalle_totales').html(info.totales);

                                }else{
                                    console.log('no data');
                                }
                                viewProcesar();
                            },
                            error: function(error) {
                            }
                        });
    }




    </script>