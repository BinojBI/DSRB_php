<?php require 'header.php';
require 'db/connection.php';
?>
<?php
$query = "SELECT * FROM payments";
$result_set = mysqli_query($connection,$query);
$numOfRow = mysqli_num_rows($result_set);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payments page</title>
  </head>
  <body>
      <div class="container">
        <table class="table">
      <thead>
        <tr>

          <th scope="col">Student Name</th>
          <th scope="col">Registation No</th>
          <th scope="col">Registation Fee</th>
          <th scope="col">Facility Fees</th>


        </tr>
      </thead>
      <tbody>
        <?php

        for ($i=1; $i<= $numOfRow ; $i++) {
          $record = mysqli_fetch_assoc($result_set);

          $id = $record['id'];
          $studentName = $record['studentName'];
          $regNo = $record['regNo'];
          $registationFee = $record['registationFee'];
          $facilityFee = $record['facilityFee'];

        echo '<tr>
            <td>'. $studentName.'</td>
            <td>'. $regNo .'</td>
            <td>'. $registationFee .'</td>
            <td>'. $facilityFee .'</td>

            <td>  <form action="updatePayment.php" method="post">
                <button type="submit" class="btn btn-link">Update</button>
                <input type="hidden" value="'.$studentName.'" name="studentName">
                <input type="hidden" value="'.$regNo.'" name="regNo">
              </form></td>
          </tr>';
        } ?>

      </tbody>
    </table>

      </div>

  </body>
</html>
