<?php

class Color 
{

    protected $color;


    public function getColor()
    {
        return $this->color;
    }

    
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }


    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addcolor(){
        $sql = "insert into color(color) values ('$this->color') ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([]);
        return $stmt;
    }

    public function getcolors()
    {
        $sql = "select * from color  ";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }

   

 
    
}


?>