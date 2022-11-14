<?php

class msg 
{
    protected $mid;
    protected $uid;
    protected $msg;
    protected $name;
    protected $email;
    protected $number;
    protected $time;

    public function getMid()
    {
        return $this->mid;
    }

    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

   
    public function getUid()
    {
        return $this->uid;
    }

   
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

  
    public function getMsg()
    {
        return $this->msg;
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
     
    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }

    public function addMsg()
    {
        $sql = "insert into msg(msg,name,email,number,time) values(?,?,?,?,?) ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->msg,$this->name,$this->email,$this->number,$this->time]);

        return $stmt;
    }


    public function getmsgs()
    {
        $sql = "select * from msg ";
        $stmt = $this->con()->query($sql);
        $stmt->execute();
        $infos = $stmt->fetchAll();
        return $infos;
    }





}


?>