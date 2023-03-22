<!DOCTYPE html>
<html>
    <head>
        <title>Investment History</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background-color: white;
                justify-content: unset;
            }
            main{
                flex: 1;
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
            <form action="history-stock.php" method="post">
                <table>
                    <tr>
                        <th>
                            stock
                        </th>
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
                        <th>side</th>
                        <th>
                            sell price
                            <br>
                            sold shares
                        </th>
                        <th>profit/loss</th>
                    </tr>
                    <?php
                        include_once "class.php";

                        $user = new Trader('', '');
                        $sql = "select * from order where  traderId = 1";//.$user->id;
                        $result = $user->select($sql);
                        foreach($result as $element)
                        {
                            if($element['status']=='pemding')
                            {
                                echo 
                                '
                                <tr>
                                    <td>
                                        stock
                                    </td>
                                    <td>
                                        stock name
                                        <br>
                                        stock code
                                    </td>
                                    <td>
                                        buy price
                                        <br>
                                        #my shares
                                    </td>
                                    <td>side</td>
                                    <td>
                                        sell price
                                        <br>
                                        sold shares
                                    </td>
                                    <td>profit/loss</td>
                                </tr>
                                ';
                            }
                            else
                            {
                                echo 
                                '
                                <tr>
                                    <td>
                                        stock
                                    </td>
                                    <td>
                                        stock name
                                        <br>
                                        stock code
                                    </td>
                                    <td>
                                        buy price
                                        <br>
                                        #my shares
                                    </td>
                                    <td>side</td>
                                    <td>
                                        sell price
                                        <br>
                                        sold shares
                                    </td>
                                    <td>profit/loss</td>
                                </tr>
                                ';
                            }
                        }
                    ?>
                </table>
            </form>
        </main>
    </body>
</html>