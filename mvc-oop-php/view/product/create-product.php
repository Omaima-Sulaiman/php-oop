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


<form method="Post" action="<?php $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input  name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

  </div>

    <div class="form-group">
        <label for="exampleInputPassword3">Description</label>
        <input name='description'  class="form-control" id="exampleInputPassword3" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">price</label>
        <input name='price'  class="form-control" id="exampleInputPassword2" >
    </div>
    <div>
       <label for="exampleInputPassword1">Category</label>
    <select  name='category_id' class="custom-select">

        <?php
        foreach ($cat  as $row){
            $id = $row['id'];
            $name =$row['name'];
            echo"<option value= $id class =' text-captalize'>$name</option>";
        }
        ?>
    </select>
    </div>
    <button name ="add" type="submit" class="btn btn-primary">Submit</button>
</form>




<?php

if (isset($_POST['add'])){


    $product= new Product();
    $product->setName($_POST['name']);

    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $product->setCategoryId($_POST['category_id']);
    $product->create($connection);

}


include "../layout/footor.php";
?>