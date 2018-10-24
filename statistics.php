<?php require 'header.php';
require 'db/connection.php';?>
<?php
$query = "SELECT * FROM marks ORDER BY total DESC";
$result_set = mysqli_query($connection,$query);
$numOfRow = mysqli_num_rows($result_set);
//echo $numOfRow;
$maxAverage = 0;

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table class="table">
   <thead>
     <tr>
       <th></th>
       <th scope="col">Student Name</th>
       <th scope="col">Total</th>
       <th scope="col">Average</th>
       <th scope="col">Average of First</th>
       <th scope="col">Place</th>
     </tr>
   </thead>
   <tbody>

<?php for ($i=1; $i <= $numOfRow; $i++) {

  $record = mysqli_fetch_assoc($result_set);

  $id = $record['id'];
  $studentName = $record['studentName'];

  $maths = $record['maths'];
  $chemistry = $record['chemistry'];
  $physics = $record['physics'];
  $total = $record['total'];

  $total = $maths + $chemistry + $physics;
  $average = number_format((float)$total/3,2,'.',''); //3 is number of subjects
  //find best average;


  if($maxAverage<$average){
    $maxAverage = $average;
  }

  echo '<tr>
      <td></td>
      <td>'. $studentName . '</td>
      <td>'. $total .'</td>
      <td>'. $average.'</td>
      <td>'.  $maxAverage .'</td>
      <td>'.  $i .'</td>
    <td>  <form action="markDetails.php" method="post">
        <button type="submit" class="btn btn-link">Details</button>
        <input type="hidden" value="'.$id.'" name="id">
        <input type="hidden" value="'.$i.'" name="place">
        <input type="hidden" value="'.$maxAverage.'" name="maxAverage">

      </form>
        </td>
    </tr>';

} ?>

</tbody>
</table>
   </body>
 </html>
