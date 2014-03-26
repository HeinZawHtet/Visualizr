(function() {
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var getAllData = $.ajax({
      url: "{{ url('visualizr/chart/') }}/"+Visualizr.chartId,
      dataType:"json",
      async: false
    }).responseText;

    var vslData = $.parseJSON(getAllData);

    var data = google.visualization.arrayToDataTable(vslData);

    var options = {
      "is3D": true,
      "isStacked" : true
    };

    var chartType = Visualizr.chartType;

    if ( chartType === 'pie') {
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    };

    if ( chartType === 'bar') {
       var chart = new google.visualization.BarChart(document.getElementById('piechart'));
    };

    if ( chartType === 'column') {
       var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
    };

    chart.draw(data, options);
  }
})();