<?php

    include "/storage/ssd4/506/10170506/public_html/tmp.txt";

	
	date_default_timezone_set ( "Australia/Melbourne" );
	
	//$link = mysqli_connect('remotemysql.com', 'TPQb6ufCgI', 'u3hlztw0Dc');
	//$link = mysqli_connect('remotemysql.com', 'TPQb6ufCgI', 'u3hlztw0Dc');
	$link = mysqli_connect('remotemysql.com', $var1, $var2);
	
	
    if (!$link) {
        die('Not connected : ' . mysqli_error($link));
    }
    // make foo the current db
    $db_selected = mysqli_select_db($link, $var3);
    if (!$db_selected) {
        die ('Can\'t use main table : ' . mysqli_error($link));
    }


    mysqli_query($link,"INSERT INTO TempMonitoring (DevID, DateTime, Date, Time, Temp, Hum) VALUES ("."1,\"".Date("Y-m-d H:i:s")."\",\"".Date("Y-m-d")."\",\"".Date("H:i:s")."\",".$_GET["temp"].",".$_GET["hum"].")");
	//echo ("INSERT INTO TempMonitoring (GUID, DateTime, Date, Time, Temp, Hum) VALUES ("."0,\"".Date("Y-m-d H:i:s")."\",\"".Date("Y-m-d")."\",\"".Date("H:i:s")."\",".$_GET["temp"].",".$_GET["hum"].")");



    $results = mysqli_query($link , 'SELECT * FROM TempMonitoring' );

    echo "<table border='2'>
    <tr>
    <th>Date & Time</th>
    <th>Device ID</th>
    <th>Temperature</th>
    <th>Humidity</th>
    </tr>";

while($row = mysqli_fetch_array($results))
{
echo "<tr>";
echo "<td>" . $row['DateTime'] . "</td>";
echo "<td>" . $row['DevID'] . "</td>";
echo "<td>" . $row['Temp'] . "</td>";
echo "<td>" . $row['Hum'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($link);

?>

<p>
Something is wrong with the XAMPP installation :-()
Username: zDFNi4fKBG 
Database: zDFNi4fKBG 
Password: YDE2Ol1Jz5 
Server: remotemysql.com 
Port: 3306
</p>
<a href="https://hypertensive-windla.000webhostapp.com/main/landing.html">Click Me!</a>
<p>A3DSrXgXu&OdDUwOLI2A</p>

