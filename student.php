<?php

require 'db/connection.php';
session_start();
if (isset($_SESSION['susername'])){
require 'header.php';

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
  <link rel="stylesheet" href="CSS/student.css">
  </head>
  <body>
    <div class="container">
      <br>
      <h2>Students</h2><br>
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

          <td><form  action="editStudent.php" method="post">
            <button type="submit" class="btn btn-link">Edit</button>
            <input type="hidden" value="'.$id.'" name="id">
          </form>
          </td>
          <td>
          <form  action="deleteStudent.php" method="post">
            <button type="submit" class="btn btn-link">Delete</button>
            <input type="hidden" value="'.$id.'" name="id">
          </form></td>

        </tr>';
      } ?>

      </tbody>
      </table>
    </div>

  </body>

</html>
<?php
}else {
  echo "<script> location.href='index.php'; </script>";
  //echo "password not entered";

}
 ?>
