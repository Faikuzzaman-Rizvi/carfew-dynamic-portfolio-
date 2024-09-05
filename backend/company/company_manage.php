<?php

include "../../config/database.php";
session_start();

if(isset($_POST['insert'])){
    $id= $_SESSION['author_id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $temp_name = $_FILES['image']['tmp_name'];

    if($name && $image){
        $newname = $id . '-' .$name .'-' .date('d-m-Y') . '-' . rand(0,9999) . '.' . $extension;

        $localpath = '../../public/uploads/company_logo/' . $newname;

        if(move_uploaded_file($temp_name, $localpath)){
            $insert_query = "INSERT INTO companys (name,image) VALUES ('$name','$newname')";

            mysqli_query($db,$insert_query);

            $_SESSION['company_success'] = "Company logo Insert Successfully Complete!!";
            header('location: company.php');

        }
    }

}


//status
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM companys WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $logo = mysqli_fetch_assoc($connect);


    if($logo['status'] == 'deactive'){
        $update_query = "UPDATE companys SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['company_status'] = "Company Logo Status Successfully Complete"; 
        header('location: company.php');
    }else{
        $update_query = "UPDATE companys SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['company_status'] = "Company Logo Status Successfully Complete"; 
        header('location: company.php');
    }
}

//edit update.....
if(isset($_POST['insertbtn'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];

        $name = $_POST['name'];
        $image = $_FILES['image']['name'];
        $explode = explode('.', $image);
        $extension = end($explode);
        $temp_name = $_FILES['image']['tmp_name'];

    if($name && $image){
        $newname = $id . '-' . $name . '-' .date('d-m-Y') . '-' . rand(0,9999) . '.' . $extension;

        $localpath = '../../public/uploads/company_logo/' . $newname;

        if(move_uploaded_file($temp_name, $localpath)){
            $query_update = "UPDATE companys SET name='$name',image='$newname' WHERE id='$id'";
            mysqli_query($db,$query_update);

            $_SESSION['comapny_edit'] = "Company Logo Update Successfully Complete"; 
            header('location: company.php');

        }
    }
}

}

//delete.....
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $quote_query = "SELECT * FROM companys WHERE id='$id'";
    $connect = mysqli_query($db,$quote_query);
    $logo = mysqli_fetch_assoc($connect);

    if($logo['image']){
        $oldname = $logo['image'];
        $existspath = '../../public/uploads/company_logo/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }


    }

    $delete_query = "DELETE FROM companys WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['logo_delete'] = "Company Logo deleted successfully!";
    header('location: company.php');
}

?>