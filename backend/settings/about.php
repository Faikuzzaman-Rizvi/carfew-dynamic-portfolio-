<?php

include'../extends/header.php';

$edu_query = "SELECT * FROM educations";
$educations = mysqli_query($db,$edu_query);

?>

<!-- about part start-->

<div class="col-full">
        <div class="card">
        <div class="card-header">
            <h4>About Image Update:</h4>
        </div>
        <form action="settings_manage.php" method="POST" enctype="multipart/form-data">
         <div class="card-body">
            <picture class="d-block my-4">
                <img id="port_show_img" src="../../public/uploads/defult/defult.jpeg" alt="" style="width:100%; height: 300px; object-fit:contain">
            </picture>
            <label for="exampleInputEmail1" class="form-label my-2">About Image</label>
            <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image_about" class="form-control" id="updateicon" aria-describedby="emailHelp">

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

            <button class="btn btn-primary mt-4 border-4" name="about_imagebtn" type="submit">Update</button>
            </div>
         </div>
         </form>
        </div>
    </div>

<!-- about part end-->

<?php if(isset($_SESSION['edu_insert'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['edu_insert'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['edu_insert']) ?>

<?php if(isset($_SESSION['edu_status'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['edu_status'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['edu_status']) ?>

<?php if(isset($_SESSION['edu_edit'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['edu_edit'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['edu_edit']) ?>

<?php if(isset($_SESSION['edu_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['edu_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['edu_delete']) ?>

<div class="row">
    <div class="col-full">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>About Informations</h4>
                <a href="about_create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Year</th>
                    <th scope="col">Informations</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                foreach($educations as $education) :
                ?>
                <tr>
                    <th scope="row">
                    <?= $num++ ?>
                    </th>
                    <td>
                    <?= $education['description'] ?>
                    </td>
                    <td>
                    <?= $education['year'] ?>
                    </td>
                    <td>
                    <?= $education['information'] ?>
                    </td>
                    <td>
                    <?= $education['activity'] ?>
                    </td>
                    <td>
                    <a href="settings_manage.php?statusid=<?= $education['id'] ?>" class="<?= ($education['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $education['status'] ?></a>

                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="about_edit.php?editid=<?= $education['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="settings_manage.php?deleteid=<?= $education['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
           <?php endforeach; ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>
</div>




<?php

include'../extends/footer.php';

?>
