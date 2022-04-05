<?php
// tableとの接続
require('./setting.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webapp</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="webapp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">

</head>

<body>
    <header>
        <div class="all-header">
            <div class="left-header">
                <h1 class="posseLogo">
                    <img src="./img/posselogo.jpg" alt=Eロゴ">
                </h1>
                <p>4th week</p>
            </div>
            <div class="right-header">
                <a class="modal-open" href="">記録・投稿</a>
            </div>
            <div class="modal js-modal">
                <div class="modal__bg modal-close"></div>
                <div class="modal-all">
                    <div class="modal__content" id="modal__content">
                        <div class="date-and-contents">
                            <div class="date-container">
                                <h2>学習日</h2>
                                <!-- <input class="flatpickr" type="text" placeholder="Select Date.." readonly="readonly"> -->
                                <input name="date" type="date" />
                            </div>
                            <div class="check-list">
                                <h2>学習コンテンツ（複数選択可）</h2>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    N予備校
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    ドットインストール
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    POSSE課題
                                </label>
                            </div>
                            <div class="check-list">
                                <h2>学習言語（複数選択可）</h2>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    HTML
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    CSS
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    JavaScript
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    PHP
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    Laravel
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    SQL
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    SHELL
                                </label>
                                <label>
                                    <input type="checkbox" class="checkbox">
                                    <span class="checkbox-fontas"></span>
                                    情報システム基礎知識(その他)
                                </label>
                            </div>
                            <!-- <span class="round_btn modal-close"></span> -->
                        </div>
                        <div class="modal-right-down">
                            <div class="study-time">
                                <h2>学習時間</h2>
                                <input type="number">
                            </div>
                            <div class="twitter-comment">
                                <h2>Twitter用コメント</h2>
                                <input id="tweetContext" type="text">
                                <!-- <textarea name="twitter" id="tweetContext" type="text"></textarea> -->
                                <label>
                                    <input type="checkbox" id="tweet" class="checkbox2">
                                    <span id="tweet" class="checkbox-fontas2"></span>
                                    Twitterに自動投稿する
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-container" id="modal-container">
                        <span id="TWEET">
                            <a class="button modal-open2" href="https://twitter.com/intent/tweet?text="
                                target="_blank">記録・投稿</a>
                        </span>
                    </div>
                    <!-- <div id="loading" class="loader">Loading...</div> -->
                    <div class="blind" id="loading">
                        <div class="loader"></div>
                    </div>
                    <div class="complete">
                        <h1 class="complete_title">AWESOME!</h1>
                        <div class="complete_check"></div>
                        <div class="complete_circle"></div>
                        <h1 class="complete_msg">記録・投稿<br>完了しました</h1>
                    </div>
                </div>
                <!--modal__inner-->
            </div>
            <!--modal-->
        </div>
    </header>
    <div class="all-container">
        <!-- <div> -->
        <div class="time-container">
            <div class="number-container">
                <div class="each-number">
                    <p class="first-script">Today</p>
                    <p class="number">3</p>
                    <p class="hour">hour</p>
                </div>
                <div class="each-number">
                    <p class="first-script">Month</p>
                    <p class="number">120</p>
                    <p class="hour">hour</p>
                </div>
                <div class="each-number">
                    <p class="first-script">Total</p>
                    <p class="number">1348</p>
                    <p class="hour">hour</p>
                </div>
            </div>
            <div class="time-graph">
                <div id="column"></div>
                <!-- <img src="./img/time-graph.png" alt=""> -->
            </div>
        </div>
        <div class="circle-container">
            <div class="each-circle">
                <h2 class="circle-title">学習言語</h2>
                <div id="donutchart-1"></div>
                <div class="legend-contents">
                    <div>
                        <div class="legend-circle"></div>
                        <p>JavaScript</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>CSS</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>PHP</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>HTML</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>Laravel</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>SQL</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>SHELL</p>
                    </div>
                    <div>
                        <div class="legend-circle"></div>
                        <p>情報システム</p>
                    </div>
                    <!-- <p>CSS</p>
                    <p>PHP</p>
                    <p>HTML</p>
                    <p>Laravel</p>
                    <p>SQL</p>
                    <p>SHELL</p>
                    <p></p> -->
                </div>
            </div>
            <div class="each-circle">
                <h2 class="circle-title">学習コンテンツ</h2>
                <div id="donutchart-2"></div>
                <div class="legend-contents">
                    <p><span>ドットインストール</span></p>
                    <p><span>N予備校</span></p>
                    <p><span>POSSE課題</span></p>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <script src="webapp2.js"></script>
</body>

</html>