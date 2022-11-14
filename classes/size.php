<?php
class Size 
{

    protected $size;


    public function getSize()
    {
        return $this->size;
    }

    
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
  


    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addsize(){
        $sql = "insert into size(size) values ('$this->size') ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([]);
        return $stmt;
    }

    public function getsizes()
    {
        $sql = "select * from size  ";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }

   

 
    

}


?>