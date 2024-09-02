<?php

include "../../config/database.php";
session_start();

//data create.....
if(isset($_POST['insert'])){
    $id= $_SESSION['author_id'];
    $name = $_POST['name'];
    $quote = $_POST['quote'];
    $image = $_FILES['image']['name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $temp_name = $_FILES['image']['tmp_name'];

    if($quote && $image){
        $newname = $id . '-' .$name .'-' .date('d-m-Y') . '-' . rand(0,9999) . '.' . $extension;

        $localpath = '../../public/uploads/customer_img/' . $newname;

        if(move_uploaded_file($temp_name, $localpath)){
            $insert_query = "INSERT INTO quotes (name,quote,image) VALUES ('$name','$quote', '$newname')";

            mysqli_query($db,$insert_query);

            $_SESSION['quote_success'] = "New Quotes Insert Successfully Complete!!";
            header('location: quotes.php');

        }
    }

}

//edit update.....
if(isset($_POST['insertbtn'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];

        $name = $_POST['name'];
        $quote = $_POST['quote'];
        $image = $_FILES['image']['name'];
        $explode = explode('.', $image);
        $extension = end($explode);
        $temp_name = $_FILES['image']['tmp_name'];

    if($quote && $image){
        $newname = $id . '-' . $name . '-' .date('d-m-Y') . '-' . rand(0,9999) . '.' . $extension;

        $localpath = '../../public/uploads/customer_img/' . $newname;

        if(move_uploaded_file($temp_name, $localpath)){
            $query_update = "UPDATE quotes SET name='$name',quote='$quote',image='$newname' WHERE id='$id'";
            mysqli_query($db,$query_update);

            $_SESSION['quote_edit'] = "customer Quotes Update Successfully Complete"; 
            header('location: quotes.php');

        }
    }
}

}


//status update....
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM quotes WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $quote = mysqli_fetch_assoc($connect);


    if($quote['status'] == 'deactive'){
        $update_query = "UPDATE quotes SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['quote_status'] = "Quotes Status Successfully Complete"; 
        header('location: quotes.php');
    }else{
        $update_query = "UPDATE quotes SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['quote_status'] = "Quotes Status Successfully Complete"; 
        header('location: quotes.php');
    }
}

//delete.....
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $quote_query = "SELECT * FROM quotes WHERE id='$id'";
    $connect = mysqli_query($db,$quote_query);
    $quote = mysqli_fetch_assoc($connect);

    if($quote['image']){
        $oldname = $quote['image'];
        $existspath = '../../public/uploads/customer_img/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }


    }

    $delete_query = "DELETE FROM quotes WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['quote_delete'] = "Customer Quotes deleted successfully!";
    header('location: quotes.php');
}

?>