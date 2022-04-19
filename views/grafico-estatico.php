
<div class="row">
    <div class="col-md-12">
        <div style="position: relative; width: 60vw; height: 30vw; margin: auto;">
            <canvas id="lienzo"></canvas>
        </div>
    </div>
</div>

<form action="">
    <div class="row" >     
        <div class="form-group">
             <label for="windows">windows</label>
            <input type="text" id="windows" class="form-control">
        </div>
        <div class="form-group">
             <label for="linux">Linux</label>
             <input type="text" id="linux" class="form-control">
        </div>
        <div class="form-group">
            <label for="android">Android</label>
            <input type="text" id="android" class="form-control">
        </div>
        <div class="form-group">
            <label for="macos">MacOS</label>
            <input type="text" id="macos" class="form-control">
        </div>
        <div class="col-md-4" style="margin-top: 2em">
            <button type="button" class="btn btn-primary" id="generar">Generar</button>
        </div>
    </div>
</form>
        
<script>
    //contexto representa el tipo de vamvas a utilizar
    const contexto = document.getElementById('lienzo').getContext('2d');
    //construir un objeto chart
    //
    const grafico =new Chart(contexto,{
        type:'bar',
        data: {
            labels:["Windows","Linux","Android","MacOS"],
            datasets:[{
                label:'Ventas',
                data:[15,20,25,30],
                backgroundColor:listBackground,
                boderColor:listBorder,
                borderWidht: 3
            }
        ]
        }, 
        options: opChart
        });

        function actualizarDatos(){
            let win = $("#windows").val();
            let lnx = $("#linux").val();
            let adr = $("#android").val();
            let mac = $("#macos").val();

            grafico.data.datasets[0].data =[win,lnx,adr,mac];
            grafico.update();
        }
        $("#generar").click(actualizarDatos);

        
</script>