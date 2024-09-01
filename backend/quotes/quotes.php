<?php

include '../extends/header.php';




?>



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
                    <th scope="col">Quotes</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td colspan="5" class="text-center text-danger"><h3>No Data Found!!!!</h3></td>
                    </tr>
                <tr>
                    <th scope="row">
                       
                    </th>
                    <td>
                         <!-- <img style="width: 80px; height: 80px; border-radius:50%;" src="../../public/uploads/portfolio/<?= $portfolio['image'] ?>" alt=""> -->
                    </td>
                    <td>
                       srtwer
                    </td>
                   
                    <td>
                        <!-- <a href="store.php?statusid=<?= $portfolio['id'] ?>" class="<?= ($portfolio['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $portfolio['status'] ?></a> -->
                    </td>
                    <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                            <a href="port_edit.php?editid=<?= $portfolio['id'] ?>" class="text-primary fa-2x">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="store.php?deleteid=<?= $portfolio['id'] ?>" class="text-danger fa-2x">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
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
