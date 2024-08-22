<?php

include "../config/database.php";

session_start();
//register start...

if (isset($_POST["registerbtn"])) {
   $name = $_POST["user_name"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $c_password = $_POST["c_password"];

   $name_regex = "/^[a-zA-Z ]+$/";
   $email_regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $flag=false;
 // Name validation
   if (!$name) {
      $_SESSION["name_error"] = "Name field is required!";
      header("Location: register.php");
      $flag=true;
   } elseif (!preg_match($name_regex, $name)) {
      $_SESSION["name_error"] = "Name is invalid!";
      header("Location: register.php");
      $flag=true;
   }else{
      $_SESSION["old_name"] = $name;
      header("Location: register.php");
   }

 // email validation
   if (!$email) {
      $_SESSION["email_error"] = "Email field is required!";
      header("Location: register.php");
      $flag=true;
   } elseif (!preg_match($email_regex, $email)) {
      $_SESSION["email_error"] = "Email is invalid!";
      header("Location: register.php");
      $flag=true;
   }else{
      $_SESSION["old_email"] = $email;
      header("Location: register.php");
   }

    // password validation
   if (!$password) {
      $_SESSION["pass_error"] = "Password field is required!";
      header("Location: register.php");
      $flag=true;
   }else{
      $_SESSION["old_pass"] = $password;
      header("Location: register.php");
   }

   // cpassword validation
   if (!$c_password) {
      $_SESSION["cpass_error"] = "Please confirm your password!";
      header("Location: register.php");
      $flag=true;
   }else{
      $_SESSION["old_cpass"] = $password;
      header("Location: register.php");
   }

   // password Regex validation
   function validatePassword($password, $c_password)
   {
      $pass_length_regex = "/^(?=\S{8,})/";
      $pass_number_regex = "/^(?=\S*[\d])/";
      $pass_lower_regex = "/^(?=\S*[a-z])/";
      $pass_upper_regex = "/^(?=\S*[A-Z])/";
      $pass_symbol_regex = "/^(?=\S*[\W])/";
      $pass_error = "";

      
      if (!$password) {
         $pass_error = "Password field is required!";
      }elseif($password !== $c_password){
         $pass_error = "Passwords do not match the confirm password!";
      } elseif (!preg_match($pass_length_regex, $password)) {
         $pass_error = "Password must be at least 8 characters long";
      } elseif (!preg_match($pass_lower_regex, $password)) {
         $pass_error = "Password must include at least one lowercase letter";
      } elseif (!preg_match($pass_upper_regex, $password)) {
         $pass_error = "Password must include at least one uppercase letter";
      } elseif (!preg_match($pass_symbol_regex, $password)) {
         $pass_error = "Password must include at least one symbol";
      } elseif (!preg_match($pass_number_regex, $password)) {
         $pass_error = "Password must include at least one number";
      } else {
         echo "Database Ok";
      }

      // if ($pass_error) {
      //    $_SESSION["pass_error"] = $pass_error;
      //    header("Location: register.php");
      //    $flag=true;
      // }

   //    if ($pass_error) {
   //       $_SESSION["pass_error"] = $pass_error;
   //       return false;
   //   }
   //     return true;   
   }

   // if (!validatePassword($password, $c_password)) {
   //    $flag = true;
   //   }
   validatePassword($password, $c_password);
   if ($flag) {
      header("Location: register.php");
      exit();
    }

   // database connected
   if($flag == false){
      $encryption = sha1($password);
      $query="INSERT INTO users (name,email,password) VALUES ('$name','$email','$encryption')";
      mysqli_query($db,$query);
      $_SESSION["register_complete"] = "Registration Complete!";
      $_SESSION["register_name"] = $name;
      $_SESSION["register_email"] = $email;
      header("location: login.php");
   }
} 
//register end...

//login page start

if (isset($_POST["loginbtn"])){
   $email = $_POST["email"];
   $password = $_POST["password"];

   $email_regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $flag=false;

   if (!$email) {
      $_SESSION["email_error"] = "Email field is required!";
      header("Location: login.php");
      $flag=true;
   } elseif (!preg_match($email_regex, $email)) {
      $_SESSION["email_error"] = "Email is invalid!";
      header("Location: login.php");
      $flag=true;
   }
  
   function validatePassword($password)
   {
      $pass_length_regex = "/^(?=\S{8,})/";
      $pass_number_regex = "/^(?=\S*[\d])/";
      $pass_lower_regex = "/^(?=\S*[a-z])/";
      $pass_upper_regex = "/^(?=\S*[A-Z])/";
      $pass_symbol_regex = "/^(?=\S*[\W])/";
      $pass_error = "";

      if (!$password) {
         $pass_error = "Password field is required!";
      } elseif (!preg_match($pass_length_regex, $password)) {
         $pass_error = "Password must be at least 8 characters long";
      } elseif (!preg_match($pass_lower_regex, $password)) {
         $pass_error = "Password must include at least one lowercase letter";
      } elseif (!preg_match($pass_upper_regex, $password)) {
         $pass_error = "Password must include at least one uppercase letter";
      } elseif (!preg_match($pass_symbol_regex, $password)) {
         $pass_error = "Password must include at least one symbol";
      } elseif (!preg_match($pass_number_regex, $password)) {
         $pass_error = "Password must include at least one number";
      } 
       if ($pass_error) {
         $_SESSION["pass_error"] = $pass_error;
         header("Location: login.php");
         $flag=true;
      }
      
   }
   validatePassword($password);
   
  
 if(!$flag){
 $encryption=sha1($password);
 $query_info = "SELECT COUNT(*) AS 'validate' FROM users WHERE email='$email' AND password='$encryption'";
 $connect = mysqli_query($db,$query_info);
 $result = mysqli_fetch_assoc($connect);

if ($result['validate'] == 1){
   $query_info = "SELECT * FROM users WHERE email='$email'";
   $connect = mysqli_query($db,$query_info);
   $author = mysqli_fetch_assoc($connect);
   $_SESSION['author_id'] = ($author['id']);
   $_SESSION['author_name'] = ($author['name']);
   $_SESSION['temp_name'] = ($author['name']);
   $_SESSION['author_email'] = ($author['email']);

   header("location: ../backend/home/home.php");
}else{
      $_SESSION["login_unsuccuessfull"] = "credential doesn't match!";
      header("Location: login.php");
   }


}


}


?>