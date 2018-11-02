<?php require 'cdn.php';
require 'db/connection.php';
 ?>
 <?php
 //get student details
  //$query = "SELECT firstName FROM student EXCEPT SELECT studentName FROM marks";
 $query = "SELECT firstName,lastName FROM student";
 $result_set = mysqli_query($connection,$query);
 $numOfRow = mysqli_num_rows($result_set);


//check $query get marks table
//$queryMsrkSelect = "SELECT studentName FROM marks";
// $result_setqms = mysqli_query($connection,$queryMsrkSelect);
// $numOfRow = mysqli_num_rows($result_setqms);


   //insert new marks
 if(isset($_POST['submit'])){
   $studentName = $_POST['studentName'];
   $maths = $_POST['maths'];
   $chemistry = $_POST['chemistry'];
   $physics = $_POST['physics'];
   $total = $maths + $physics + $chemistry;
   $queryPost = "INSERT INTO marks(studentName,maths,chemistry,physics,total) VALUES ('{$studentName}',{$maths},{$chemistry},{$physics},{$total})";
   $result = mysqli_query($connection, $queryPost);

   if($result){
     echo "<script> location.href='marks.php'; </script>";
     echo "1 record added";
   }else{
     echo "databse query failed";
    echo (mysqli_error($connection));
   }
 }
  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Add marks</title>
   </head>
   <body>
     <div class="container-fluid" style="padding-right:1100px;"><br>
       <h2>Add marks</h2><br>
       <form action="createNewMarks.php" method="post">
         <label class="mr-sm-2" for="inlineFormCustomSelect">Student</label>

         <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="studentName">
             <?php
             echo '<option selected>Choose...</option>';
             for ($i=1; $i<= $numOfRow ; $i++) {
               $record = mysqli_fetch_assoc($result_set);

               $id = $record['id'];
               $firstName = $record['firstName'];
               $lastName = $record['lastName'];

               echo '
               <option value="'.$firstName.'">'.$firstName .' '. $lastName.'</option>';
             }
              ?>
            </select><br><br>
              <input type="text" class="form-control" placeholder="Maths" name="maths"><br>
              <input type="text" class="form-control" placeholder="Chemistry" name="chemistry"><br>
              <input type="text" class="form-control" placeholder="Physics" name="physics"><br>

              <input type="submit" class="btn btn-primary" name="submit" value="submit">


       </form>

     </div>

   </body>
 </html>
