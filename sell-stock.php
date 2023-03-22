<!DOCTYPE html>
<html>
    <head>
        <title>Investment Sell</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid black;
                margin-left: 5px;
                margin-right:5px;
            }

            th, td {
                text-align: center;
                padding: 8px;
            }
            td, th{
                font-family: 'Lucida Sans'; 
                padding: 0px;
            }
            tr:nth-child(odd) {
                background-color: #f2f2f2;
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
        <main>
            <form action="sell-stock.php" method="post">
                <table>
                    <tr>
                        <th>stock</th>
                        <th>
                            stock name
                            <br>
                            stock code
                        </th>
                        <th>
                            buy price
                            <br>
                            #my shares
                        </th>
                        <th>profit/less</th>
                        <th>order type</th>
                        <th>
                            sell shares
                            <br>
                            confirm sell
                        </th>
                    </tr>
                    <?php
                        include_once 'class.php';

                        $user = new Trader('', '');
                        $sql = "select * from order where status = 'default' and traderID = 1;";//.$user->id.";";
                        $result = $user->select($sql);
                        foreach($result as $element)
                        {
                            echo 
                            '
                            <tr>
                                <td>stock</td>
                                <td>
                                    stock name
                                    <br>
                                    stock code
                                </td>
                                <td>
                                '.$element['price'].'
                                    <br>
                                    '.$element['quantity'].'
                                </td>
                                <td>'.(7.15 - (int)$element['price']).'</td>
                                <td>'.$element['orderType'].'</td>
                                <td>
                                    <input type="number" placeholder="sell shares" name="i'.$element['id'].'"/>
                                    <br>
                                    <button type="submit" name="b'.$element['id'].'">confirm sell</button>
                                </td>
                            </tr>
                            ';
                        }
                    ?>
                </table>
            </form>
        </main>
    </body>
</html>