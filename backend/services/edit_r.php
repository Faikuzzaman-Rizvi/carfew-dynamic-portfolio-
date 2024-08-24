<?php

include '../extends/header.php';

include '../../public/fonts/fonts.php';


if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM reviews WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $reviews = mysqli_fetch_assoc($connect);
}


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Reviews Add - <?= $reviews['title'] ?></h4>
            </div>
            <div class="card-body">
                <form action="store.php?update=<?= $reviews['id'] ?>" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Reviews Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $reviews['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Reviews Description</label>
                    <textarea name="description" type="email" class="form-control" rows="5"> <?= $reviews['description'] ?> </textarea>
                    <label for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input name="icon" type="text" readonly class="form-control" id="updateicon" aria-describedby="emailHelp" value="<?= $reviews['icon'] ?>">
                    <div class="card my-2">
                        <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px;">
                            <?php foreach ($fonts as $font): ?>
                                <span class="m-2">
                                    <i onclick="myFun(event)" class="<?= $font ?>"></i>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $input = document.querySelector('#updateicon');

    function myFun(e) {
        $input.value = e.target.classList.value;
    }
</script>

<?php

include '../extends/footer.php';

?>