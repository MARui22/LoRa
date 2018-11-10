<?php include 'formatted_data.php'; ?>
<script type="text/javascript">
  var tempColor, hygroColor, options, chart, data;
  
  function updateColor(){
          tempColor = document.getElementById("tempColor").style.backgroundColor;
          hygroColor = document.getElementById("hygroColor").style.backgroundColor;
          options.series = {                            
                            0: { color: tempColor, areaOpacity:1 }, //temp
                            1: { color: hygroColor, areaOpacity:1 }, //hygro
           };
        chart.draw(data, options);
        }
  
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Température');
        data.addColumn('number', 'Hygrométrie');
        data.addRows([ <?php echo getData(); ?> ]);
        
        tempColor = document.getElementById("tempColor").style.backgroundColor;
        hygroColor = document.getElementById("hygroColor").style.backgroundColor;
        
        
        
        options = {'title':"LoRa module 1",
                       'width':screen.width,
                       'height':500,
                       isStacked: true,
                       tooltip: { trigger: 'visible' },
                       'backgroundColor': {
                           'fill': '#FFFFFF',
                           'fillOpacity': 0.0,
                        },
                        series: {                            
                            0: { color: tempColor, areaOpacity:1 }, //temp
                            1: { color: hygroColor, areaOpacity:1 }, //hygro
                          },
                       titleTextStyle: {color: 'white'},
                        hAxis: {textStyle: {color: 'white'},
                            titleTextStyle: {color: 'white'}},
                        vAxis: {textStyle: {color: 'white'},titleTextStyle: {color: 'white'},gridlines: {color: 'transparent'}},
                       legend: {textStyle: {color: 'white'}}
                      };

        chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        
        var Area = document.getElementById('ar');
        Area.onclick = function () {
         chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        var Line = document.getElementById('li');
        Line.onclick = function () {
         chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        var Stepped = document.getElementById('st');
        Stepped.onclick = function () {
         chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));
         updateColor();
          chart.draw(data, options);
        }
        /*
        var an = document.getElementById("colorpicker");
        an.onpointerout = function () {
         updateColor();
        }
        */
        var previous = "";
        setInterval(function() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 2) {
                if (ajax.getResponseHeader("Last-Modified") != previous) {
                     if(previous!=""){
                      data = new google.visualization.DataTable();
                      data.addColumn('string', 'Date');
                      data.addColumn('number', 'Température');
                      data.addColumn('number', 'Hygrométrie');
                      $.ajax({
                      url : 'data_update.php',
                      datatype : 'text',
                      success : function(response){
                      data.addRows(JSON.parse(response));
                        
                      

                        
                        
                      chart.draw(data, options);
                  }});}
                  previous = ajax.getResponseHeader("Last-Modified");
                }
            }
        };
        ajax.open("HEAD", "/restricted/log_temp.csv", true);
        ajax.send();
    }, 1000); 
      }
    </script>