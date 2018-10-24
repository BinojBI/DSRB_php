<?php require 'header.php';
require 'db/connection.php';
 ?>
 <?php
 $query = "SELECT * FROM marks";
 $result_set = mysqli_query($connection,$query);
 $numOfRow = mysqli_num_rows($result_set);
 //echo $numOfRow;

  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Marks Page</title>
   </head>
   <body>
<a href="createNewMarks.php">Create new</a><br><br>
<table class="table">
<thead>
<tr>
  <th scope="col">Id</th>
  <th scope="col">First Name</th>
  <th scope="col">Maths</th>
  <th scope="col">Chemistry</th>
  <th scope="col">Physics</th>
  <th scope="col">#</th>

</tr>
</thead>
<tbody>
<?php

for ($i=1; $i<= $numOfRow ; $i++) {
  $record = mysqli_fetch_assoc($result_set);

  $id = $record['id'];
  $studentName = $record['studentName'];
  $maths = $record['maths'];
  $chemistry = $record['chemistry'];
  $physics = $record['physics'];


echo '<tr>
    <td>'. $id . '</td>
    <td>'. $studentName .'</td>
    <td>'. $maths.'</td>
    <td>'.  $chemistry .'</td>
    <td>'. $physics .'</td>
    <td><a href="editMarks.php">edit</a> | <a href="deleteMarks.php">delete</a> </td>
  </tr>';
} ?>

</tbody>
</table>
   </body>
 </html>
