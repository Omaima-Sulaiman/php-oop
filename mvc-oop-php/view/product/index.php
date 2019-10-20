<?php

include "../../database/Database.php";
include "../layout/header.php";
include "../../modle/Product.php";
include "../../modle/Categoty.php";
$conn = new Database();
$connection=$conn->connect();
$category=new Categoty();
$cat = $category->getAll($connection);
$getProduct = new Product();
$get= $getProduct->getAllProduct($connection);

?>
<?php
if (isset($_GET['id'])){
    $id =$_GET['id'];
$delete= new Product();
$delete->deleteProduct($connection,$id);
}
?>
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">price</th>
        <th scope="col">category_id</th>
        <th scope="col">modified</th>
        <th scope="col">action</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($get as $row){
        $id = $row['id'];
        $name =$row['name'];
        $description=$row['description'];
        $price=$row['price'];
        $category_id=$row['category_id'];
        $modified=$row['modified'];
        ?>
        <tr>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['name'] ?>
            </td>

            <td>
                <?php echo $row['description'] ?>
            </td>
            <td>
                <?php echo $row['price'] ?>
            </td>
            <td>
                <?php echo $row['category_id'] ?>
            </td>
            <td>
                <?php echo $row['modified'] ?>
            </td>
            <td>
                <a href="edit.php ?id=<?php echo $row['id'] ?>"

                   class="btn btn-info">edit</a>
                <a href="index.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">delete</a>
            </td>
        </tr>
        <?php

    }

    ?>

    </tbody>
</table>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE FROM Products WHERE id=$id";
    if($connection->query($sql)){
        $_SESSION['message'] = "Address deleted!";
    }
}

?>
<?php

include "../layout/footor.php";
?>
