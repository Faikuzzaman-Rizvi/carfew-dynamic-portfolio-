<?php
include '../../config/database.php';
session_start();


if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];


    if($title && $description && $icon){
        $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($db,$query);
        $_SESSION['service_insert'] = "Service Insert Successfully Complete"; 
        header('location: services.php');
    }

}



if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $service = mysqli_fetch_assoc($connect);


    if($service['status'] == 'deactive'){
        $update_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_status'] = "Service Status Successfully Complete"; 
        header('location: services.php');
    }else{
        $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_status'] = "Service Status Successfully Complete"; 
        header('location: services.php');
    }
}



if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
    
        if($title && $description && $icon){
            $query_update = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['service_edit'] = "Service Update Successfully Complete"; 
            header('location: services.php');
        }
    
    }
}


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['service_delete'] = "Service Delete Successfully Complete"; 
    header('location: services.php');
}

//Reviews area....
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
//?-- reviews status 

if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM reviews WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $reviews = mysqli_fetch_assoc($connect);


    if($reviews['status'] == 'deactive'){
        $update_query = "UPDATE reviews SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['review_status'] = "Service Status Successfully Complete"; 
        header('location: services.php');
    }else{
        $update_query = "UPDATE reviews SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['review_status'] = "Service Status Successfully Complete"; 
        header('location: services.php');
    }
}

//?-- reviews update

if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
    
        if($title && $description && $icon){
            $query_update = "UPDATE reviews SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['review_edit'] = "Reviews Update Successfully Complete"; 
            header('location: services.php');
        }
    
    }
}

//?-- reviews update

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM reviews WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['review_delete'] = "Service Delete Successfully Complete"; 
    header('location: services.php');
}

?>