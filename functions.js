function drawChart() {
    var hum_table = null;
    var temp_table = null;

    $.ajax({
        method: "GET",
        url: "get_table_data.php"
    })
        .done(function (response) {
            let weather_data = JSON.parse(response);
            let recent_hum = weather_data[0];
            let recent_temp = weather_data[1];

            recent_hum.unshift(['Time', 'Humidity'])
            recent_temp.unshift(['Time', 'Temperature'])

            console.log(recent_hum)

            hum_table = google.visualization.arrayToDataTable(recent_hum);
            temp_table = google.visualization.arrayToDataTable(recent_temp);

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
                title: 'Bedroom Humidity (Past 24 Hours)',
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
                title: 'Bedroom Temperature (Past 24 Hours)',
                curveType: 'none',
                legend: {position: 'none'}
            };

            let hum_chart = new google.visualization.LineChart($('#hum_chart')[0]);
            let temp_chart = new google.visualization.LineChart($('#temp_chart')[0]);

            hum_chart.draw(hum_table, hum_options);
            temp_chart.draw(temp_table, temp_options);
        })
}

function update_page() {
    setInterval(function () {
        setTimeout(function () {

        },60000)
    }, 900000)
}

