<?php
require 'dbh.php';

class Product 
{
    protected $pid;
    protected $name;
    protected $description;
    protected $price_b;
    protected $price_s;
    protected $quantity;
    protected $picture;
    protected $color;
    protected $categories;
    protected $cid;
    protected $size;
    protected $sid;



    public function getName()
    {
        return $this->name;
    }

   
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

   
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public function getPrice_b()
    {
        return $this->price_b;
    }

    public function setPrice_b($price_b)
    {
        $this->price_b = $price_b;

        return $this;
    }

    public function getPrice_s()
    {
        return $this->price_s;
    }

    public function setPrice_s($price_s)
    {
        $this->price_s = $price_s;

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

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPictures($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    
    public function setCategories($categories)
    {
        $this->categories = $categories;

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

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;

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

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function getSize()
    {
        return $this->size;
    }

    
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function addproduct(){
        $sql = "insert into product(name, description, priceb, prices, quantity_s) values (?,?,?,?, ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->name,$this->description,$this->price_b,$this->price_s,$this->quantity]);
        $id = $this->con()->lastInsertId();
        return $id;
    }

    public function getProductId()
    {
       
            $sql = "select MAX(pid) from product";
             $stmt = $this->con()->query($sql);
            $stmt->execute();
            $infos = $stmt->fetch();
            return $infos;
        
    }

    public function displayProduct($se,$c,$ca,$s)
    {
        $sql = "select product.pid,name,description,priceb,prices,quantity_s,categorie,color,color.coid,categorie.cid,image,size.size,size.sid from product inner join categories on product.pid=categories.pid inner join categorie on categorie.cid=categories.cid inner join colors on colors.pid=product.pid inner join color on color.coid=colors.cid inner join sizes on sizes.pid=product.pid inner join size on size.sid=sizes.sid inner join images on images.pid=product.pid where (product.name like '%$se%') $c $ca $s order by product.pid";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }

//select * from product inner join categories on product.pid=categories.pid inner join categorie on categorie.cid=categories.cid inner join colors on colors.pid=product.pid inner join color on color.coid=colors.cid inner join sizes on sizes.pid=product.pid inner join size on size.sid=sizes.sid

    public function getProduct()
    {
        $sql = "select product.pid,name,description,priceb,prices,quantity_s,categorie,color,color.coid,categorie.cid,image,size,size.sid  from product inner join categories on product.pid=categories.pid inner join categorie on categorie.cid=categories.cid inner join colors on colors.pid=product.pid inner join color on color.coid=colors.cid inner join images on images.pid=product.pid inner join sizes on sizes.pid=product.pid inner join size on size.sid=sizes.sid where product.pid like '$this->pid' ";
        $stmt = $this->con()->query($sql);
        $stmt->execute([]);
        $infos = $stmt->fetchAll();
        return $infos;
    }

    public function getProductforcart()
    {
        $sql = "select name,description,prices,image from product inner join images on images.pid=product.pid  where product.pid like ? ";
        $stmt = $this->con()->query($sql);
        $stmt->execute(['$this->pid']);
        $infos = $stmt->fetchAll();
        return $infos;
    }
    public function deleteproductCategories(){
        $sql = "delete from categories where pid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid]);
        return $stmt;
    }
    public function addproductcategories($cid , $pid){
        $sql = "insert into categories(cid, pid) values (? , ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$cid , $pid]);
        return $stmt;
    }

    public function countProductImages(){
        $sql = "SELECT COUNT(*) FROM images where pid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid]);
        $infos = $stmt->fetch();
        return $infos;
    }

    public function deleteproductImage(){
        $sql = "delete from images where pid = ? and image = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid , $this->picture]);
        return $stmt;
    }

    public function addproductImages($pid){
        $sql = "insert into images(pid, image) values (? , ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$pid,$this->picture]);
        return $stmt;
    }
    public function getproductImages($pid){
        $sql = "select * from images where pid like ?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$pid]);
        $infos = $stmt->fetchAll();
        return $infos;
    }
    public function deleteproductColors(){
        $sql = "delete from colors where pid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid]);
        return $stmt;
    }


    public function addproductColors($pid){
        $sql = "insert into colors(pid, cid) values (? , ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$pid, $this->color]);
        return $stmt;
    }

    public function deleteproductSizes(){
        $sql = "delete from sizes where pid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid]);
        return $stmt;
    }

    public function addproductSizes($pid){
        $sql = "insert into sizes(pid, sid) values (? , ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$pid, $this->size]);
        return $stmt;
    }

    public function deleteProduct()
    {
        $sql = "delete from product where pid = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->pid]);
        $infol = $stmt->fetch();
       return $infol;
      
    }

   
    
    public function addDispo($pid){
        $sql = "insert into disponible(pid, coid, sid , quantity) values (? , ?, ?, ?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$pid, $this->cid, $this->sid, $this->quantity]);
        return $stmt;
    }
    

    public function editProduct()
    {
        $sql = "update product set name= ?,description= ?, priceb= ?, prices= ?, quantity_s= ? where pid = ?";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->name,$this->description,$this->price_b, $this->price_s, $this->quantity, $this->pid]);
        return $stmt;
    }
   
 
   
    public function format($tab){
        $ob = array();
        $result = array();
        $cats = array();$cols=array();
        $catsin = array();$colsin=array();
        $sizes = array();$sizeid = array();
        $imgs = array();
        $j=0;
        foreach($tab as $ligne){
          
          if($ligne['pid']!==$result['pid']){
            
            if($j!=0){
              $result['categorie']=implode(",", $cats);
              $result['catid']=implode(",", $catsin);
              $result['color']=implode(",", $cols);
              $result['colid']=implode(",", $colsin);
              $result['image']=implode(",", $imgs);
              $result['size']=implode(",", $sizes);
              $result['sizeid']=implode(",", $sizeid);
              array_push($ob, $result);
            }
            $cats = array();$cols=array();
            $catsin = array();$colsin=array();
            $imgs = array();
            $sizes = array();$sizeid = array();
            $j=1;
      
            
      
            $result['pid'] = $ligne['pid'];
            $result['name'] = $ligne['name'];
            $result['quantity_s'] = $ligne['quantity_s'];
            $result['quantity_n'] = $ligne['quantity_n'];
            $result['description'] = $ligne['description'];
            $result['priceb'] = $ligne['priceb'];
            $result['prices'] = $ligne['prices'];
            array_push($cats, $ligne['categorie'])  ;
            array_push($cols,$ligne['color']);
            array_push($catsin, $ligne['cid']);
            array_push($colsin, $ligne['coid']);
            array_push($imgs,$ligne['image']);
            array_push($sizes,$ligne['size']);
            array_push($sizeid,$ligne['sid']);
            $result['edit']='<a><i  class="fas fa-edit" onclick="edit('.$ligne["pid"].')" data-toggle="modal" data-target="#sure-edit-product"></i></a>';
            $result['delete']='<i   class="fas fa-trash" onclick="delet('.$ligne["pid"].')" data-toggle="modal" data-target="#delete-product"></i>';
            
            
          }  else if(!in_array($ligne['categorie'],$cats)) {
            array_push($cats, $ligne['categorie']);
            array_push($catsin, $ligne['cid']);
          } else if(!in_array($ligne['color'],$cols)){
            array_push($cols,$ligne['color']);
            array_push($colsin, $ligne['coid']);
          }else if(!in_array($ligne['image'],$imgs)){
            array_push($imgs,$ligne['image']);
          } else if(!in_array($ligne['size'],$sizes)){
            array_push($sizes,$ligne['size']);
            array_push($sizeid,$ligne['sid']);
          }
        
        }
        $result['categorie']=implode(",", $cats);
        $result['catid']=implode(",", $catsin);
        $result['color']=implode(",", $cols);
        $result['colid']=implode(",", $colsin);
        $result['image']=implode(",", $imgs);
        $result['size']=implode(",", $sizes);
        $result['sizeid']=implode(",", $sizeid);
        array_push($ob, $result);
       
        return $ob;
      }
   

   

   
   
}

?>