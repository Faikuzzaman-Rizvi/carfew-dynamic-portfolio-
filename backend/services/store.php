<?php
session_start();
include "../../config/database.php";

if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
        $query = "INSERT INTO  services (title,description,icon) VALUE ('$title','$description','$icon')";
        mysqli_query($db,$query);
        $_SESSION['service_insert'] = 'service insert successfully complete';
        header('location: services.php');

    }

}


if(isset($_POST['insertbtn'])){
    $title = $_POST['rtitle'];
    $description = $_POST['rdescription'];
    $icon = $_POST['ricon'];

    if($title && $description && $icon){
        $query = "INSERT INTO  reviews (title,description,icon) VALUE ('$title','$description','$icon')";
        mysqli_query($db,$query);
        $_SESSION['review_insert'] = 'review insert successfully complete';
        header('location: services.php');

    }

}

?>