<?php
require 'cdn.php';
 ?>
 <?php


 if (isset($_POST['submit'])) {
   $username = $_POST['userName'];
   $password = $_POST['password'];

   if ($userName=="binoj"&&$password=="asd") {
     session_start();
   $_SESSION['susername'] = $username;
   $_SESSION['spassword'] = $password;
   }
 }

  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <!-- Button trigger modal -->
     <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
       Launch demo modal
     </button> -->

     <!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title text-center" id="exampleModalLabel">Admin Login</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">

             <div class="login-form">
             <div class="main-div">
                 <div class="panel">

                <p>Please enter your email and password</p>
                </div>
                 <form id="Login" action="login.php" method="post">

                     <div class="form-group">
                         <input type="email" class="form-control" name="userName" id="inputEmail" placeholder="Email Address">
                     </div>

                     <div class="form-group">
                         <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                     </div>
                     <div class="forgot">
                     </div>
                 </div>
             </div>
           </div>
           <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
           </div>
                </form>
         </div>
       </div>
     </div>
     <!-- JS code -->
     <script src="https://code.jquery.com/jquery-3.1.1.min.js">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
     </script>
     <!--JS below-->


     <!--modal-->
     <script>
       $(document).ready(function() {
         $("#myModal").modal();
       });
     </script>
   </body>
 </html>
