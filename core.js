google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


$(window).on('load', function () {
    $('#hum_day').on('click' , function () {
        $.ajax({
            method: "GET",
            url: "get_table_data.php"
        })
            .done(function (response) {
                hum_table.removeRows(0, 12);
            })
    })
})

drawChart();