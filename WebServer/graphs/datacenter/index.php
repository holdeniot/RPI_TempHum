<html>
<head>

    <title>DataCentreTemp+Humid Chart</title>

    <!--Load the AJAX API-->
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

			
			var tempDataJS = [];
			var humDataJS = [];
			var timeDataJS = [];
			var max_temp = 25;
			var max_hum = 60;
			
			<?php
			
				include "/storage/ssd4/506/10170506/public_html/tmp.txt";
				include "settings.txt";
				
				
				$link = mysqli_connect('remotemysql.com', $var1, $var2);
				if (!$link) {
					die('Not connected : ' . mysqli_error($link));
				}
				// make foo the current db
				$db_selected = mysqli_select_db($link, $var3);
				if (!$db_selected) {
					die ('Can\'t use main table : ' . mysqli_error($link));
				}

				$results = mysqli_query($link , 'SELECT DateTime,Temp,Hum FROM `TempMonitoring` Where DevID = 1 AND Temp != 0.00 AND Hum != 0.00 ORDER BY DateTime DESC' );


				while($row = mysqli_fetch_array($results))
				{
					echo "timeDataJS.push(\"".$row['DateTime']."\");";
					echo "tempDataJS.push(".$row['Temp'].");";
					echo "humDataJS.push(".$row['Hum'].");";
				}
				
			?>
			
			max_temp = <?php echo $max_temp_threshold;?>;
			max_hum = <?php echo $max_hum_threshold;?>;
			
			//console.log(tempDataJS);
			
			var tempCombinedData = [];
			var humCombinedData = [];
			
			len = timeDataJS.length;
			for (var i = len-1; i >= 0; i--){
					lineDataJS = [timeDataJS[i], tempDataJS[i], max_temp];
					lineDataJSH = [timeDataJS[i], humDataJS[i], max_hum];
					tempCombinedData.push(lineDataJS);
					humCombinedData.push(lineDataJSH);
			}
			

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date Time');
            data.addColumn('number', 'Temperature (\u00B0C)');
			data.addColumn('number', '30min Alert Threshold');
			data.addRows(tempCombinedData);
            
			var dataH = new google.visualization.DataTable();
            dataH.addColumn('string', 'Date Time');
            dataH.addColumn('number', 'Humidity (RH%)');
			dataH.addColumn('number', '30min Alert Threshold');
			dataH.addRows(humCombinedData);

            // Set chart options
            var options = {'title':'Data Centre Temperature',
                'width':1500,
                'height':800,
                //'curveType':'function'
            };
			
			var optionsH = {'title':'Data Centre Humidity',
                'width':1500,
                'height':800,
                //'curveType':'function'
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.LineChart(document.getElementById('temp_chart'));
            var chartH = new google.visualization.LineChart(document.getElementById('hum_chart'));
            chart.draw(data, options);
            chartH.draw(dataH,optionsH);
        }
    </script>
</head>

<body>

<!-- Div that will display the pie chart -->
<div id='temp_chart'>This section holds the Temperature Graph - If you can see this, check the console!!</div>
<div id='hum_chart'>This section holds the Humidity Graph - If you can see this, check the console!!</div>

</body>
</html>
