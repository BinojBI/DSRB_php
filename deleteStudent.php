<?php require 'db/connection.php';
require 'cdn.php';?>
<?php


 if(!isset($_POST['submit'])){
   $id=$_POST['id'];
   //echo $id;
   $queryS = "SELECT * FROM student WHERE id='$id'";
   $result_set = mysqli_query($connection,$queryS);
   $record = mysqli_fetch_assoc($result_set);

   $id = $record['id'];
   $firstName = $record['firstName'];
   $lastName = $record['lastName'];
   $regNo = $record['regNo'];
   $email = $record['email'];
   $userName = $record['userName'];
   $password = $record['password'];

}else{
  //$id = $_POST['id'];
    $ids=$_POST['ids'];
  echo $ids;
$queryD = "DELETE FROM student WHERE id='$ids' LIMIT 1";
$resultD = mysqli_query($connection, $queryD);

if($resultD){
  echo "<script> location.href='student.php'; </script>";
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
    <title>Delete student details</title>

  </head>
  <body>
    <h2>Student Details</h2>
    <form action="deleteStudent.php" method="post">
      <label>First Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$firstName"; ?></label><br>
      <label>Last Name  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$lastName"; ?></label><br>
      <label>Registation No : <?php echo "$regNo"; ?></label><br>
      <label>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$email"; ?></label><br>
      <label>User Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo "$userName"; ?></label><br>

      <br>
        <input type="hidden" value="<?php echo $id; ?>" name="ids">
      <input type="submit" name="submit" value="submit">

    </form>
  </body>
</html>
