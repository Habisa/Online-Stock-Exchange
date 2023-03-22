<!DOCTYPE html>
<html>
    <head>
        <title>Research NewsFeeds</title>
        <link href="http://fonts.cdnfonts.com/css/coming-soon-2" rel="stylesheet">
        <link rel="stylesheet" href="home.css">
        <style>
            .my-div{
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
            main div button img{
                width: 30px;
            }
            main div input{
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
            <form action="newsfeeds-research.php" method="post">
                <div class="my-div">
                    <button class="search-button"><img src="res/icons/search-icon.svg"></button>
                    <input type="text" placeholder="search whith company name">
                </div>
                <div style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    ">
                    <table>
                        <tr>
                            <th style="
                                width: 200px;
                                ">
                                image
                            </th>
                            <th style="
                                width: 200px;
                                ">
                                title as link
                                <br>
                                datetime
                            </th>
                            <th style="
                                width: 400px;
                                ">
                                content
                            </th>
                        </tr>
                    </table>
                </div>
            </form>
        </main>
    </body>
</html>