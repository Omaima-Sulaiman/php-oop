<?php


class Categoty
{
private $name;
private $created;

    public function setCreated()
    {

        $date=new DateTime('2000-01-01');
        $datetime_created= $date->format('Y-m-d H:i:s');
        $this->created = $datetime_created;

    }
    function create($connection){

        $this->setCreated();
        $sql ="INSERT INTO categories (name) VALUES ('$this->name')";
        var_dump($sql);
        var_dump($connection);
        return $connection->exec($sql);
    }
    function getAll($connection){

        $sql=$connection->prepare("select name,id ,modified,created   from categories ");

        $sql->execute();
        $result =$sql->fetchALL(PDO::FETCH_ASSOC);

        return $result;


    }
//foreach (var id in myIdList)
//  {
//      var item = GetItemByQuery("SELECT * FROM TABLE WHERE ID = " + id);
//      myObjectList.Add(item);
//  }




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
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */


}