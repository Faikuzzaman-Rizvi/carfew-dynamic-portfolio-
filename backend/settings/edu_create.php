<?php

include '../extends/header.php';


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Education Informations Add</h4>
            </div>
            <div class="card-body">
                <form action="settings_manage.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Year Add</label>
                    <input name="year" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label my-2">Informations Add</label>
                    <input name="information" type="text" class="form-control" rows="5"> </input>

                    <button type="submit" name="insert" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- services area -->

<?php

include "../extends/footer.php";

?>