<?php

include'../extends/header.php';

?>

<div class="row">
<div class="col">
      <div class="page-description">
         <h1>Settings</h1>
     </div>
 </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
        <div class="card-header">
            <h4>Username & Useremail Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">UserName</label>
            <input type="text" name="name" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your name">

            <!-- name success -->
            <?php if(isset($_SESSION['name_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['name_update'] ?></div>
            <?php endif; unset($_SESSION['name_update'])?>
            <!-- name success -->

            <!-- name error -->
            <?php if(isset($_SESSION['name_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_error'] ?></div>
            <?php endif; unset($_SESSION['name_error'])?>
            <!-- name error -->

            <label for="exampleInputEmail" class="from-label mt-2">UserEmail</label>
            <input type="text" name="email" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your email">

             <!-- email success -->
             <?php if(isset($_SESSION['email_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['email_update'] ?></div>
            <?php endif; unset($_SESSION['email_update'])?>
            <!-- email success -->

             <!-- email error -->
             <?php if(isset($_SESSION['email_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['email_error'] ?></div>
            <?php endif; unset($_SESSION['email_error'])?>
            <!-- email error -->


            <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4 rounded-pill" name="updatebtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
        <div class="card-header">
            <h4>Password Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">Current Password </label>
            <input type="password" name="old_password" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your current password">


            <label for="exampleInputEmail" class="from-label mt-2">Password</label>
            <input type="password" name="new_password" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your password">

             
            <label for="exampleInputEmail" class="from-label mt-2">Confirm Password</label>
            <input type="password" name="con_password" class="form-control form-control-rounded " aria-describedby="" placeholder="enter your confirm password">

                <!-- password success -->
            <?php if(isset($_SESSION['pass_success'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['pass_success'] ?></div>
            <?php endif; unset($_SESSION['pass_success'])?>
            <!-- password success -->

            <!-- password error -->
            <?php if(isset($_SESSION['pass_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['pass_error'] ?></div>
            <?php endif; unset($_SESSION['pass_error'])?>
            <!-- password error -->

            <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4 rounded-pill" name="updatepassbtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>
</div>

<!-- image part start-->

<div class="col-6">
        <div class="card">
        <div class="card-header">
            <h4>Image Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">Profile Picture</label>
            <input type="file" name="image" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your name">

            <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4 rounded-pill" name="imagebtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>

<!-- image part end-->

<!-- about part start-->

<div class="col-6">
        <div class="card">
        <div class="card-header">
            <h4>About Image Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">About Picture</label>
            <input type="file" name="image_about" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your name">

            <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4 rounded-pill" name="about_imagebtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>

<!-- about part end-->

<!-- about part start-->

<!-- <div class="col-6">
        <div class="card">
        <div class="card-header">
            <h4>Number Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">Phone Number</label>
            <input type="number" name="number" class="form-control form-control-rounded" aria-describedby="..." placeholder="enter your number">

            <!-- name success -->
            <?php if(isset($_SESSION['number_add'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['number_add'] ?></div>
            <?php endif; unset($_SESSION['number_add'])?>
            <!-- name success -->

            <!-- name error -->
            <?php if(isset($_SESSION['number_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['number_error'] ?></div>
            <?php endif; unset($_SESSION['number_error'])?>
            <!-- name error -->


            <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4 rounded-pill" name="number" type="submit">Add</button>
            </div>
         </div>
         </form>
        </div>
    </div> -->

<!-- about part end -->

<?php

include'../extends/footer.php';

?>
