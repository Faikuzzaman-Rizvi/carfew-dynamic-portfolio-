<?php


include "../extends/header.php";

$email_query = "SELECT * FROM emails";

$emails = mysqli_query($db,$email_query);
?>
<div class="row">
<div class="col">
      <div class="page-description">
         <h1>Email Details</h1>
     </div>
 </div></div>

 <?php if(isset($_SESSION['email_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['email_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['email_delete']) ?>

 <div class="row">
    <div class="col-full">
        <div class="card">
        <div class="card-header">
            <h4>Email Sender Informations</h4> 
            <a href="email.php"></a>
        </div>
            <div class="card-body">
            <!-- table start -->
            <div class="example-content">
               <table class="table">
                   <thead class="table-dark">
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Description</th>
                           <th scope="col">Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php 
                   $num = 1;
                   $id = $_SESSION['author_id'];
                   foreach($emails as $email):
                   if($email['id'] == $id){
                    continue;
                   }
                   ?>
                       <tr>
                           <th>
                           <?= $num++ ?>
                           </th>
                           <td>
                            <?= $email['name']?>
                           </td>
                           <td>
                           <?= $email['email']?>
                           </td>
                           <td>
                           <?= $email['body']?>
                           </td>
                           <td>
                           <div class="d-flex justify-content-around align-items-center"> 
                            <a href="action.php?deleteid=<?= $email['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                           </td>
                       </tr>
                       <?php endforeach; ?>
                   </tbody>
               </table>
           </div>

            <!-- table end -->
        </div>  
        </div>
        </div>
    </div>
 </div>
                
 
 <?php

include "../extends/footer.php";

?>







                      
            

   