<?php
//We have included FusionCharts_Gen.php, which contains FusionCharts PHP Class
//to help us easily embed the charts.
include("FusionCharts_Evaluation/Code/PHPClass/BasicExample/FusionCharts_Gen.php");
?>
  <HTML>
     <HEAD>
         <TITLE>FusionCharts XT - Simple Line Chart</TITLE>  
          <?php
             //You need to include the following JS file, if you intend to embed the chart using JavaScript.
             //Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
             //When you make your own charts, make sure that the path to this JS file is correct. 
             //Else, you will get JavaScript errors.
          ?> 
         <SCRIPT LANGUAGE="Javascript" SRC="FusionCharts_Evaluation/Charts/FusionCharts.js"></SCRIPT> 
     </HEAD>

     <BODY>

         <?php
            //This page demonstrates the ease of generating charts using FusionCharts PHP Class.
            //For this chart, we have created a chart object used FusionCharts PHP Class
            //supply chart data and configurations to it and render chart using the instance

            //Here, we have kept this example very simple.

            # Create object for Column 3D chart
            $FC = new FusionCharts("Line","600","300");

            # Setting Relative Path of chart SWF file.
            $FC->setSwfPath("FusionCharts/FusionCharts/");

            # Define chart attributes
            $strParam="caption=Monthly Unit Sales;xAxisName=Month;yAxisName=Units";

            # Set chart attributes
            $FC->setChartParams($strParam);

            # Add chart data along with category names 
            $FC->addChartData("462","label=Jan");
            $FC->addChartData("857","label=Feb");
            $FC->addChartData("671","label=Mar");
            $FC->addChartData("494","label=Apr");
            $FC->addChartData("761","label=May");
            $FC->addChartData("960","label=Jun");
            $FC->addChartData("629","label=Jul");
            $FC->addChartData("622","label=Aug");
            $FC->addChartData("376","label=Sep");
            $FC->addChartData("494","label=Oct");
            $FC->addChartData("761","label=Nov");
            $FC->addChartData("960","label=Dec");


            # Render chart 
            $FC->renderChart();

         ?>

     </BODY>
  </HTML>
