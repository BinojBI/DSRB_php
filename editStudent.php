<?php require 'db/connection.php';
require 'cdn.php';
?>
<?php
$id=$_POST['id'];
//echo $id;
$queryS = "SELECT * FROM student WHERE id='$id'";
$result_set = mysqli_query($connection,$queryS);
$record = mysqli_fetch_assoc($result_set);

$firstName = $record['firstName'];
$lastName = $record['lastName'];
$regNo = $record['regNo'];
$email = $record['email'];
$userName = $record['userName'];
$password = $record['password'];

 if(isset($_POST['submit'])){
   $ids=$_POST['ids'];

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $regNo = $_POST['regNo'];
   $email = $_POST['email'];
   $userName = $_POST['userName'];
   $password = $_POST['password'];

   $studentName = $firstName.' '.$lastName;
   $registationFee = '';
   $facilityFee = '';
$queryU = "UPDATE student SET firstName='$firstName',lastName='$lastName',regNo='$regNo',email='$email', userName='$userName', password='$password' WHERE id='$ids'";
$result = mysqli_query($connection, $queryU);

$queryP = "UPDATE payments SET studentName='$studentName',regNo='$regNo' WHERE regNo='$regNo'";
$resultP = mysqli_query($connection, $queryP);

if($result){
  echo "<script> location.href='student.php'; </script>";
  echo "1 record updated students";
}else{
  echo "databse query failed";
  echo mysqli_error($connection);
}

if($resultP){
  echo "1 record updated payments";
}else{
  echo "databse query failed";
}
  $connection->close();
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit student details</title>
  </head>
  <body>
    <div class="container-fluid" style="padding-right:1100px;">
      <br>
      <h2>Student Details</h2><br>
      <form action="editStudent.php" method="post">

        <input type="text" class="form-control" placeholder="First Name" name="firstName" value="<?php echo "$firstName"; ?>"><br>
        <input type="text" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo "$lastName"; ?>"><br>
        <input type="text" class="form-control" style="background-color:rgb(210, 208, 208)" placeholder="Reg NO" name="regNo" value="<?php echo "$regNo"; ?>" readonly> <i>(You cannot edit this field)</i><br>
        <input type="text" type="email" class="form-control" placeholder="Email" name="email" value="<?php echo "$email"; ?>"><br>
        <input type="text" class="form-control" placeholder="User Name" name="userName" value="<?php echo "$userName";?>"><br>
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo "$password";?>"><br>
        <br>
        <input type="hidden" value="<?php echo $id; ?>" name="ids">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
      </form>
    </div>

  </body>
</html>
