<?php


class User {
        protected $id;
        protected $user;
        protected $pass;
        protected $fname;
        protected $age;
        protected $email;
        protected $prpic;
        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

        }
        public function getUser()
        {
                return $this->user;
        }
        public function setUser($user)
        {
                $this->user = $user;
          }

        public function getPass()
        {
                return $this->pass;
        }

      
        public function setPass($pass)
        {
                $this->pass = $pass;
         }

        public function getFname()
        {
                return $this->fname;
        }

        public function setFname($fname)
        {
                $this->fname = $fname;
         }

        public function getAge()
        {
                return $this->age;
        }

        public function setAge($age)
        {
                $this->age = $age;
        }

        public function getEmail()
        {
                return $this->email;
        }
 
        public function setEmail($email)
        {
                $this->email = $email;
     }

     public function getPrcic()
     {
             return $this->prpic;
     }

     public function setPrpic($prpic)
     {
             $this->prpic = $prpic;

     }

    protected function con()
    {
        $dbh = new Dbh();
        return $dbh->co();
    }
    //--------------------------login-----------------
    public function login()
    {

            $sql = "select * from users where user= ?  and pass= ?";
            $stmt = $this->con()->prepare($sql);
            $stmt->execute([$this->user,$this->pass]);
            $count = $stmt->rowCount();
           return $count;
    }
     //---------------------get the id of a usernn-----------------
     public function getUserIdd($id)
     {
      
         
         $sql = "SELECT * FROM users where user = ? ";
         $stmt = $this->con()->prepare($sql);
         $stmt->execute([$id]);
     while($row = $stmt->fetch())
         { $uid= $row['id'];  }
         return $uid;
     }
    //---------------------get the id of a user-----------------
    public function getUserId()
    {
       $id = $_SESSION['mylogin'];
        
        return $id;
    }
    //----------------------get the full name of a user------------------
    public function getFullname()
    {
        $id = $_SESSION['mylogin'];
        $sql = "SELECT * FROM users where id = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
    while($row = $stmt->fetch())
        { $fn= $row['fullname'];  }
        return $fn;
    }
//----------------------get user------------------
public function getAllUser($id)
{
    $sql = "SELECT * FROM users where id = ? ";
    $stmt = $this->con()->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch();
    return $data;
}
    //---------------------------------get Username of a user-------------
    public function getUsername()
    {
        $id = $_SESSION['mylogin'];
        $sql = "SELECT * FROM users where id = ? ";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$id]);
    while($row = $stmt->fetch())
        { $fn= $row['user'];  }
        return $fn;
    }
    //----------------------------register------------------
    public function register()
    {
            $sql = "insert into users(user, pass, fullname, email)"
                . "values('$this->user', '$this->pass', '$this->fname', '$this->email') ";
            $stmt = $this->con()->prepare($sql);
            $stmt->execute([]);
            return $sql;
         }

         // ------------------ edit profile----------------------------------
    public function editProfile()
    {
        $id = $_SESSION['mylogin'];
        $sql = "update users set user= ?,pass= ?, email= ?, fullname= ?, age= ? where id = $id";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->user,$this->pass,$this->email, $this->fname, $this->age]);
        return $stmt;
        
    }
    //--------------------profile pic------------------------
    public function editUserPic()
    {
        $id = $_SESSION['mylogin'];
        $sql = "update users set  prpic= ? where id = $id";
        $stmt = $this->con()->prepare($sql);
        $stmt->execute([$this->prpic]);
        return $stmt;
    }
        
}