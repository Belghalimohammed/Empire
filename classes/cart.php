<?php
class Cart 
{
    protected $pid;
    protected $coid;
    protected $sid;
    protected $quantity;
    protected $id;
    protected $pic;
    protected $cartid;

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    
    public function getCoid()
    {
        return $this->coid;
    }

    public function setCoid($coid)
    {
        $this->coid = $coid;

        return $this;
    } 
    public function getSid()
    {
        return $this->sid;
    }

    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    
    public function getQuantity()
    {
        return $this->quantity;
    }

    
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
    public function getPic()
    {
        return $this->pic;
    }

    public function setPic($pic)
    {
        $this->pic = $pic;

        return $this;
    }

    public function getCartid()
    {
        return $this->cartid;
    }

    public function setCartid($cartid)
    {
        $this->cartid = $cartid;

        return $this;
    }

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addtocart(){
        $sql = "insert into cart(pid, id, quantity, coid, sid,pic) values (?,?,?,?, ?,?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid,$this->id,$this->quantity,$this->coid,$this->sid,$this->pic]);
      
        $sql = "select MAX(cartid) from cart";
        $stmt = $this->con()->query($sql);
       $stmt->execute();
       $infos = $stmt->fetch();
       return $infos;
    }

    public function showcart(){
        $sql = "select cartid,cart.quantity,color.color,size.size,product.name,product.prices,product.description,pic from cart inner join product on product.pid=cart.pid inner join color on color.coid=cart.coid inner join size on size.sid=cart.sid where id = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->id]);
        $infos = $stmt->fetchAll();
        return $infos;
    }

    public function deletefromcart(){
        $sql = "delete from cart where cartid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->cartid]);
        return $stmt;
    }
   
  

  
}

?>