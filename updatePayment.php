<?php require 'cdn.php';
require 'db/connection.php';
?>
<?php
$studentName=$_POST['studentName'];
$regNo=$_POST['regNo'];
//echo $regNo;

$queryS = "SELECT * FROM payments WHERE studentName='$studentName'";
$result_setS = mysqli_query($connection,$queryS);
$record = mysqli_fetch_assoc($result_setS);

$registationFee = $record['registationFee'];
$facilityFee = $record['facilityFee'];

if(isset($_POST['submit'])){
  $regNo = $_POST['regNo'];

  $registationFee = $_POST['registationFee'];
  $facilityFee = $_POST['facilityFee'];

  echo $registationFee;
  echo $facilityFee;

$queryU = "UPDATE payments SET registationFee='$registationFee',facilityFee='$facilityFee' WHERE regNo='$regNo'";
$resultU = mysqli_query($connection, $queryU);


if($resultU){
    echo "<script> location.href='payments.php'; </script>";
  echo "1 record updated payments";
}else{
  echo "databse query failed";
    echo mysqli_error($connection);
}
$connection->close();
}



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
      <h5><?php echo $studentName ?>'s Payments</h5><h5>(<?php echo $regNo ?>)</h5>
      <hr>
      <form action="updatePayment.php" method="post">
          <label>Registation Fee</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="registationFee">
        <br>
      <option  <?php if($registationFee==""){ echo "selected"; } ?>>Choose...</option>
      <option <?php if($registationFee=="Not Paid"){ echo "selected"; } ?>>Not Paid</option>
      <option  <?php if($registationFee=="Paid"){ echo "selected"; } ?> >Paid</option>
      </select><br><br>
      <label>Facility Fee</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="facilityFee">
      <br>
      <option  <?php if($facilityFee==""){ echo "selected"; } ?>>Choose...</option>
      <option <?php if($facilityFee=="Not Paid"){ echo "selected"; } ?>>Not Paid</option>
      <option <?php if($facilityFee=="Paid"){ echo "selected"; } ?>>Paid</option>
    </select><br>
      <input type="hidden" value="<?php echo $regNo; ?>" name="regNo"><br>
      <input type="submit" class="btn btn-primary" name="submit" value="Update">
      </form>
    </div>

  </body>
</html>
