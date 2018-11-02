<?php require 'db/connection.php';
require 'cdn.php';
?>
<?php
$id=$_POST['id'];
echo $id;
$queryS = "SELECT * FROM marks WHERE id='$id'";
$result_set = mysqli_query($connection,$queryS);
$record = mysqli_fetch_assoc($result_set);

$studentName = $record['studentName'];
$maths = $record['maths'];
$chemistry = $record['chemistry'];
$physics = $record['physics'];
$total = $record['total'];

if(isset($_POST['submit'])){
  $ids=$_POST['ids'];
  echo $ids;
  $studentName = $record['studentName'];
  $maths = $record['maths'];
  $chemistry = $record['chemistry'];
  $physics = $record['physics'];
  $total = $record['total'];
echo $maths;

  $registationFee = '';
  $facilityFee = '';

$queryU = "UPDATE marks SET maths='$maths',chemistry='$chemistry',physics='$physics',total='$total' WHERE id='$ids'";
$result = mysqli_query($connection, $queryU);


if($result){
// echo "<script> location.href='marks.php'; </script>";
 echo "1 record updated Marks";
  echo mysqli_error($connection);

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
    <title>Edit Marks</title>
  </head>
  <body>
    <div class="container-fluid" style="padding-right:1100px;">
      <br>
      <h2>Marks Details</h2><br>
      <form action="editMarks.php" method="post">

        <label>Student Name : <?php echo $studentName; ?></label>
        <input type="text" class="form-control" placeholder="Maths" name="maths" value="<?php echo "$maths"; ?>"><br>
        <input type="text" class="form-control" placeholder="Chemistry" name="chemistry" value="<?php echo "$chemistry"; ?>"><br>
        <input type="text" class="form-control" placeholder="Physics" name="physics" value="<?php echo "$physics";?>"><br>
        <br>
        <input type="hidden" value="<?php echo $id; ?>" name="ids">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
