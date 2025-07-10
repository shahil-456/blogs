

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Lead Summary</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="column_chart" data-colors='["--vz-danger", "--vz-primary", "--vz-success"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
            </div>
        </div>
    </div>

<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('build/js/pages/apexcharts-column.init.js') }}"></script>

<script>

// Basic Column Chart
var chartColumnColors = getChartColorsArray("column_chart");
if (chartColumnColors) {
    var options = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                endingShape: 'rounded',
                distributed: true 
            },
            colors: {!! json_encode($status_names) !!}      

        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Counts',
            data:{!! json_encode($counts) !!}
            
        },
        ],
        colors: {!! json_encode($colors) !!} ,     

        xaxis: {
            categories: {!! json_encode($status_names) !!}      
              },
        yaxis: {
            title: {
                text: 'Counts'
            }
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return " " + val + " Leads"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#column_chart"),
        options
    );

    chart.render();
}
</script>