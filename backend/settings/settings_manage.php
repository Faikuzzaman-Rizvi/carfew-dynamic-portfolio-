<?php
include '../../config/database.php';
session_start();

if(isset($_POST['updatebtn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_SESSION['author_id'];

    if($name){
        $query = "UPDATE users SET name='$name' WHERE id='$id'";
        if(mysqli_query($db,$query)){
            $_SESSION['author_name'] = $name;
            $_SESSION['name_update'] = 'Name updated successfully!';
        } else {
            $_SESSION['name_error'] = 'Name update failed!';
        }
    } else {
        $_SESSION['name_error'] = "Your name is invalid!";

    } 

    if($email){
        $query = "UPDATE users SET email='$email' WHERE id='$id'";
        if(mysqli_query($db,$query)){
            $_SESSION['author_email'] = $email;
            $_SESSION['email_update'] = 'Email updated successfully!';
        } else {
            $_SESSION['email_error'] = 'Email update failed!';
        }
    } else {
        $_SESSION['email_error'] = "Your email is invalid!";
    }

    header('location: settings.php');
    exit();
    
}

if(isset($_POST['updatepassbtn'])){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $con_password = $_POST['con_password'];
    $id = $_SESSION['author_id'];

    if($old_password && $new_password && $con_password){
        $encypt = sha1($old_password);
        $match_query = "SELECT COUNT(*) AS 'match' FROM users WHERE id='$id' AND password='$encypt'";
        $connect = mysqli_query($db, $match_query);
        $match = mysqli_fetch_assoc($connect)['match'];

        if($match == 1){
            if ($new_password == $con_password) {
                $new_encypt = sha1($new_password);
                $query = "UPDATE users SET password='$new_encypt' WHERE id='$id'";
                if(mysqli_query($db, $query)){
                    $_SESSION['pass_success'] = "Password updated successfully!";
                } else {
                    $_SESSION['pass_error'] = "Password update failed!";
                }
            } else {
                $_SESSION['pass_error'] = "New password and confirm password do not match!";
            }
        } else {
            $_SESSION['pass_error'] = "Your current password doesn't match!";
        }
    } else {
        $_SESSION['pass_error'] = "All password fields are required!";
    }

    header('location: settings.php');
    exit();
}



// image start
if(isset($_POST['imagebtn'])){
 $image = $_FILES['image']['name'];
 $tmp_path = $_FILES['image']['tmp_name'];


 if($image){
    $id = $_SESSION['author_id'];
    $name = $_SESSION['author_name'];
    $explode = explode('.',$image);
    $extention = end($explode);
   $new_name = $id . "-" . $name . "-" . date("d-m-Y") . "." . $extention;
   $local_path ="../../public/uploads/profile/".$new_name;

    if(move_uploaded_file($tmp_path,$local_path)){
        $query = "UPDATE users SET image='$new_name' WHERE id='$id'";
            if(mysqli_query($db,$query)){
                header('location: settings.php');
        }else{
           echo "kharap";
        }
   }

}
  
} 

//about image upadate

if(isset($_POST['about_imagebtn'])){
 $image = $_FILES['image_about']['name'];
 $tmp_path = $_FILES['image_about']['tmp_name'];


 if($image){
    $id = $_SESSION['author_id'];
    $name = $_SESSION['author_name'];
    $explode = explode('.',$image);
    $extention = end($explode);
   $new_name = $id . "-" . $name . "-" . date("d-m-Y") . "." . $extention;
   $local_path ="../../public/uploads/about_img/".$new_name;

    if(move_uploaded_file($tmp_path,$local_path)){
        $query = "UPDATE users SET image_about='$new_name' WHERE id='$id'";
            if(mysqli_query($db,$query)){
                header('location: settings.php');
        }else{
           echo "kharap";
        }
   }

}
  
}  

//phone number add

// if(isset($_POST['number'])){
//     $number = $_POST['number'];
//     $id = $_SESSION['author_id'];

//     if($number){
//         $query = "UPDATE users SET number='$number' WHERE id='$id'";
//         if(mysqli_query($db,$query)){
//             $_SESSION['author_number'] = $number;
//             $_SESSION['number_add'] = 'Number add successfully!';
//         } else {
//             $_SESSION['number_error'] = 'Name add failed!';
//         }
//     }else {
//         $_SESSION['number_error'] = "Your number is invalid!";

//     }
//     header('location: settings.php');
//     exit();
    
// }


?>