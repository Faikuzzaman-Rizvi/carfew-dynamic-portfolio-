<?php

include "../../config/database.php";
session_start();

//image update...
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

        $localpath = '../../public/uploads/portfolio/'.$newname;

        if(move_uploaded_file($temp_name,$localpath)){
            $insert_query = "INSERT INTO portfolios (title,subtitle,description,image) VALUE ('$title','$subtitle','$description','$newname')";

            mysqli_query($db,$insert_query);

            $_SESSION['port_success'] = "New protflio Insert Successfully Complete!!";
            header('location: portfolios.php');

        }
    }

}

if(isset($_POST['insertbtn'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle']; 
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $explode = explode('.',$image);
            $extention = end($explode);
            $temp_name = $_FILES['image']['tmp_name'];

        if($title && $subtitle && $description && $image){
             $newname = $id . '-' . $title . '-' . date('d-m-Y'). '-' .rand(0,9999).'.'.$extention;
             $localpath = '../../public/uploads/portfolio/'.$newname;
    
            if(move_uploaded_file($temp_name,$localpath)){
            $query_update = "UPDATE portfolios SET title='$title',subtitle='$subtitle',description='$description',image='$newname' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['port_edit'] = "portfolio Update Successfully Complete"; 
            header('location: portfolios.php');
          }
       }
    }
}

//delete.....
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);

    if($port['image']){
        $oldname = $port['image'];
        $existspath = '../../public/uploads/portfolio/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }


    }

    $delete_query = "DELETE FROM portfolios WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['port_success'] = "Portfolio deleted successfully!";
    header('location: portfolios.php');
}

//status update....
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $portfolio = mysqli_fetch_assoc($connect);


    if($portfolio['status'] == 'deactive'){
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['portfolio_status'] = "portfolio Status Successfully Complete"; 
        header('location: portfolios.php');
    }else{
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['portfolio_status'] = "portfolio Status Successfully Complete"; 
        header('location: portfolios.php');
    }
}


?>