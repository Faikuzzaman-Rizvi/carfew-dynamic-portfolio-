<?php

include '../extends/header.php';

include '../../public/fonts/fonts.php';

?>

<!-- Reviews area -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Reviews Add</h4>
            </div>
            <div class="card body m-3">
            <form action="store.php" method="POST">
            <label for="exampleInputEmail1" class="form-label mt-2">Review Title</label>
            <input type="text" name="rtitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $review['title'] ?>">

            <label for="exampleInputEmail1" class="form-label mt-2">Review Description</label>
            <textarea name="rdescription" type="text" class="form-control" rows="5" value="<?= $review['description'] ?>"></textarea>

            <label for="exampleInputEmail1" class="form-label mt-2">Icon</label>
            <input type="text" name="ricon" readonly class="form-control" id="icon" aria-describedby="emailHelp" value="<?= $review['icon'] ?>">
            <div class="card mt-3">
                <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px">
                    <?php foreach($fonts as $font) : ?>
                    <span class="m-2">
                    <i onclick="myFun(event)" class="<?= $font ?>"></i>
                    <?php endforeach; ?>
                    </span>
                </div>
            </div>

            <button  type="submit" name="insertbtn" class="btn btn-primary mt-2"><i class="material-icons">add</i>create</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    $input = document.querySelector('#icon');
    function myFun(e){
        $input.value = e.target.classList.value;
    }
</script>

<!-- services area -->

<?php

include "../extends/footer.php";

?>