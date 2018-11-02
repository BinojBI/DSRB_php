<?php require 'cdn.php';
require 'db/connection.php';
 ?>
<?php
 if(isset($_POST['submit'])){

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $regNo = $_POST['regNo'];
   $email = $_POST['email'];
   $userName = $_POST['userName'];
   $password = $_POST['password'];

   $studentName = $firstName.' '.$lastName;
   $registationFee = '';
   $facilityFee = '';

   $query = "INSERT INTO student(firstName,lastName,regNo,email,userName,password) VALUES ('{$firstName}','{$lastName}','{$regNo}','{$email}','{$userName}','{$password}')";
   $result = mysqli_query($connection, $query);

   $queryP = "INSERT INTO payments(studentName,regNo,registationFee,facilityFee) VALUES ('{$studentName}','{$regNo}','{$registationFee}','{$facilityFee}')";
   $resultP = mysqli_query($connection, $queryP);

   if($result){
     echo "<script> location.href='student.php'; </script>";
     echo "1 record added";
   }else{
     echo "databse query failed";
   }

   if($resultP){
     echo "1 record added";
   }else{
     echo "databse query failed";
   }
 }
 ?>
<h2></h2>
<div class="container-fluid student" style="padding-right:1100px;"><br>
  <h2>Student Details</h2><br>
  <form action="createNewStudent.php" method="post">
    <input type="text" class="form-control" placeholder="First Name" name="firstName"><br>
    <input type="text" class="form-control" placeholder="Last Name" name="lastName"><br>
    <input type="text" class="form-control" placeholder="Reg NO" name="regNo"><br>
    <input type="email" class="form-control" placeholder="Email" name="email"><br>
    <input type="text" class="form-control" placeholder="User Name" name="userName"><br>
    <input type="password" class="form-control" name="password" placeholder="Password"><br>
    <br>
    <input type="submit" class="btn btn-primary" name="submit" value="submit">
  </form>

</div>
