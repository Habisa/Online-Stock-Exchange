<?php

session_start();

include_once "class.php";

if(isset($_POST['buy']) and isset($_POST['quantity']))
{
    //insert new order into DB
    $cellphone = $_SESSION['cellphone'];
    $password = $_SESSION['password'];
    $user = new Trader($cellphone, $password);
    $user->traderId = $_SESSION['traderId'];
    $user->placeOrder('buy', ($_POST['orderType']=='market')?'7.5':$_POST['price'], $_POST['quantity'], $_POST['orderType']);
    //$user->placeOrder(new Order(1, 'buy', $_POST['Order Type'], 'NOW()', $_POST['Order Type']=='market'?'':$_POST['7.5'], (int)$_POST['quantity'], 'default'), 7.5);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buy Stock</title>
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="search.css">

        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
        <style>
            td, th{
                font-family: 'Lucida Sans'; 
                padding: 0px;
            }
            body{
                background-color: white;
                justify-content: unset;
            }
            form{
                flex: 1;
                height: 100vh;
                border: 1px solid black
            }
            .search-div{
                margin-top: 20px;
                margin-bottom: 0px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: auto;
                margin-right: auto;
                min-width: 450px;
                max-width: 700px;
                border-radius: 25px;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
            }
            .search-button{
                border: none;
                
                background-color: white;
                padding-left: 20px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                cursor: pointer;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .search-div button img{
                width: 30px;
            }
            .search-div input{
                border: none;
                
                border-top-right-radius: 25px;
                border-bottom-right-radius: 25px;
                flex: 1;
                margin-left: -2px;
                padding-left: 10px;
            }
            textarea:focus, input:focus{
                outline: none;
            }
            #tvchart{
                height: 300px; 
                width: 98%;
                padding-top: 5px;
                padding-left: 2px;
            }
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

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
        <script type="text/javascript">
        window.onload = function () {
        var dataPoints1 = [], dataPoints2 = [];
        var stockChart = new CanvasJS.StockChart("tvchart",{
            theme: "light2",
            exportEnabled: true,
            title:{
            text:"Apple Inc."
            },
            charts: [{
            axisX: {
                crosshair: {
                enabled: true,
                snapToDataPoint: true
                }
            },
            axisY: {
                title: "Price",
                prefix: "$"
            },
            toolTip: {
                shared: true
            },
            data: [{
                name: "    Price (in USD)",
                yValueFormatString: "$#,###.##",
                type: "candlestick",
                color: "grey",
                dataPoints : dataPoints1
            }]
            }],
            navigator: {
            data: [{
                color: "grey",
                dataPoints: dataPoints2
            }]
            }
        });
        $.getJSON("http://localhost:8080/PHPCode/api.php", function(data) {
            for(var i = 0; i < data.length; i++){
            dataPoints1.push({x: new Date(data[i].date), y: [Number(data[i].open), Number(data[i].high), Number(data[i].low), Number(data[i].close)]});;
            dataPoints2.push({x: new Date(data[i].date), y: Number(data[i].close)});
            }
            stockChart.render();
        });
        }
        </script>
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
        <form action="buy-stock.php" method="post">
            <section class="top-section">
                <div>
                    <div class="search-div">
                        <button class="search-button"><img src="res/icons/search-icon.svg"></button>
                        <input type="text" placeholder="search whith stock name/code">
                    </div>
                </div>
                <div id="tvchart">
                    
                </div>
            </section>
            <section class="bottom-section" style="display: flex;">
                <div style="display: flex; justify-content:center; align-items:flex-start; flex: 1;">
                    <table>
                        <tr>
                        <th colspan="3">
                            Buy
                        </th>
                        <th colspan="3">
                            Sell
                        </th>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <th>Date Time</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date Time</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                            $user = new new Trader($_SESSION['cellphone'], $_SESSION['password']);
                            $sql1 = "select * from order where status = 'pending' and side = 'buy'";
                            $result1 = $user->select($sql);
                            $sql2 = "select * from order where status = 'pending' and side = 'sell'";
                            $result2 = $user->select($sql);
                            for($i = 0; $i < (count($result1)>count($result2)?count($result1):count($result2)); $i++)
                            {
                                echo 
                                '
                                <tr>
                                    <td>'.(($i>=count($result1))?'':$result1[$i]['price']).'</td>
                                    <td>'.(($i>=count($result1))?'':$result1[$i]['datetime']).'</td>
                                    <td>'.(($i>=count($result1))?'':$result1[$i]['quantity']).'</td>
                                    <td>'.(($i>=count($result2))?'':$result2[$i]['price']).'</td>
                                    <td>'.(($i>=count($result2))?'':$result2[$i]['datetime']).'</td>
                                    <td>'.(($i>=count($result2))?'':$result2[$i]['quantity']).'</td>
                                </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <div style="text-align: center; flex: 1;">
                    <div class="action-flexbox">
                        <p style="text-align: left;"><input type="radio" name="orderType" id="market-order" checked="checked" value="market"><label for="Market Order"> Market Order</label></p>
                        <p style="text-align: left;"><input type="radio" name="orderType" id="limit-order" value="limit"><label for="Limit Order"> Limit Order</label></p>
                        <p><input type="number" id="no-of-shares" placeholder="enter # of shares" name="quantity"></p>
                        <p><input type="number" id="price" placeholder="enter share price" name="price"></p>
                        <p style="text-align: center;"><button id="buy-button" type="submit" name="buy">buy</button></p>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>