<?php
include 'connect.php';

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $select_users = $con->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_users->bind_param('ss', $email, $pass); // Bind parameters
   $select_users->execute(); // Execute the prepared statement
   
   // Get the result set
   $result = $select_users->get_result();

   if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      setcookie('user_id', $row['id'], time() + 60*60*24, '/');
      header('location:admin.php');
   } else {
      $message[] = 'Incorrect email or password!';
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

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
      <h3>Login</h3>
      <input type="email" required maxlength="50" placeholder="enter your email" class="box" name="email">
      <input type="password" required maxlength="50" placeholder="enter your password" class="box" name="pass">
      <input type="submit" value="login now" name="submit" class="btn">
      <p>Don't Have An Account? <a href="register.php">Register</a></p>
   </form>

</section>

<!-- register section ends -->
   
</body>
</html>
