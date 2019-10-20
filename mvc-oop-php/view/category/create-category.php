<?php
include "../../database/Database.php";
include "../layout/header.php";
include "../../modle/Categoty.php";
$conn = new Database();
$connection=$conn->connect();
//$category=new Categoty();
//$cat = $category->getAll($connection);

?>
<form  method="post" action=<?php $_SERVER['PHP_SELF'] ?>>

  <div class="form-group">
    <label for="exampleInputPassword1">Name Category</label>
    <input name="name" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button  name="add-category" type="submit" class="btn btn-primary">Submit</button>
</form>

<!--    <table class="table table-striped table-dark">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th scope="col">#</th>-->
<!--            <th scope="col">name</th>-->
<!--            <th scope="col">modified</th>-->
<!--            >-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php
//        foreach ($cat as $row){
//            $id = $row['id'];
//            $name =$row['name'];
//
//            $created =$row['created'];
//            ?>
<!--            <tr>-->
<!--                <td>-->
<!--                 --><?php //echo $row['id'] ?>
<!--                </td>-->
<!--                <td>-->
<!--                    --><?php //echo $row['name'] ?>
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    --><?php //echo $row['modified'] ?>
<!--                </td>-->
<!--            </tr>-->
<!--      --><?php
//
//        }
//
//        ?>
<!---->
<!--        </tbody>-->
<!--    </table>-->


<?php



if (isset($_POST['add-category'])){
    $category= new Categoty();
    $category->setName($_POST['name']);
    $category->create($connection);
   }


include "../layout/footor.php";
?>