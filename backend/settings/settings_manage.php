<?php
include '../../config/database.php';
session_start();

if(isset($_POST['updatebtn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $description = $_POST['description'];
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

    if($address){
        $query = "UPDATE users SET address='$address' WHERE id='$id'";
        if(mysqli_query($db,$query)){
            $_SESSION['author_address'] = $address;
            $_SESSION['address_update'] = 'Address updated successfully!';
        } else {
            $_SESSION['address_error'] = 'Address update failed!';
        }
    } else {
        $_SESSION['address_error'] = "Your Address is invalid!";
    }

    if($number){
        $query = "UPDATE users SET number='$number' WHERE id='$id'";
        if(mysqli_query($db,$query)){
            $_SESSION['number_address'] = $number;
            $_SESSION['number_update'] = 'Number updated successfully!';
        } else {
            $_SESSION['number_error'] = 'Number update failed!';
        }
    } else {
        $_SESSION['number_error'] = "Your Number is invalid!";
    }

    if($description){
        $query = "UPDATE users SET description='$description' WHERE id='$id'";
        if(mysqli_query($db,$query)){
            $_SESSION['description_address'] = $description;
            $_SESSION['des_update'] = 'description updated successfully!';
        } else {
            $_SESSION['des_error'] = 'description update failed!';
        }
    } else {
        $_SESSION['des_error'] = "Your description is invalid!";
    }

    header('location: profile.php');
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
                $_SESSION['img_update'] = "Profile Image Update successfully";
                header('location: profile.php');
        }else{
            $_SESSION['img_error'] = "Profile Image Update Failed!!";
            header('location: profile.php');
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
                $_SESSION['img_update'] = "About Image Update successfully";
                header('location: about.php');
        }else{
            $_SESSION['img_error'] = "About Image Update Failed!!";
            header('location: about.php');
        }
   }

}
  
}  


//?Education part..

if(isset($_POST['insert'])){
    $description = $_POST['description'];
    $year = $_POST['year'];
    $information = $_POST['information'];
    $activity = $_POST['activity'];

    if($description && $year && $information && $activity){
        $query = "INSERT INTO educations (description,year,information,activity) VALUES ('$description','$year','$information','$activity ')";
        mysqli_query($db,$query);
        $_SESSION['edu_insert'] = "About Informations Insert Successfully COmplete";
        header('location: about.php');
    }
}

//?status id
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM educations WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $education = mysqli_fetch_assoc($connect);


    if($education['status'] == 'deactive'){
        $update_query = "UPDATE educations SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['edu_status'] = "Education Status Successfully Complete"; 
        header('location: about.php');
    }else{
        $update_query = "UPDATE educations SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['edu_status'] = "Education Status Successfully Complete"; 
        header('location: about.php');
    }
}


//?edit part...

if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];

        $description = $_POST['description'];
        $year = $_POST['year'];
        $information = $_POST['information'];
        $activity = $_POST['activity'];
    
        if($description && $year && $information && $activity){
            $query_update = "UPDATE educations SET description='$description',year='$year',information='$information',activity='$activity' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['edu_edit'] = "About Informations Update Successfully Complete"; 
            header('location: about.php');
        }
    }
}


//?delete id..
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM educations WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['edu_delete'] = "education information Delete Successfully Complete"; 
    header('location: about.php');
}

//nothing...

?>