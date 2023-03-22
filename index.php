<?php


include_once "class.php";


session_start();

if(isset($_POST["sign-in"]))
{
    $user = new User('', '', '');
    if($user->signIn($_POST['cellphone'], $_POST['password']))
    {
        $cellphone = $_POST['cellphone'];
        $password = $_POST['password'];
        $_SESSION['cellphone'] = $cellphone;
        $_SESSION['password'] = $password;
        $sql = "select * from trader where password = '".$password."' and cellphone = '".$cellphone."';";
        //$traderId = 
        foreach($user->select($sql) as $element)
        {
            $traderId = $element['traderId'];  
        }
        $_SESSION['traderId'] = $traderId;
        echo '<script>window.open("'.(($user->userType=='trader')?'buy-stock.php':'addparticipants.php').'","_self");</script>';
    }
    else
    {
        echo '<script>alert("sign in failed")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                justify-content: center;
                background-color: rgba(114, 114, 114, 0.541);
            }
        </style>
    </head>
    <body>
        <form action="index.php" method="post">
            <main class="white-flex-box-div">
                <div class="title-div">
                    <h3>Bidding Platform</h3>
                    <img src="res/icons/logo-icon.svg" alt="logo icon">
                </div>
                <div class="column-div">
                    <div class="row-div">
                        <p>cell phone</p>
                        <input type="number" id="cellphone" placeholder="enter your cellphone number" name="cellphone">
                    </div>
                    <div class="row-div">
                        <p>password</p>
                        <input type="password" id="password" placeholder="enter your password" name="password">
                    </div>
                    <div class="row-div">
                        <button class="blue-button" name="sign-in">sign-in</button>
                        <p><a href="sign-up.php">sign-up</a></p>
                    </div>
                </div>
            </main>
        </form>
    </body>
</html>