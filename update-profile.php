<!DOCTYPE html>
<html>
    <head>
        <title>Profile Update</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="style.css">
        <style>
            main{
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }
            body{
                background-color: white;
            }
            .column-div{
                border: none;
            }
            .blue-button{
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="title-div">
                <h3>Bidding Platform</h3>
                <img src="res/icons/white-logo-icon.svg" alt="logo icon">
            </div>
            <hr>
            <div class="balance-div">
                <img src="res/icons/balance-icon.svg" alt="balance icon">
                <h4>R 100</h4>
            </div>
            <div class="white-flexbox">
                <div class="left-section">
                    <h4>Profile</h4>
                </div>
                <div class="right-section">
                    <button>Update</button>
                    <button>Delete</button>
                </div>
            </div>
            <div class="white-flexbox">
                <div class="left-section">
                    <h4>Investment</h4>
                </div>
                <div class="right-section">
                    <button>Buy</button>
                    <button>Sell</button>
                    <button>History</button>
                </div>
            </div>
            <div class="white-flexbox">
                <div class="left-section">
                    <h4>Transections</h4>
                </div>
                <div class="right-section">
                    <button>Deposit</button>
                    <button>Withdraw</button>
                </div>
            </div>
            <div class="white-flexbox">
                <div class="left-section">
                    <h4>Research</h4>
                </div>
                <div class="right-section">
                    <button>News Feeds</button>
                </div>
            </div>
            <div class="log-out-div">
                <a href="index.html"><img src="res/icons/logout-icon.svg" alt="logout icon"></a>
            </div>
        </nav>
        <?php
            include_once "class.php";

            if(isset($_POST['submit'])&&($_POST['password']==$_POST['re-password']))
            {
                $sql = "update trader set cellphone = '".$_POST['cellphone']."', password = '".$_POST['password']."'"
                ." where cellphone = '".$_POST['oldcellphone']."';";
                $user = new Trader('', '');
                $user->update($sql);
            }
        ?>
        <form action="update-profile.php" method="post">
            <main>
                <section class="column-div">
                    <div class="row-div">
                        <p>new cell phone</p>
                        <input type="number" id="cellphone" placeholder="enter your new cellphone number" name="cellphone">
                    </div>
                    <div class="row-div">
                        <p>new password</p>
                        <input type="password" id="password" placeholder="enter your new password" name="password">
                    </div>
                    <div class="row-div">
                        <p>new re-password</p>
                        <input type="password" id="re-password" placeholder="re-enter your new password" name="re-password">
                    </div>
                </section>
                <section class="column-div">
                    <div class="row-div">
                        <p>old cell phone</p>
                        <input type="number" placeholder="enter your old cellphone number" name="oldcellphone">
                    </div>
                    <div class="row-div">
                        <p>old password</p>
                        <input type="password" placeholder="enter your old password">
                    </div>
                    <div class="row-div">
                        <button class="blue-button" type="submit" name="submit">submit</button>
                    </div>
                </section>
            </main>
        </form>
    </body>
</html>