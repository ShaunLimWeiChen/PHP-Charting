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

            $FC = new FusionCharts("MSLine","600","300");

            # Setting Relative Path of chart SWF file.
            $FC->setSwfPath("FusionCharts/FusionCharts/");

            #  Store chart attributes in a variable 
            $strParam="caption=Weekly Sales;subcaption=Comparison;xAxisName=Week;yAxisName=Revenue;numberPrefix=$;decimalPrecision=0";
            # Set chart attributes 
            $FC->setChartParams($strParam);
            # Add category names
            $FC->addCategory("Week 1");
            $FC->addCategory("Week 2");
            $FC->addCategory("Week 3");
            $FC->addCategory("Week 4");
            # Create a new dataset 
            $FC->addDataset("This Month"); 
            # Add chart values for the above dataset
            $FC->addChartData("40800");
            $FC->addChartData("31400");
            $FC->addChartData("26700");
            $FC->addChartData("54400");
            # Create second dataset 
            $FC->addDataset("Previous Month"); 
            # Add chart values for the second dataset
            $FC->addChartData("38300");
            $FC->addChartData("28400");
            $FC->addChartData("15700");
            $FC->addChartData("48100");

            # Render chart 
            $FC->renderChart();

         ?>


     </BODY>
  </HTML>