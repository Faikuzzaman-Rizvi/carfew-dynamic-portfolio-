<?php

include '../extends/header.php';

$quotes_query = "SELECT * FROM quotes";
$quotes = mysqli_query($db,$quotes_query);
$quote = mysqli_fetch_assoc($quotes);

$quotes_query = "SELECT * FROM quotes";
$quotes = mysqli_query($db,$quotes_query);


?>

<?php if(isset($_SESSION['quote_success'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['quote_success'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['quote_success']) ?>

<?php if(isset($_SESSION['quote_status'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['quote_status'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['quote_status']) ?>

<?php if(isset($_SESSION['quote_edit'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['quote_edit'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['quote_edit']) ?>

<?php if(isset($_SESSION['quote_delete'])): ?>
<div class="row">
    <div class="col-12">
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title">
                    <?= $_SESSION['quote_delete'] ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['quote_delete']) ?>


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
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quotes</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($quote)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-danger"><h3>No Data Found!!!!</h3></td>
                    </tr>
                    <?php else :?>
                        <?php 
                $num = 1;
                foreach($quotes as $quote): ?>
                <tr>
                    <th scope="row">
                    <?= $num++ ?>
                    </th>
                    <td>
                    <?= $quote['name'] ?>
                    </td>
                    <td>
                         <img style="width: 80px; height: 80px; border-radius:50%;" src="../../public/uploads/customer_img/<?= $quote['image'] ?>" alt="">
                    </td>
                    <td>
                    <?= $quote['quote'] ?>
                    </td>
                   
                    <td>
                        <a href="quote_manage.php?statusid=<?= $quote['id'] ?>" class="<?= ($quote['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $quote['status'] ?></a>
                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="quote_edit.php?editid=<?= $quote['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="quote_manage.php?deleteid=<?= $quote['id'] ?>" class="text-danger fa-2x">
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
