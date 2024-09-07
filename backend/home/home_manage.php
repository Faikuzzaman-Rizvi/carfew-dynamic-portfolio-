<?php

session_start();
include "../../config/database.php";

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['db_delete'] = "Database Informations Delete Successfully Complete"; 
    header('location: home.php');
}




?>