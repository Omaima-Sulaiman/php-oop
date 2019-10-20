<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../modle/Product.php";
include "../../modle/Categoty.php";
$conn = new Database();
$connection=$conn->connect();
$category=new Categoty();
$cat = $category->getAll($connection);
?>
<?php

if (isset($_GET['id'])) {
    $UPD = $_GET['id'];
$update = new Product();
$re=$update->update($connection,$UPD);
}

?>
<?php
//    foreach ($result as $row){

?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input  name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value =<?php  echo $re['name']?> >

        </div>

        <div class="form-group">
            <label for="exampleInputPassword3">Description</label>
            <input name='description'  class="form-control" id="exampleInputPassword3" value =<?php  echo $re['description']?>>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">price</label>
            <input name='price'  class="form-control" id="exampleInputPassword2" value =<?php  echo $re['price']?> >
        </div>
        <div>
            <label for="exampleInputPassword1">Category</label>
            <select  name='category_id' class="custom-select" value =<?php  echo $re['category_id']?>>

                <?php
                foreach ($cat  as $row){
                    $id = $row['id'];
                    $name =$row['name'];
                    echo"<option value= $id class =' text-captalize'>$name</option>";
                }
                ?>
            </select>
        </div>
        <button name ="edit" type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php //} ?>


<?php

//if(isset($_POST['edit'])){
//$product=new Product ();
//$product->setName($_POST['name']);
//$product->setDescription($_POST['description']);
//$product->setPrice($_POST['price']);
//$product->setCreated($_POST['created']);

//$product->update($connection,$id);
//}
?>

<?Php

include "../layout/footor.php";
?>

