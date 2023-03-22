<!DOCTYPE html>
<html>
    <head>
        <title>Profile Delete</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="style.css">
        <style>
            main{
                background-color: white;
            }
            body{
                background-color: white;
            }
            #r-div{
                display: flex;
                align-items:center;
                justify-content: end;
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
        <main class="column-div">
            <?php
                include_once "class.php";

                if(isset($_POST['delete'])&&$_POST['registration'])
                {
                    $user = new User();
                    $sql = "delete from trader where cellphone ='".$_POST['user']->getCellphone()."', password='".$_POST['password']."';";
                    print('<script>windows.open("index.php", "_self")</script>');
                }
            ?>
            <form action="delete-profile.php" method="post">
                <div class="row-div">
                    <p>password</p>
                    <input type="password" id="password" placeholder="enter your password" name="password">
                </div>
                <div class="row-div" id="r-div">
                    <label for="resignation" style="padding-right: 120px;"><b>Confirm resignation</b></label>
                    <input type="checkbox" name="resignation" id="resignation" style="width: 20px;">
                </div>
                <div class="row-div">
                    <button class="blue-button" type="submit" name="delete">submit</button>
                </div>
            </form>
        </main>
    </body>
</html>