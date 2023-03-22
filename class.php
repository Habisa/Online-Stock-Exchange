<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;
    
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "biddingplatform";
    }
    public function select($sql)
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $results = $this->conn->query($sql);
        $this->conn->close();
        return $results;
    }
    public function insert($sql)
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        if ($this->conn->query($sql) === TRUE) {
            //echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
          }
        $this->conn->close();
        return;
    }
    public function update($sql)
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
        }
        if ($this->conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $this->conn->error;
        }

        $this->conn->close();
    }
    public function delete($sql)
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        if ($this->conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
          }
        $this->conn->close();
        return;
    }
}
class User extends Database
{
    private $cellphone;
    private $password;
    public $userType;
    public $id;



    public function __construct($cellphone, $password, $userType)
    {
        parent::__construct();
        $this->cellphone = $cellphone;
        $this->password = $password;
        $this->userType = $userType;
    }
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }
    public function getCellphone()
    {
        return $this->cellphone;
    }
    public function setPassword($passsword)
    {
        $this->password = $passsword;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function signIn($cellphone, $password)
    {
        //check user credentials return true if correct
        $sql = "select * from ";
        $this->userType = "trader";
        for($i = 0; $i < 2; $i++)
        {
            $arr = $this->select($sql.$this->userType);
            foreach($arr as $element)
            {
                if(($cellphone == $element['cellphone']) and ($password == $element['password']))
                {
                    $user = new User($cellphone, $password, $this->userType);
                    $_SESSION['user'] = $user;
                    return true;
                }
            }
            $this->userType = 'broker';
        }
        return false;
    }
    public function updateProfile($newcellphone, $newpassword)
    {
        //connect to DB and modify data corresponding to current user
        $sql = "update cellphone, password from ".$this->userType." set cellphone = ".$newcellphone."password = ".$newpassword." where cellphone = ".$this->getCellphone()." and password = ".$this->getPassword().";";
        $this->setCellphone($newcellphone);
        $this->setPassword($newpassword);
        $this->update($sql);
    }
    public function deleteProfile()
    {
        //delete your from DB
        $sql = "delete from ".$this->userType." where cellphone = ".$this->getCellphone()." and password = ".$this->getPassword().";";
        $this->delete($sql);
    }
    public function search($key, $list)
    {
        //searh key from list arr
        $similar = 0;
        $similarStr = '';
        foreach($list as $element)
        {
            if($similar<similar_text($key, $element))
            {
                $similar = similar_text($key, $element);
                $similarStr = $element;
            }
        }
        return $similarStr;
    }
    public function veiwNewsfeeds()
    {
        //open newsfeeds page
    }
}

trait Order
{
    public $orderId;
    public $side;
    public $orderType;
    public $datetime;
    public $price;
    public $quantity;
    public $status;
    public $traderId;
    
    public function __construct($orderId, $traderId, $side, $orderType, $datetime, $price, $quantity, $status)
    {
        $this->$orderId = $orderId;
        $this->$traderId = $traderId;
        $this->$side = $side;
        $this->$orderType = $orderType;
        $this->$datetime = $datetime;
        $this->$price = $price;
        $this->$quantity = $quantity;
        $this->status = $status;
    }
}

class order1{
    use order;
}

class Trader extends User
{
    use Order;
    public $balance = 0;
    public $traderId;

    public function __construct($cellphone, $password)
    {
        parent::__construct($cellphone, $password, 'trader');
    }
    public function signUp($repassword)
    {
        //check if pass match then insert new users
        if($this->getPassword()==$repassword)
        {
            $sql = "insert into trader (cellphone, password, balance) values('".$this->getCellphone()."','".$this->getPassword()."', '0')";
            $this->insert($sql);
            return true;
        }
        else
        {
            print('alert("Password mis match")');
            return false;
        }
    }
    public function deposit($amount)
    {
        //increment user balance by $amount
    }
    public function withdraw($amount)
    {
        //decrement user balance by $amount
    }
    public function marketPrice($name)
    {
        //get current stock price using API
    }
    public function placeOrder($side, $price, $quantity, $orderType)
    {
        $order = new order1(1, $this->traderId, $side, $orderType, 'NOW()', $price, $quantity, 'default');
        if($order->side == 'buy')
        {
            if($order->price > $this->balance)
            {
                echo '<script>alert("Insufficient Fund");</script>';
                return;
            }
        }
        
        $sql = "insert into `order` (`side`, `orderType`, `datetime`, `price`, `quantity`, `traderId`, `status`) "
        ."values('buy', '".$orderType."', NOW(), '".$price."', '".$quantity."', '".$this->traderId."', 'pending');";
        $this->insert($sql);
    }
    public function cancelOrder($orderId)
    {
        //update order set status to cancel at id
    }
}
class Broker extends User
{
    public function __construct()
    {
        parent::__construct('', '', 'broker');
    }
    public function addParticipant($cellphone, $password)
    {
        //insert new user into DB
        $newUser = new User($cellphone, $passsword, 'broker');
        $sql = "insert (cellphone, password, userType) into broker values('".$newUser->getCellphone()."', '".$newUser->getPassword()."', '".$newUser->userType."');";
        $this->insert($sql);
    }
    public function removeParticipant($cellphone, $userType)
    {
        //delete user from db
        $sql = "delete from ".$userType." where cellphone = '".$cellphone."';";
        $this->delete($sql);
    }
    public function updateUser($id, User $user)
    {
        //update user data at id
    }
}
?>