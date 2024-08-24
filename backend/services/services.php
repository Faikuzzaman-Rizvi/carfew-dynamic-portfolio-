<?php

include '../extends/header.php';

$service_query = "SELECT * FROM services";
$services = mysqli_query($db,$service_query);

$reviews_query = "SELECT * FROM reviews";
$reviews = mysqli_query($db,$reviews_query);


?>

<!-- service insert -->

<?php if(isset($_SESSION['service_insert'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_insert'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_insert']) ?>

<!-- service status -->

<?php if(isset($_SESSION['service_status'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_status'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_status']) ?>

<!-- service edit -->

<?php if(isset($_SESSION['service_edit'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_edit'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_edit']) ?>

<!-- service delete -->

<?php if(isset($_SESSION['service_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['service_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_delete']) ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Services List</h4>
                <a href="create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num = 1;
                foreach($services as $service): ?>
                <tr>
                    <th scope="row">
                        <?= $num++ ?>
                    </th>
                    <td>
                        <i class="fa-2x <?= $service['icon'] ?>"></i>
                    </td>
                    <td>
                        <?= $service['title'] ?>
                    </td>
                    <td>
                        <?= $service['description'] ?>
                    </td>
                    <td>
                        <a href="store.php?statusid=<?= $service['id'] ?>" class="<?= ($service['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $service['status'] ?></a>
                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit.php?editid=<?= $service['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $service['id'] ?>" class="text-danger fa-2x">
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


<!-- services area....... -->

<!-- Reviews area....... -->

<?php if(isset($_SESSION['review_insert'])) : ?>
<div class="row">
    <div class="col-12">
    <div class="alert alert-custom" role="alert">
      <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
         <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['review_insert'] ?></span>
            
       </div>
    </div>
    </div>
</div>
<?php endif; unset($_SESSION['review_insert']); ?>

<!-- reviews status -->

<?php if(isset($_SESSION['review_status'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['review_status'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['review_status']) ?>

<!-- review edit -->

<?php if(isset($_SESSION['review_edit'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['review_edit'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['review_edit']) ?>

<!-- review delete -->

<?php if(isset($_SESSION['review_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['review_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['review_delete']) ?>




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
            <h4>Reviews</h4>
            <a href="create_r.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
                 <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $num = 1;
                         foreach($reviews as $review): ?>
                         <tr>
                            <th scope="row">
                                <?= $num++ ?>
                            </th>
                            <td>
                                <i class="fa-2x <?= $review['icon'] ?>"></i>
                            </td>
                            <td>
                                <?= $review['title']?>
                            </td>
                            <td>
                                <?= $review['description']?>
                            </td>
                            <td>
                            <a href="store.php?statusid=<?= $review['id'] ?>" class="<?= ($review['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $review['status'] ?></a>
                            </td>
                            <td>
                            <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit_r.php?editid=<?= $review['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $review['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
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

<!-- services area....... -->




<?php

include "../extends/footer.php";

?>