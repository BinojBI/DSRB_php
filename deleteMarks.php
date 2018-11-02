<?php require 'db/connection.php';
require 'cdn.php';?>

<?php
if(!isset($_POST['submit'])){
  $id=$_POST['id'];
  //echo $id;
  $queryS = "SELECT * FROM marks WHERE id='$id'";
  $result_set = mysqli_query($connection,$queryS);
  $record = mysqli_fetch_assoc($result_set);

  $studentName = $record['studentName'];
  $maths = $record['maths'];
  $chemistry = $record['chemistry'];
  $physics = $record['physics'];
  $total = $record['total'];

}else{
  $id = $_POST['id'];
   $ids=$_POST['ids'];
 echo $ids;
$queryD = "DELETE FROM marks WHERE id='$ids' LIMIT 1";
$resultD = mysqli_query($connection, $queryD);

if($resultD){
 echo "<script> location.href='marks.php'; </script>";
         exit;
echo "1 record deleted";
}else{
echo "databse query failed";
echo mysqli_error($connection);
}
}
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Marks</title>
  </head>
  <body>
    <div class="container">
      <br>
      <h2>Student Details</h2><br>
      <form action="deleteMarks.php" method="post">
        <label>Student Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$studentName"; ?></label><br>
        <label>Maths  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$maths"; ?></label><br>
        <label>Chemistry : <?php echo "$chemistry"; ?></label><br>
        <label>Physics &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$physics"; ?></label><br>


        <br>
          <input type="hidden" value="<?php echo $id; ?>" name="ids">
        <input type="submit" class="btn btn-primary" name="submit" value="Delete">

      </form>
    </div>
  </body>
</html>
