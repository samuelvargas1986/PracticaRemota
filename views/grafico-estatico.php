<?php
session_start();

?>
<div class="row">
    <div class="col-md-12">
        <div style="position: relative; width: 60vw; height: 30vw; margin: auto;">
            <canvas id="lienzo"></canvas>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <form class="form-inline" method="post" name="formMascotas" id="formMascotas">
            <div class="col-xs-10 col-xs-offset-3">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" class="form-control" id="fecha_inicio" required>
                </div>
                <div class="form-group">
                    <label for="fecha_final">Fecha Final:</label>
                    <input type="date" class="form-control" id="fecha_final" required>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
                </div>
            </div>
    </div>
</div>


</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script>

    $(document).ready(function(){
        const contexto = document.getElementById('lienzo').getContext('2d');
        var grafico;
        $.get('./controller/CMascotas.php?operation=loadCharts', function(response){
            let result = JSON.parse(response);
            console.log(response);
            grafico = new Chart(contexto, {
                type: 'bar',
                data: {
                    labels: result.rescate.labels,
                    datasets: [{
                            label: 'Mascotas Rescatadas',
                            data: result.rescate.datas,
                            backgroundColor: listBackground,
                            boderColor: listBorder,
                            borderWidht: 1

                        },
                        {
                            label: 'Mascotas Adoptadas',
                            data: result.adopcion.datas,
                            backgroundColor: listBackground,
                            boderColor: listBorder,
                            borderWidht: 1

                        }

                    ]
                },
                options: opChart
            });


        });

        $("#buscar").click(function(){
            let startDate = $("#fecha_inicio").val();
            let endDate = $("#fecha_final").val();
            
            $.get('./controller/CMascotas.php?operation=loadCharts&startDate='+startDate+"&endDate="+endDate, function(response){
                let result = JSON.parse(response);
                let new_data = {
                    labels: result.rescate.labels,
                    datasets: [{
                            label: 'Mascotas Rescatadas',
                            data: result.rescate.datas,
                            backgroundColor: listBackground,
                            boderColor: listBorder,
                            borderWidht: 1

                        },{
                            label: 'Mascotas Adoptadas',
                            data: result.adopcion.datas,
                            backgroundColor: listBackground,
                            boderColor: listBorder,
                            borderWidht: 1

                        }
                    ]
                };
                grafico.data = new_data;
                grafico.update();
            });
        });
    });
    

    
</script>
