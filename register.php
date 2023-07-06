<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $select_users = $con->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if($select_users->num_rows > 0){
      $message[] = 'Email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         // Close the SELECT statement before preparing the INSERT statement
         $select_users->close();

         $insert_user = $con->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         if($insert_user){
            $fetch_user = $con->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
            $fetch_user->execute([$email, $cpass]);
            $result = $fetch_user->get_result();
            $row = $result->fetch_assoc();
            if($result->num_rows > 0){
               // 60*60*24 = 86400 seconds which is equals to 1 day;
               // to set cookies for 1 month use 60*60*24*30
               setcookie('user_id', $row['id'], time() + 60*60*24, '/');
               header('location:admin.php');
            }
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>Register</h3>
      <input type="text" required maxlength="20" placeholder="enter your username" class="box" name="name">
      <input type="email" required maxlength="50" placeholder="enter your email" class="box" name="email">
      <input type="password" required maxlength="50" placeholder="enter your password" class="box" name="pass">
      <input type="password" required maxlength="50" placeholder="confirm your password" class="box" name="cpass">
      <input type="submit" value="register now" name="submit" class="btn">
      <p>Already Have An Account? <a href="login.php">Login</a></p>
   </form>

</section>

<!-- register section ends -->
   
</body>
</html>
