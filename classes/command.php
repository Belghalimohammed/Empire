<?php

class Command 
{
    protected $cartid;
    protected $fname;
    protected $adresse;
    protected $code;
    protected $country;
    protected $nb;
    protected $date;
    protected $paytype;
    protected $id;
    protected $done;
    
   
    public function getCartid()
    {
        return $this->cartid;
    }

    public function setCartid($cartid)
    {
        $this->cartid = $cartid;

        return $this;
    }

    public function getFname()
    {
        return $this->fname;
    }
 
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getNb()
    {
        return $this->nb;
    }

    public function setNb($nb)
    {
        $this->nb = $nb;

        return $this;
    }
    
  
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    public function getPaytype()
    {
        return $this->paytype;
    }

    public function setPaytype($paytype)
    {
        $this->paytype = $paytype;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDone()
    {
        return $this->done;
    }

    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

     public function addCommand(){
        $sql = "insert into command(cid, fname, adresse, code, pays,numero, date,paytype,id) values (?,?,?,?, ?,?,?,?,?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->cartid,$this->fname,$this->adresse,$this->code,$this->country,$this->nb,$this->date,$this->paytype,$this->id]);
        return $stmt;
    }

    public function deleteCommand(){
        $sql = "delete from command where commandid = ?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id]);
        return $stmt;
    }

    public function displayCommand()
    {
        $sql = "select commandid,date,paytype,product.name,size.size,color.color,product.prices,cart.quantity from command inner join cart on cart.cartid=command.cid inner join product on product.pid=cart.pid inner join color on color.coid=cart.coid inner join size on size.sid=cart.sid";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }

    
    public function getCommand($se)
    {
        $sql = "select commandid,adresse,country,fname,code,numero from command  inner join shipping on shipping.shipid=command.pays where commandid = $se ";
        $stmt = $this->con()->query($sql);
        $stmt->execute([]);
        $infos = $stmt->fetch();
        return $infos;
    }

    public function done()
    {
        $sql = "insert into deliver(cid,done) values(?,?)";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id,$this->done]);
        return $stmt;
    }

    
   
}

?>