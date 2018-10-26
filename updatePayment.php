<?php require 'cdn.php';
require 'db/connection.php';
?>
<?php
$studentName=$_POST['studentName'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update payments</title>
  </head>
  <body>
    <div class="container">
      <br>
      <h2>Update Payments</h2><br>
      <h5><?php echo $studentName ?>'s Payments</h5>
      <hr>
      <form action="updatePayment.php" method="post">
          <label>Registation Fee</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="registationFee">
        <br>
      <option selected>Choose...</option>
      <option >Not Paid</option>
      <option >Paid</option>
      </select><br><br>
      <label>Facility Fee</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="registationFee">
      <br>
      <option selected>Choose...</option>
      <option >Not Paid</option>
      <option >Paid</option>
      </select>
      </form>
    </div>

  </body>
</html>
