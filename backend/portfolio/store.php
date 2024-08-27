<?php

include "../../config/database.php";
session_start();

if(isset($_POST['insert'])){
    $id= $_SESSION['author_id'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle']; 
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $explode = explode('.',$image);
    $extention = end($explode);
    $temp_name = $_FILES['image']['tmp_name'];

    if($title && $subtitle && $description && $image){
        $newname = $id . '-' . $title . '-' . date('d-m-Y'). '-' .rand(0,9999).'.'.$extention;

        $localpath = '../../public/portfolio/'.$newname;

        if(move_uploaded_file($temp_name,$localpath)){
            $insert_query = "INSERT INTO portfolios (title,subtitle,description,image) VALUE ('$title','$subtitle','$description','$newname')";

            mysqli_query($db,$insert_query);

            $_SESSION['port_success'] = "New protflio Insert Successfully Complete!!";
            header('location: portfolios.php');

        }
    }

}


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM portfolios WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['port_success'] = "Portfolio deleted successfully!";
    header('location: portfolios.php');
}



?>