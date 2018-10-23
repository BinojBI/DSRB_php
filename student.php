<?php require 'header.php';
require 'db/connection.php';
?>
<?php
$query = "SELECT * FROM student";
$result_set = mysqli_query($connection,$query);
$numOfRow = mysqli_num_rows($result_set);
//echo $numOfRow;


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <a href="createNewStudent.php">Create new</a><br><br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Registation No</th>
      <th scope="col">Email</th>
      <th scope="col">User Name</th>
      <th scope="col">#</th>

    </tr>
  </thead>
  <tbody>
    <?php

    for ($i=1; $i<= $numOfRow ; $i++) {
      $record = mysqli_fetch_assoc($result_set);

      $id = $record['id'];
      $firstName = $record['firstName'];
      $lastName = $record['lastName'];
      $regNo = $record['regNo'];
      $email = $record['email'];
      $userName = $record['userName'];

    echo '<tr>
        <td>'. $id . '</td>
        <td>'. $firstName .'</td>
        <td>'. $lastName.'</td>
        <td>'.  $regNo .'</td>
        <td>'. $email .'</td>
        <td>'. $userName .'</td>
        <td><a href="editStudent.php">edit</a> | <a href="deleteStudent.php">delete</a> </td>
      </tr>';
    } ?>

  </tbody>
</table>
  </body>
</html>
