
<!-- <span>Compras</span> -->

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
            <th style="width: 8%">Nombre Producto</th>
            <th style="width: 8%">Cantidad</th>
            <th style="width: 12%">Precio</th>
            <th style="width: 12%">Fecha Compra</th>
            <th style="width: 12%">Usuario Compra</th>
            <th style="width: 12%">Nota</th>
            <th style="width: 12%">Opciones</th>
        </thead> 
        <tbody id="body-Compras">  </tbody>
    </table>
    
</div>

<!-- MODAL REGISTRA COMPRA -->
<div class="modal fade" data-backdrop="static" id="modalRegistrarCompra" tabindex="-1" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titulo-h5" class="modal-title">Nuevo Registro - Compras <i class="fas fa-clipboard-list-check"></i></h5>
                    <button type="button" id="btnCerrarModal" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <!--  -->
            <div class="modal-body">
                <form action="" id="formDetCompra">
                     <!--FECHA COMPRA  -->
                     <div class="form-group row">
                        <div class="col-md-5">
                            <label for="">FECHA COMPRA</label>
                        </div>
                        <div class="col-md-7">
                            <input type="date" id="txtFechaRescate"  maxlength="50" class="form-control">
                            <span id="SpanFecharescate"></span>
                        </div>
                    </div>
                    <!--FECHA COMPRA  -->
                    <!-- USUARIO -->
                    <div class="form-group row">
                        
                        <div class="col-md-5">
                            <label for="">USUARIO :</label>
                        </div>
                        <div class="col-md-6">
                        <select name="" id="optUsuarios" class="form-control">
                                
                                </select>
                        </div>
                       
                    </div>
                   
                    <!--/USUARIO  -->
                    <!-- NOTA -->
                    <div class="form-group row">
                                            
                                            <div class="col-md-5">
                                                <label for="">NOTA :</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input  type="text" id="txtNombreMascota" placeholder="Nota" maxlength="50" class="form-control">
                                                <span id="SpanNombreMascota"></span>
                                            </div>
                                        
                                        </div>
                     <!--/NOTA  -->
                    <!-- INICIO TABLA -->
                    <div>
                    <div class="container">
                        
                    <hr>
                        <div class="row">

                            <div class="col-md-12 text-right">
                                <button type="button" id="AgregarProducto" class="btn btn-success" data-toggle="modal" >Agregar Producto &nbsp; <i class="fas fa-plus-circle"></i></button>
                            </div>
                        </div>
                        <hr>
                        
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
                                    <button type="button" id="btnAgregar" class="btn btn-success" onclick="agregar()">Agregar Producto &nbsp; <i class="fas fa-plus-circle"></i></button>
                                </div>
                          
                        <hr>
                    
                     
                        
                        <table class="table table-striped" style="margin-top: 1em;" id="tabla-Detcompra">
                            <thead>
                                <th style="width: 8%">PRODUCTO</th>
                                <th style="width: 8%">CANT</th>
                                <th style="width: 12%">PU</th>
                                <th style="width: 12%">OPCIONES</th>
                                
                            </thead>
                            <tbody id="body-Detcompra">
                            </tbody>


                        </table>
                    </div>
                    </div> 
                    <!-- FIN TABLA -->

                  
                    
                   
                    
                   
                    
                </form>
            </div>
            <!--  -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelarRegistroMascota">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarRegistroMascota">Guardar</button>
            </div>
        </div>
    </div>
</div><!-- Final Modal REGISTRAR MASCOTA-->

<script>
        function agregar(){
        
        var producto = document.getElementById("txtProducto").value;
        var cantidad = document.getElementById("txtCantidad").value;
        var precio = document.getElementById("txtPrecio").value;
        var boton ='<button type="button" class="borrar btn btn-danger btn-sm">Eliminar</button>';
        var fila="<tr><td>"+producto+"</td><td>"+cantidad+"</td><td>"+precio+"</td><td>"+boton+"</td></tr>";

        var btn = document.createElement("TR");
        btn.innerHTML=fila;
        document.getElementById("body-Detcompra").appendChild(btn);
    }

    $(document).on('click', '.borrar', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    }); 

    $(document).ready(function () {
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
                        $("#optUsuarios").html(response);
                    }
                });
            }

            function loadDataTableDetcompra(){
                $.ajax({
                    url: "controller/CCompras.php",
                    type: "GET",
                    data: "operation=getListDetcompra",
                    success: function (response) {
                        var tablaPets = $("#tabla-Detcompra").DataTable();
                        tablaPets.destroy();
                        $("#body-Detcompra").html(response);
                        $("#tabla-Detcompra").DataTable({
                            language:{url:'//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'}
                        });
                    }
                });
            }

            function RegistrarDetCompra(){
                if(confirm("Desea registrar esta compra")){
                    $.ajax({
                        url:'../controller/CCompras.php',
                        type:'POST',
                        data:{
                            operation       :'RegistrarDetCompra',
                            idcompra        :'2',
                            nombreproducto  :$("#nombreproducto").val(),
                            cantidad        :$("#cantidad").val(),
                            preciounidad    :$("#preciounidad").val(),

                        },
                        success: function (result)
                        {
                            if(result=="")
                            {
                                alert("Se agrego la compra");
                                $("formDetCompra")[0].reset();

                            }

                        }
                    })

                }
                

            }
            $("#AgregarProducto").click(RegistrarDetCompra);


            loadDataTableDetcompra();
            loadDataTableCompras();
            loadUsuarios();
        });
</script>