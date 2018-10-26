<?php
require 'db/connection.php';
require 'cdn.php';
 ?>
<?php
$id=$_POST['id'];
$place=$_POST['place'];
$maxAverage=$_POST['maxAverage'];
// echo "".$_POST['id'];

$query = "SELECT * FROM `marks` WHERE `id` = '$id'";

  $result_set = mysqli_query($connection,$query);
  $record = mysqli_fetch_assoc($result_set);

  $studentName = $record['studentName'];
  $maths =  $record['maths'];
  $chemistry = $record['chemistry'];
  $physics = $record['physics'];

//get details of student
  $queryS = "SELECT * FROM `student` WHERE `firstname` = '$studentName'";
  $result_setS = mysqli_query($connection,$queryS);
  $recordS = mysqli_fetch_assoc($result_setS);

  $id = $recordS['id'];
  $firstName = $recordS['firstName'];
  $lastName = $recordS['lastName'];
  $regNo = $recordS['regNo'];
  $email = $recordS['email'];
  $userName = $recordS['userName'];

  $total = $maths + $chemistry + $physics;
  $average = number_format((float)$total/3,2,'.','');

  $studentPart = number_format((float)($average/($maxAverage+$average))*100,2,'.','');
  $bestStudentPart = ($maxAverage/($maxAverage+$average))*100;
  $bestStudentPartTwoDecimal = number_format((float)$bestStudentPart,2,'.','');

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <br>
    <title>Student Statistics</title>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </head>
  <body>
<h2 class="text-center"><?php echo $studentName; ?>'s Statistics</h2><br>
<div class="container">
<div class="row">
<div class="col-sm-6">
Details
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><?php echo $studentName; ?>'s</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Full Name</td>
      <td><?php echo $firstName.' '.$lastName; ?></td>
    </tr>
    <tr>
      <td>Registation No</td>
      <td><?php echo $regNo; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $email ?></td>
    </tr>
    <tr>
      <td>User Name</td>
      <td><?php echo $userName ?></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Statistics</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Maths</td>
      <td><?php echo $maths; ?></td>
    </tr>
    <tr>
      <td>Chemistry</td>
      <td><?php echo $chemistry; ?></td>
    </tr>
    <tr>
      <td>Physics</td>
      <td><?php echo $physics; ?></td>
    </tr>
    <tr>
      <td><b>Total</b></td>
      <td><b><?php echo $total; ?></b></td>
    </tr>
    <tr>
      <td>Average</td>
      <td><?php echo $average; ?></td>
    </tr>
    <tr>
      <td><b>Place</b></td>
      <td><b><?php echo $place; ?></b></td>
    </tr>
  </tbody>
</table>
</div>
<div class="col-sm-2"></div>
<div class="col-sm-4">
  Grid view
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Analysis</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Best Student Average</td>
        <td><?php echo $maxAverage; ?></td>
      </tr>

    </tbody>
  </table>
  <br>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
</div>
</div>
<script type="text/javascript">

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Student Analysis"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
			{ y: <?php echo $bestStudentPartTwoDecimal; ?>, name: "Best Student Average", exploded: true },
			{ y: <?php echo $studentPart; ?>, name: "<?php echo $studentName; ?>'s Average" },

		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
</script>
  </body>
</html>
