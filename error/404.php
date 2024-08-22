<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>404 error found!!!</h1>
</body>
</html>




<?php
// session_start();

// include "../config/database.php";

// // Check if the form is submitted
// if (isset($_POST["registerbtn"])) {
//     $name = $_POST["user_name"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $c_password = $_POST["c_password"];

//     $name_regex = "/^[a-zA-Z ]+$/";
//     $email_regex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
//     $flag = false;

//     // Name validation
//     if (!$name) {
//         $_SESSION["name_error"] = "Name field is required!";
//         $flag = true;
//     } elseif (!preg_match($name_regex, $name)) {
//         $_SESSION["name_error"] = "Name is invalid!";
//         $flag = true;
//     } else {
//         $_SESSION["old_name"] = $name;
//     }

//     // Email validation
//     if (!$email) {
//         $_SESSION["email_error"] = "Email field is required!";
//         $flag = true;
//     } elseif (!preg_match($email_regex, $email)) {
//         $_SESSION["email_error"] = "Email is invalid!";
//         $flag = true;
//     } else {
//         $_SESSION["old_email"] = $email;
//     }

//     // Password validation
//     if (!$password) {
//         $_SESSION["pass_error"] = "Password field is required!";
//         $flag = true;
//     } else {
//         $_SESSION["old_pass"] = $password;
//     }

//     // Confirm password validation
//     if (!$c_password) {
//         $_SESSION["cpass_error"] = "Please confirm your password!";
//         $flag = true;
//     } else {
//         $_SESSION["old_cpass"] = $c_password;
//     }

//     // Password Regex validation
//     if (!$flag) {
//         function validatePassword($password, $c_password)
//         {
//             $pass_length_regex = "/^(?=\S{8,})/";
//             $pass_number_regex = "/^(?=\S*[\d])/";
//             $pass_lower_regex = "/^(?=\S*[a-z])/";
//             $pass_upper_regex = "/^(?=\S*[A-Z])/";
//             $pass_symbol_regex = "/^(?=\S*[\W])/";
//             $pass_error = "";

//             if ($password !== $c_password) {
//                 $pass_error = "Passwords do not match the confirm password!";
//             } elseif (!preg_match($pass_length_regex, $password)) {
//                 $pass_error = "Password must be at least 8 characters long";
//             } elseif (!preg_match($pass_lower_regex, $password)) {
//                 $pass_error = "Password must include at least one lowercase letter";
//             } elseif (!preg_match($pass_upper_regex, $password)) {
//                 $pass_error = "Password must include at least one uppercase letter";
//             } elseif (!preg_match($pass_symbol_regex, $password)) {
//                 $pass_error = "Password must include at least one symbol";
//             } elseif (!preg_match($pass_number_regex, $password)) {
//                 $pass_error = "Password must include at least one number";
//             } else {
//                 return true;
//             }

//             if ($pass_error) {
//                 $_SESSION["pass_error"] = $pass_error;
//                 return false;
//             }
//         }

//         $isValidPassword = validatePassword($password, $c_password);
//         if (!$isValidPassword) {
//             $flag = true;
//         }
//     }

//     // If no errors, insert into the database
//     if (!$flag) {
//         $encryption = sha1($password);
//         $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$encryption')";
//         mysqli_query($db, $query);

//         $_SESSION["register_complete"] = "Registration Complete!";
//         $_SESSION["register_name"] = $name;
//         $_SESSION["register_email"] = $email;
//         header("location: login.php");
//         exit();
//     } else {
//         header("Location: register.php");
//         exit();
//     }
// } else {
//     header("Location: register.php");
//     exit();
// }

// //login page start

// if (isset($_POST["loginbtn"])){
//    echo "vlo";
// }else{
//    echo "kharap";
// }



?>
