function drawChart() {
    let hum_options = {
        hAxis: {
            title: 'Time',
            textStyle: {
                fontSize: 10
            }
        },
        vAxis: {
            title: 'Humidity %'
        },
        title: 'Bedroom Humidity',
        curveType: 'none',
        legend: {position: 'none'}
    };
    let temp_options = {
        hAxis: {
            title: 'Time',
            textStyle: {
                fontSize: 10
            }
        },
        vAxis: {
            title: '°C'
        },
        title: 'Bedroom Temperature',
        curveType: 'none',
        legend: {position: 'none'}
    };

    let hum_chart = new google.visualization.LineChart($('#hum_chart')[0]);
    let temp_chart = new google.visualization.LineChart($('#temp_chart')[0]);

    hum_chart.draw(hum_table, hum_options);
    temp_chart.draw(temp_table, temp_options);
}

function clear_hum() {
    hum_table.removeRows(0, hum_table.getNumberOfRows())
}

function clear_temp() {
    temp_table.removeRows(0, temp_table.getNumberOfRows())
}

function update_page() {
    setInterval(function () {
        setTimeout(function () {

        },60000)
    }, 900000)
}