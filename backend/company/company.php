<?php

include '../extends/header.php';

$company_query = "SELECT * FROM companys";
$company = mysqli_query($db,$company_query);
$logo = mysqli_fetch_assoc($company);

$company_query = "SELECT * FROM companys";
$logos = mysqli_query($db,$company_query);


?>

<?php if(isset($_SESSION['company_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['company_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['company_success']) ?>

<?php if(isset($_SESSION['company_status'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['company_status'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['company_status']) ?>

<?php if(isset($_SESSION['comapny_edit'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['comapny_edit'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['comapny_edit']) ?>

<?php if(isset($_SESSION['logo_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['logo_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['logo_delete']) ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Customer Quotes Details</h4>
                <a href="create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($logo)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-danger"><h3>No Data Found!!!!</h3></td>
                    </tr>
                    <?php else :?>
                        <?php 
                $num = 1;
                foreach($logos as $logo): ?>
                <tr>
                    <th scope="row">
                    <?= $num++ ?>
                    </th>
                    <td>
                        <img style="width: 80px; height: 80px; border-radius:50%;" src="../../public/uploads/company_logo/<?= $logo['image'] ?>" alt="">
                    </td>

                    <td>
                    <?= $logo['name'] ?>
                    </td>
                    <td>
                        <a href="company_manage.php?statusid=<?= $logo['id'] ?>" class="<?= ($logo['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $logo['status'] ?></a>
                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit.php?editid=<?= $logo['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="company_manage.php?deleteid=<?= $logo['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
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
