<?php

include'../extends/header.php';

?>


<div class="row">
<div class="col">
    <div class="page-description page-description-tabbed">
        <h1>Settings</h1>

        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="true">Security</button>
            </li>

            <li class="nav-item" role="presentation" >
                <a href="profile.php" style="text-decoration:none;"><button class="nav-link" id="account-tab" data-bs-target="#account" type="button" role="tab" aria-controls="hoaccountme" aria-selected="false">Profile</button></a>
            </li>

            <li class="nav-item" role="presentation" >
                <a href="about.php" style="text-decoration:none;"><button class="nav-link" id="account-tab" data-bs-target="#account" type="button" role="tab" aria-controls="hoaccountme" aria-selected="false">About</button></a>
            </li>
        </ul>
    </div>
</div>
</div>


    <div class="col-full">
        <div class="card">
        <div class="card-header">
            <h4>Password Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST">
         <div class="card-body">
            <label for="exampleInputEmail" class="from-label">Current Password </label>
            <input type="password" name="old_password" class="form-control" aria-describedby="..." placeholder="enter your current password">


            <label for="exampleInputEmail" class="from-label mt-2">Password</label>
            <input type="password" name="new_password" class="form-control" aria-describedby="..." placeholder="enter your password">

             
            <label for="exampleInputEmail" class="from-label mt-2">Confirm Password</label>
            <input type="password" name="con_password" class="form-control" aria-describedby="" placeholder="enter your confirm password">

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
            <button class="btn btn-primary mt-4 border-4" name="updatepassbtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>
</div>



<?php

include'../extends/footer.php';

?>
