<?php

class Categorie 
{

    protected $categorie;



    public function getCategorie()
    {
        return $this->categorie;
    }

    
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }


    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addcategorie(){
        $sql = "insert into categorie(categorie) values ('$this->categorie') ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([]);
        return $stmt;
    }

    public function getcategories()
    {
        $sql = "select * from categorie  ";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }

   

}


?>