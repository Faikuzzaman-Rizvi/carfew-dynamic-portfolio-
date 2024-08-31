<?php

include'../extends/header.php';

$edu_query = "SELECT * FROM educations";
$educations = mysqli_query($db,$edu_query);

?>

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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4>Services List</h4>
                <a href="edu_create.php" class="btn btn-primary"><i class="material-icons">add</i>create</a>   
            </div>
            <div class="card-body">
            <div class="example-content">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Year</th>
                    <th scope="col">Informations</th>
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
                    <?= $education['year'] ?>
                    </td>
                    <td>
                    <?= $education['information'] ?>
                    </td>
                    <td>
                    <a href="settings_manage.php?statusid=<?= $education['id'] ?>" class="<?= ($education['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $education['status'] ?></a>

                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="edit.php?editid=<?= $education['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $education['id'] ?>" class="text-danger fa-2x">
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
