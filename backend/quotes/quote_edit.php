<?php

include '../extends/header.php';

include '../../public/fonts/fonts.php';

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM quotes WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $quote = mysqli_fetch_assoc($connect);
}

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Customer Quotes Add</h4>
            </div>
            <div class="card-body">
                <form action="quote_manage.php?update=<?= $quote['id'] ?>" method="POST" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label my-2">Customer Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $quote['name'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Customer Quotes</label>
                    <textarea name="quote" type="text" class="form-control" rows="5"><?= $quote['quote'] ?></textarea>
                    <picture class="d-block my-4">
                        <img id="port_show_img" src="../../public/uploads/customer_img/<?= $quote['image'] ?>" alt="" style="width:100%; height: 300px; object-fit:contain">
                    </picture>
                    <label for="exampleInputEmail1" class="form-label my-2">Portfolio Image</label>
                    <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control" id="updateicon" aria-describedby="emailHelp">
                    

                    <button  type="submit" name="insertbtn" class="btn btn-primary mt-3"><i class="material-icons">add</i>create</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- services area -->

<?php

include "../extends/footer.php";

?>
