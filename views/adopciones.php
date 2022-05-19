
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-7 text-right">
            <button type="button" id="btnNuevaAdopcion" class="btn btn-success" data-toggle="modal" data-target="#modalAdopciones">Nueva Adopción +</button>
        </div>
    </div>
    <br>        

    <table class="table table-striped">
        <thead>
            <th style="width: 16.6%">Adopción n°</th>
            <th style="width: 16.6%">Animal</th>
            <th style="width: 16.6%">Nombre Mascota</th>
            <th style="width: 16.6%">Propietario</th>
            <th style="width: 16.6%">Detalles</th>
            
        </thead>
        <tbody id="body-adopciones">

        </tbody>
    </table>
</div>




<!-- Modal -->
<div class="modal fade" id="modalAdopciones" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva  Adopción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" id="formAdopciones">
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //Cargamos datos a la tabla
        loadAdopciones();


        function loadAdopciones(){
            $.ajax({
                url: "controller/CAdopciones.php",
                type: "GET",
                data: "operation=getListAdoptions",
                success: function (response) {
                    $("#body-adopciones").html(response);
                    console.log(response);
                }
            });
        }
    });
</script>