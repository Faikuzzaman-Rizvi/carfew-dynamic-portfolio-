<?php

include '../extends/header.php';

$portfolio_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db,$portfolio_query);



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

<?php if(isset($_SESSION['port_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['port_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_success']) ?>

<!-- service edit -->

<!-- <?php if(isset($_SESSION['service_edit'])): ?>
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
<?php endif; unset($_SESSION['service_edit']) ?> -->

<!-- service delete -->

<!-- <?php if(isset($_SESSION['service_delete'])): ?>
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
<?php endif; unset($_SESSION['service_delete']) ?> -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Portfolios List</h4>
                <a href="create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $num = 1;
                foreach($portfolios as $portfolio): ?>

                <tr>
                    <th scope="row">
                        <?= $num++ ?>
                    </th>
                    <td>
                         <img style="width: 80px; height: 80px; border-radius:50%;" src="../../public/portfolio/<?= $portfolio['image'] ?>" alt="">
                    </td>
                    <td>
                        <?= $portfolio['title'] ?>
                    </td>
                    <td>
                        <a href="store.php?statusid=" class="<?= ($portfolio['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $portfolio['status'] ?></a>
                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit.php?editid=<?= $portfolio['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $portfolio['id'] ?>" class="text-danger fa-2x">
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





<?php

include "../extends/footer.php";

?>
