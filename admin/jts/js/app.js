$(function(){
      $.ajax({
        url: "http://localhost/SchoolSolutn/chart_data.php?f=testGraph",
        type: "GET",
        success : function(data) {
          chartData = data;
          var chartProperties = {
            "caption": "Students performance",
            "xAxisName": "Exam Type",
            "yAxisName": "Marks", 
            "rotatevalues": "1",
            "theme": "zune"
          };
          apiChart = new FusionCharts({
            type: "column2d",
            renderAt: "chart-container",
            width: "550",
            height: "350",
            dataFormat: "json",
            dataSource: {
              "chart": chartProperties,
              "data": chartData
            }
          });
          apiChart.render();
        }
      });
    });