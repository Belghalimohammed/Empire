<?php
class shipping {

protected $country;
protected $price;
    
 
public function getCountry()
{
return $this->country;
}

public function setCountry($country)
{
$this->country = $country;

return $this;
}

public function getPrice()
{
return $this->price;
}


public function setPrice($price)
{
$this->price = $price;

return $this;
}


protected function con()
{
    $dbh = new Dbh();
    return $dbh->co();
}

public function addship(){
    $sql = "insert into shipping(country,price) values (?,?) ";
    $stmt = $this->con()->prepare($sql);
    $stmt->execute([$this->country,$this->price]);
    return $stmt;
}

public function showship(){
    $sql = "select * from shipping ";
    $stmt = $this->con()->prepare($sql);
    $stmt->execute();
    $infos = $stmt->fetchAll();
    return $infos;
}

public function deleteship(){
    $sql = "delete from shipping where country like ? ";
    $stmt = $this->con()->prepare($sql);
    $stmt->execute([$this->country]);
    return $stmt;
}







}


?>