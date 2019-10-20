<?php


class Product
{    private $id;
     private $name;
    private $description;
    private $created;
    private $price;
    private $category_id;

    /**
     * @return mixed
     */


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreated()
    {

        $date=new DateTime('2000-01-01');
        $datetime_created= $date->format('Y-m-d H:i:s');
        $this->created = $datetime_created;

    }
    function create($connection){

           $this->setCreated();
        $sql ="INSERT INTO products (name,description,category_id,price) VALUES ('$this->name','$this->description',$this->category_id,$this->price)";
        var_dump($sql);
        var_dump($connection);

        return $connection->exec($sql);


    }

    function getAllProduct($connection){

        $sql=$connection->prepare("select * from products ");

        $sql->execute();
        $result =$sql->fetchALL(PDO::FETCH_ASSOC);

        return $result;


    }
     function  deleteProduct($connection,$id){
        $id =$_GET['id'];
        $sql="DELETE FROM products WHERE id=:id";
        $result=$connection->prepare($sql);
         $result->bindValue(":id",$id);
         $result->execute();

     }

     function update($connection,$id)
     {
         $id = $_GET['id'];
         $sql = "SELECT * FROM products WHERE id=:id";
         $result = $connection->prepare($sql);
         $result->bindValue(":id", $id);
         $result->execute();
         $re = $result->fetch(PDO::FETCH_ASSOC);
         return $re;

     }
//         $sql=$connection->prepare("UPDATE products SET name='$this->name', description='$this->description', price=$this->price
// WHERE id=$id;");
//       $sql->bindValue(":id",$id);
//         $sql->execute();
//         $result =$sql->fetchALL(PDO::FETCH_ASSOC);

//         return $result;

//    function  updateProduct($connection,$id,$fields){
//
//        $st="";
//        $counter=1;
//        $total_fields=count($fields);
//        foreach ($fields as $key= $value){
//
//        }
//    }



    /**sx
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */


    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}
