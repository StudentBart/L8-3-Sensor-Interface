google.charts.load('current', {'packages':['corechart']});

var hum_table = null;
var temp_table = null;

$(window).on('load', function () {
    $.ajax({
        method: "GET",
        url: "get_table_data.php?view=hour"
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

            drawChart();
        })

    $('#hum_day').on('click' , function () {
        clear_hum();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?view=hour"
        })
            .done(function (response) {
                let weather_data = JSON.parse(response);
                let recent_hum = weather_data[0];

                hum_table.addRows(recent_hum);
                drawChart();
            })
    })

    $('#hum_week').on('click' , function () {
        clear_hum();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=168&view=day"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_hum = weather_data[0];

                hum_table.addRows(recent_hum);
                drawChart();
            })
    })
    $('#hum_month').on('click' , function () {
        clear_hum();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=720&view=day"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_hum = weather_data[0];

                hum_table.addRows(recent_hum);
                drawChart();
            })
    })
    $('#hum_year').on('click' , function () {
        clear_hum();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=8544&view=week"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_hum = weather_data[0];

                hum_table.addRows(recent_hum);
                drawChart();
            })
    })
    $('#temp_day').on('click' , function () {
        clear_temp();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?view=hour"
        })
            .done(function (response) {
                let weather_data = JSON.parse(response);
                let recent_temp = weather_data[1];

                temp_table.addRows(recent_temp);
                drawChart();
            })
    })

    $('#temp_week').on('click' , function () {
        clear_temp();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=168&view=day"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_temp = weather_data[1];

                temp_table.addRows(recent_temp);
                drawChart();
            })
    })
    $('#temp_month').on('click' , function () {
        clear_temp();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=720&view=day"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_temp = weather_data[1];

                temp_table.addRows(recent_temp);
                drawChart();
            })
    })
    $('#temp_year').on('click' , function () {
        clear_temp();

        $.ajax({
            method: "GET",
            url: "get_table_data.php?timespan=8544&view=week"
        })
            .done(function (response) {
                console.log(response);
                let weather_data = JSON.parse(response);
                let recent_temp = weather_data[1];

                temp_table.addRows(recent_temp);
                drawChart();
            })
    })
})