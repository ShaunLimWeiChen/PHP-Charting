<?php
include("fusioncharts/fusioncharts.php");
$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "";  // MySQL password
$namedb = "test";  // MySQL database name
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>

<html>
   <head>
      <title>Booking Charts</title>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
   </head>
   <body>

<?php

  $strQuery = "SELECT r.*, b.* from roomrate r INNER JOIN booking b ON r.monthyear = b.monthyear";
 	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

	$arrData = array(
        "chart" => array(
        	  "caption"=> "Hotel booking room rates",
            "xAxisname"=> "Time",
            "yAxisName"=> "Room Rates ($)",
            "numberPrefix"=> "",
            "plotFillAlpha"=> "80",
        	  "showValues"=> "1",
        	  "placeValuesInside"=> "1",
        	  "usePlotGradientColor"=> "0",
        	  "rotateValues"=> "1",
        	  "valueFontColor"=> "#FFFFFF",
        	  "showHoverEffect"=> "1",
        	  "labelDisplay"=>"ROTATE",
              "slantLabels"=>"1",
            "rotateValues"=> "1",
            "xAxisLineThickness"=> "1",
            "xAxisLineColor"=> "#999999",
            "showAlternateHGridColor"=> "0",
            "legendBgAlpha"=> "0",
            "legendBorderAlpha"=> "0",
            "legendShadow"=> "0",
            "yAxisMaxValue"=> "100",
            "yAxisMinValue "=> "30",
            "legendItemFontSize"=> "10",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
          	)
         	);
        	// creating array for categories object

        	$categoryArray=array();
        	$dataseries1=array();
        	$dataseries2=array();
          $dataseries3=array();

          // pushing category array values
        	while($row = mysqli_fetch_array($result)) {
				    array_push($categoryArray, array(
					  "label" => $row["monthyear"]
					)
				);
				array_push($dataseries1, array(
					"value" => $row["rooms"]
					)
				);

				array_push($dataseries2, array(
					"value" => $row["rate"]
					)
				);

    	}

    	$arrData["categories"]=array(array("category"=>$categoryArray));
			// creating dataset object
			$arrData["dataset"] = array(array("seriesName"=> "Available Rooms", "data"=>$dataseries1), array("seriesName"=> "Room rates",  "renderAs"=>"line", "data"=>$dataseries2));



      $jsonEncodedData = json_encode($arrData);

			// chart object
      $msChart = new FusionCharts("MSLine", "chart1" , "100%", "400", "chart-container", "json", $jsonEncodedData);

      $msChart->render();

      // closing db connection
      $dbhandle->close();

   }

?>

<center>
 <div id="chart-container">Chart will render here!</div></center>
   </body>
</html>
