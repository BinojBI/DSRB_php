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
<div class="student">
  <h2>Student Details</h2>
  <form action="createNewStudent.php" method="post">
    <input type="text" placeholder="First Name" name="firstName"><br>
    <input type="text" placeholder="Last Name" name="lastName"><br>
    <input type="text" placeholder="Reg NO" name="regNo"><br>
    <input type="text" placeholder="Email" name="email"><br>
    <input type="text" placeholder="User Name" name="userName"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <br>
    <input type="submit" name="submit" value="submit">
  </form>

</div>
