<?php

include "../extends/header.php";

$services_query = "SELECT * FROM services";
$services = mysqli_query($db,$services_query);

?>

<?php if(isset($_SESSION['service_insert'])) : ?>
<div class="row">
    <div class="col-12">
    <div class="alert alert-custom" role="alert">
      <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
         <div class="alert-content">
            <span class="alert-title"><?= $_SESSION['service_insert'] ?></span>
            
       </div>
    </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_insert']); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
            <h4>Services</h4>
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
                                                                <?= $service['title']?>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="badge bg-danger text-white"><?= $service['status']?></a>
                                                            </td>
                                                            <td>@mdo</td>
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

include "../extends/footer.php";

?>