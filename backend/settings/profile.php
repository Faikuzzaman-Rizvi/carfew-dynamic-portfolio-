<?php

include'../extends/header.php';

?>


<!-- image part start-->

<div class="col-full">
        <div class="card">
        <div class="card-header">
            <h4>Profile Image Update:</h4>
        </div>
        <div class="card-body">
        <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
            <picture class="d-block my-4">
                        <img id="port_show_img" src="../../public/uploads/defult/defult.jpeg" alt="" style="width:100%; height: 300px; object-fit:contain">
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Image</label>
                    <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control" id="updateicon" aria-describedby="emailHelp">

             <!-- Image success -->
           <?php if(isset($_SESSION['img_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['img_update'] ?></div>
            <?php endif; unset($_SESSION['img_update'])?>
            <!-- Image success -->

            <!-- Image error -->
            <?php if(isset($_SESSION['img_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['img_error'] ?></div>
            <?php endif; unset($_SESSION['img_error'])?>
            <!-- Image error -->

            <button class="btn btn-primary mt-4 border-4" name="imagebtn" type="submit">Update</button>
            </div>
            </div>
         </div>
         </form>
        </div>
    </div>

<!-- image part end-->


    <div class="row">
    <div class="col-full row g-3">
        <div class="card">
        <div class="card-header">
            <h4>User Information Update:</h4>
        </div>
    <div class="card-body">
    <form class="row g-3" action="settings_manage.php" method="POST">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="enter your Name">
    </div>

    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4"  placeholder="enter your Email">
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="inputEmail4" placeholder="Enter your Address">
    </div>

    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Number</label>
        <input type="tel" name="number" class="form-control" id="inputPassword4" placeholder="Enter your Phone Number">
    </div>

    <div class="col-12">
        <label for="inputAddress" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" id="inputAddress" placeholder="Enter your Description">

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

            <!-- address success -->
           <?php if(isset($_SESSION['address_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['address_update'] ?></div>
            <?php endif; unset($_SESSION['address_update'])?>
            <!-- address success -->

             <!-- address error -->
             <?php if(isset($_SESSION['address_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['address_error'] ?></div>
            <?php endif; unset($_SESSION['address_error'])?>
            <!-- address error -->

            <!-- number success -->
           <?php if(isset($_SESSION['number_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['number_update'] ?></div>
            <?php endif; unset($_SESSION['number_update'])?>
            <!-- number success -->

             <!-- number error -->
             <?php if(isset($_SESSION['number_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['number_error'] ?></div>
            <?php endif; unset($_SESSION['number_error'])?>
            <!-- number error -->

            <!-- description success -->
           <?php if(isset($_SESSION['des_update'])):?>
            <div id="emailHelp" class="form-text text-success"><?= $_SESSION['des_update'] ?></div>
            <?php endif; unset($_SESSION['des_update'])?>
            <!--description success -->

             <!--description error -->
             <?php if(isset($_SESSION['des_error'])):?>
            <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['des_error'] ?></div>
            <?php endif; unset($_SESSION['des_error'])?>
            <!--description error -->
   
        <div class="d-grid gap-2">
            <button class="btn btn-primary mt-4 border-4" name="updatebtn" type="submit">Update</button>
            </div>
        </div>
        </form>
      </div>
     </div>
    </div>


<?php

include'../extends/footer.php';

?>
