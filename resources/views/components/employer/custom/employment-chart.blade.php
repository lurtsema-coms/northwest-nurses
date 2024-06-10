<div id="chart">
</div>

<script>
    $(document).ready(function(){

    // Dashboard
    let chart;
    let dataChart = {!! json_encode($job_applicants_per_month) !!};
    // Convert the PHP-style data into arrays suitable for ApexCharts
    let categories = [];
    let seriesData = [];

    for (let key in dataChart) {
        // Split the "month/year" string into month and year
        let [month, year] = key.split('/');
        
        // Create a date string in a recognizable format
        let dateString = `${year}-${month.padStart(2, '0')}-01`; // Use the first day of the month
        
        // Push the formatted date and the corresponding count
        categories.push(dateString);
        seriesData.push(dataChart[key]);
    }

    console.log(categories, seriesData)

    let options = {
        series: [{
            name: 'Sales',
            data: seriesData,
        }],
            chart: {
            redrawOnWindowResize: true,
            height: 350,
            type: 'line',
            toolbar: {
                show: false,
            }
        },
            forecastDataPoints: {
            count: 7
        },
        stroke: {
            width: 5,
            curve: 'smooth'
        },
        xaxis: {
            type: 'datetime',
            categories: categories, // The processed categories
            tickAmount: categories.length, // Adjust tick amount based on data length
            labels: {
                formatter: function(value, timestamp, opts) {
                    return opts.dateFormatter(new Date(timestamp), 'MMMM'); // Adjust the format as needed
                }
            }
        },
        title: {
            text: 'Employment Success',
            align: 'left',
            style: {
                fontSize: "16px",
                color: '#666'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                gradientToColors: [ '#FDD835'],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            },
            }
        };

        if (chart) {
            chart.destroy();
            chart = undefined;
        }

        if (document.querySelector("#chart")) {
            chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

    });
    
</script>