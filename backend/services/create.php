<?php

include "../extends/header.php";

include "../../public/fonts/fonts.php";

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Services Add</h4>
            </div>
            <div class="card body m-3">
            <form action="store.php" method="POST">
            <label for="exampleInputEmail1" class="form-label mt-2">Service Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            <label for="exampleInputEmail1" class="form-label mt-2">Service Description</label>
            <textarea name="description" type="text" class="form-control" rows="5"></textarea>

            <label for="exampleInputEmail1" class="form-label mt-2">Icon</label>
            <input type="text" name="icon" readonly class="form-control" id="iconupdate" aria-describedby="emailHelp">
            <div class="card mt-3">
                <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px">
                    <?php foreach($fonts as $font) : ?>
                    <span class="m-2">
                    <i onclick="myFun(event)" class="<?= $font ?>"></i>
                    <?php endforeach; ?>
                    </span>
                </div>
            </div>

            <button  type="submit" name="insert" class="btn btn-primary mt-2"><i class="material-icons">add</i>create</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    $input = document.querySelector('#iconupdate');
    function myFun(e){
        $input.value = e.target.classList.value;
    }
</script>


<?php

include "../extends/footer.php";

?>