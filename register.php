<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   // For SELECT
   $select_users = $con->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->bind_param("s", $email); // 's' specifies the variable type => 'string'
   $select_users->execute();
   $select_users->store_result(); // Store result to get num_rows

   if($select_users->num_rows > 0){
      $message[] = 'Email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirm password not matched!';
      }else{
         // Close the SELECT statement before preparing the INSERT statement
         $select_users->close();

         $insert_user = $con->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->bind_param("sss", $name, $email, $cpass); // 'sss' means three strings
         $insert_success = $insert_user->execute(); // Execute and check if successful

         if($insert_success){
            $fetch_user = $con->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
            $fetch_user->bind_param("ss", $email, $cpass);
            $fetch_user->execute();
            $result = $fetch_user->get_result(); // Correct way to get the result

            if($result && $result->num_rows > 0){ // Check if $result is not false and has rows
                $row = $result->fetch_assoc();
                // 60*60*24 = 86400 seconds which is equals to 1 day;
                // to set cookies for 1 month use 60*60*24*30
                setcookie('user_id', $row['id'], time() + 86400, '/');
                header('location:admin.php');
                exit(); // Make sure to terminate the script
            }
         } else {
             $message[] = 'Error registering user.';
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
