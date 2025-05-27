<div id="chart_data" data-chart='@json($chartData)'></div>

<script type="text/javascript">
    const chartDataElement = document.getElementById('chart_data');
    const chartData = JSON.parse(chartDataElement.dataset.chart);

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['Datum', 'Broj narudžbina'],
            ...chartData
        ]);

        const options = {
            title: 'Broj narudžbina po danima',
            curveType: 'function',
            legend: { position: 'bottom' }
        };

        const chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
