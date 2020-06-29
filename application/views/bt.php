 <?php
 
$limit = 10;
$y = 98;
$dataPoints = array();

for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10)-5; 

  $time = (time() + 120*$i )*1000;

  array_push($dataPoints, array("x" => $time, "y" => $y));
}

?>

 <div class="chart">
  <script src="../assets/demo/demo.js"></script>
  <div id="chartContainer" style="height: 400px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></div>
 
 <script>
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Body Temperature"
  },
  axisY: {
    title: "Temperature (°F)"
  },
   axisX: {
    title: "Time"
  },
  data: [{
    type: "column",
    name: "Body temperature",
    indexLabel: "{y}",
  
    color: "#008080",
    xValueType: "dateTime",
    xValueFormatString: "DD MMM YYYY hh:mm:ss TT",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();


</script>

<style type="text/css">
  .chart{
    margin-top:100px;
    margin-left: 50px;
  }

</style>