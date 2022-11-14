<?php
class check 
{
    protected $id;
    protected $fprice;
    protected $cid;


    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getFprice()
    {
        return $this->fprice;
    }

 
    public function setFprice($fprice)
    {
        $this->fprice = $fprice;

        return $this;
    }

    public function getCid()
    {
        return $this->cid;
    }
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addcheck(){
        $sql = "insert into checkout(uid, fprice,cid) values (?,?,?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id,$this->fprice,$this->cid]);
        return $stmt;
    }
    public function deletecheck(){
        $sql = "delete from checkout where uid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id]);
        return $stmt;
    }

    public function getCheckId()
    {
       
            $sql = "select MAX(id) from checkout";
             $stmt = $this->con()->query($sql);
            $stmt->execute();
            $infos = $stmt->fetch();
            return $infos;
        
    }

    public function showcheck(){
        $sql = "select MAX(id) from checkout";
             $stmt = $this->con()->query($sql);
            $stmt->execute();
            $last = $stmt->fetch();
            $last = $last['MAX(id)'];
        $sql = "select * from checkout where uid = ? and id = $last";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id]);
        $infos = $stmt->fetchAll();
        return $infos;
    }



 
    
}

?>