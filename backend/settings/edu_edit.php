<?php

include '../extends/header.php';

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM educations WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $education = mysqli_fetch_assoc($connect);
}

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>About Informations Add</h4>
            </div>
            <div class="card-body">
                <form action="settings_manage.php?update=<?= $education['id'] ?>" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">About Description Add</label>
                    <textarea name="description" type="email" class="form-control" rows="5"><?= $education['description'] ?></textarea>
                    <label for="exampleInputEmail1" class="form-label my-2">Year Add</label>
                    <input name="year" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $education['year'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Informations Add</label>
                    <input name="information" type="text" class="form-control" rows="5" value="<?= $education['information'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Activity Add</label>
                    <input name="activity" type="text" class="form-control" rows="5" value="<?= $education['activity'] ?>">

                    <button type="submit" name="update" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- services area -->

<?php

include "../extends/footer.php";

?>