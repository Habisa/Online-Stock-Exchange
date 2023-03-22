<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background-color: rgba(114, 114, 114, 0.541);
            }
        </style>
    </head>
    <body>
        <?php
            include_once "class.php";

            if(isset($_POST['sign-up']))
            {
                $user = new Trader();
                $user->setCellphone($_POST['cellphone']);
                $user->setPassword($_POST['password']);
                $user->userType = 'trader';
                if($user->signUp($_POST['re-password']))
                {
                    echo '<script>alert("succesful sign up")</script>';
                }
                else
                {
                    echo '<script>alert("failed sign up")</script>';
                }
            }
        ?>
        <form action="sign-up.php" method="post">
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
                        <p>re-password</p>
                        <input type="password" id="re-password" placeholder="re-enter your password" name="re-password">
                    </div>
                    <div class="row-div">
                        <button class="blue-button" name="sign-up" type="submit">sign-up</button>
                        <p><a href="index.php">sign-in</a></p>
                    </div>
                </div>
            </main>
        </form>
    </body>
</html>