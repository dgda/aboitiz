<?php include('../templates/header.php'); ?>
<div class="container">
    <div class="row">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="row">
        <div id="i" class="s10 offset-s1 m8 offset-m2">
        </div>
    </div>
    <div class="row">
        <a href="<?= $base_url ?>" class="btn red">Logout</a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script>
    window.onload = function(){
        
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1],
                datasets: [{
                    label: 'Profit gained from downpayments',
                    data: [0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ]
                }]
            },
            options: {
                scales: {
                  yAxes: [{
                      ticks: {
                          min: 0, // it is for ignoring negative step.
                          beginAtZero:true,
                          steps: 40000,
                          stepValue: 5000,
                          max: 200000
                      },
                      gridLines: {
                        display: false
                      }
                  }],
                  xAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines: {
                      display: false
                    }
                  }]
                }
            }
        });
        setInterval(function(){
            var value = -1;
            $.ajax({
                url: 'get.php',
                dataType: 'json',
                success: function(data){
                    var temp = data.id;
                    if(value != temp){
                        myChart.data.labels.push(data.id);
                        myChart.data.datasets.forEach((dataset) => {
                            dataset.data.push(data.price);
                        });
                        myChart.update();
                    }
                }
            });
            $.ajax({
                url: 'fck.php',
                success: function(data){
                    $('#i').html(data);
                }
            });
        }, 2000);
    };
</script>
<?php include('../templates/footer.php'); ?>