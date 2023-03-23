<?php

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSEアプリ</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="{{ asset('webapp.css') }}">

</head>

<body>
    <header class="header">
        <div class="header_left">
            <img src="https://posse-ap.com/img/posseLogo.png" alt="" class="posse_logo">
            <p class="week">4th week</p>
        </div>
        <div class="header_right">
            <button id="modal_open" class="submit" onclick="modal_open()">記録・投稿</button>
        </div>
    </header>

    <div style="text-align: center">
        @if ($errors->any())
        <p class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach を記入してください。
        </p>
        @endif
        @if (session()->has('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session()->has('fail'))
        <p class="alert alert-danger">{{ session('fail') }}</p>
        @endif
        @if (session()->has('auth_message'))
        <p class="alert alert-danger">{{ session('auth_message') }}</p>
        @endif
    </div>
    <div class="content">
        <section class="content_left">
            <section class="cards">
                <div class="card">
                    <h2 class="card_title">Today</h2>
                    <p class="card_content">{{ $today }}</p>
                    <p class="card_unit">hour</p>
                </div>
                <div class="card">
                    <h2 class="card_title">Month</h2>
                    <p class="card_content">{{ $month }}</p>
                    <p class="card_unit">hour</p>
                </div>
                <div class="card">
                    <h2 class="card_title">Total</h2>
                    <p class="card_content">{{ $total }}</p>
                    <p class="card_unit">hour</p>
                </div>
            </section>

            <section class="bar_graph">
                <div id='chart_div' class="graph_bar"></div>
                <!-- <div class="column_cont">
                    <canvas id="column" class="column"></canvas>
                </div> -->
            </section>

        </section>

        <section class="content_right">
            <div class="right_content">
                <h2 class="right_title">学習言語</h2>
                <div id="donutchart" class="donutchart"></div>
                <div class="lang_kinds">
                    @foreach ($all_languages as $language)
                    <p class="lang1" style="background-color: {{ $language->color }}">{{$language->name}}</p>
                    @endforeach
                </div>
            </div>
            <div class="right_content">
                <h2 class="right_title">学習コンテンツ</h2>
                <div id="donutchart2" class="donutchart"></div>
                <div class="contents_kinds">
                    @foreach ($all_contents as $content)
                    <p class="one_content1" style="background-color: {{ $content->color }}">{{$content->name}}</p>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <?php $year = date('Y');
    $month = date('n');
    ?>

    <button id="page_back" class="page_back" onclick="page_back()"></button>
    <p><span id="year"><?php echo $year; ?></span>年<span class="month"><?php echo $month; ?></span>月</p>
    <button id="page_front" class="page_front" onclick="page_front()"></button>

    <div id="black_shadow" class="black_shadow"></div>

    <div class="modal" name="contactForm" id="modal">
        <form action="{{ route('add_record') }}" method="post">
            @csrf
            <button id="cancel_btn" class="cancel" type="button" onclick="cancel()">×</button>

            <div class="modal_content">
                <section class="modal_left">
                    <div class="submit__form__item">
                        <h1 class="modal_title">学習日</h1>
                        <input name="study_date" type="text" class="textbox_small" id="datepicker" required="required">
                    </div>
                    <div class="submit__form__item">
                        <dt class="modal_title">学習コンテンツ（複数選択可）</dt>
                        <dd class="check_flex">
                            @foreach ($contents_on_display as $content)
                            <input type="checkbox" name="content_value[]" value="{{ $content->id }}" id="check{{ $content->id }}" class="check">
                            <label for="check{{ $content->id }}" class="check_2"></label>
                            <label for="check{{ $content->id }}" class="check_1">{{ $content->name }}</label>
                            @endforeach
                        </dd>
                    </div>
                    <div class="submit__form__item">
                        <dt class="modal_title">学習言語（複数選択可）</dt>
                        <dd class="check_flex">
                            @foreach ($languages_on_display as $language)
                            <input type="checkbox" name="lang_value[]" value="{{ $language->id }}" class="check" id="check{{ $language->id }}">
                            <label for="check{{ $language->id }}" class="check_2"></label>
                            <label for="check{{ $language->id }}" class="check_1">{{ $language->name }}</label>
                            @endforeach
                        </dd>
                    </div>
                </section>
                <section class="modal_right">
                    <div class="submit__form__item">
                        <h1 class="modal_title">学習時間</h1>
                        <input name="study_time" type="number" step="0.1" class="textbox_small" required="required">
                    </div>
                    <div class="submit__form__item">
                        <dt><label for="Twitter_comment" class="modal_title">Twitter用コメント</label></dt>
                        <dd><textarea id="Twitter_comment" type="text" name="comment" class="big_textarea"></textarea></dd>
                    </div>
                    <input type="checkbox" name="Twitter" value="Twitterに自動投稿する" id="Twitter" class="check">
                    <label for="Twitter" class="label_parent"></label>
                    <label for="Twitter" class="label">Twitterに自動投稿する</label>
                </section>

                <div class="submit__form__footer">
                    <button id="submit__form__button" class="submit__form__button" type="submit">記録・投稿</button>
                </div>
        </form>
        <div id="loading" class="loader003"></div>
        <div id="modal3" class="modal3">
            <button id="cancel_btn3" class="cancel" onclick="cancel4()">×</button>
            <h3 class="modal3_title">AWESOME!</h3>
            <div class="big_check"></div>
            <div class="modal3_content">
                記録・投稿<br>
                完了しました
            </div>

        </div>

        <div id="error" class="error">
            <h3 class="error_title">ERROR</h3>
            <div class="exclamation"></div>
            <div class="error_content">
                一時的にご利用できない状態です。<br>
                しばらく経ってから<br>
                再度アクセスしてください
            </div>
        </div>
    </div>

    <!-- <div id="modal2" class="modal2"> -->
    <!-- <button id="cancel_btn2" class="cancel" onclick="cancel2()">×</button> -->
    <!-- <div id="loading"> -->
    <!-- </div> -->
    <!-- </div> -->


    <div id="calendar_modal" class="calendar_modal">
        <button id="cancel_btn4" class="arrow_left day_cancel" onclick="cancel3()"></button>
        <div class="calendar-container">
            <section class="day_change">
                <button id="prev" class="day_back" onclick="prev()"></button>
                <h1 id="year_date"><?php echo date('Y'); ?>年 <?php echo date('n'); ?>月</h1>
                <button id="next" class="day_front" onclick="next()"></button>
            </section>
            <table id="calendar" class="calendar">
            </table>
        </div>
        <button id="day_select" class="submit2" onclick="decide_day()">決定</button>
    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>

    <script>
        var dataset = [
            ["date", "time"],
            <?php
            foreach ($bars as $bar) {
            ?>['<?= substr($bar->study_date, 8, 2) ?>', <?= $bar->sum ?>],
            <?php
            }
            ?>
        ]
        // 1. 変数mqlにMediaQueryListを格納
        const mql = window.matchMedia('(min-width: 424px)');

        // 2. メディアクエリに応じて実行したい処理を関数として定義
        const handleMediaQuery = function(mql) {
            if (mql.matches) {
                // 424px以上の場合の処理
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.load("visualization", "1", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                        foreach ($languages as $language) {
                        ?>['<?= $language->study_language ?>', <?= $language->sum ?>],
                        <?php
                        }
                        ?>
                    ]);

                    var data2 = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                        foreach ($contents as $content) {
                        ?>['<?= $content->study_content ?>', <?= $content->sum ?>],
                        <?php
                        }
                        ?>
                    ]);

                    var options = {
                        responsive: true,
                        maintainAspectRatio: false,
                        pieHole: 0.4,
                        colors: [
                            <?php
                            foreach ($languages as $language) {
                            ?> '<?= $language->color ?>',
                            <?php
                            }
                            ?>
                        ],
                        chartArea: {
                            left: 3,
                            right: 3,
                            top: 0,
                            width: '90%',
                            height: '90%'
                        },
                        pieSliceBorderColor: 'none',
                        legend: {
                            position: 'none'
                        },
                    };
                    var options2 = {
                        responsive: true,
                        maintainAspectRatio: false,
                        pieHole: 0.4,
                        colors: [
                            <?php
                            foreach ($contents as $content) {
                            ?> '<?= $content->color ?>',
                            <?php
                            }
                            ?>
                        ],
                        chartArea: {
                            left: 3,
                            right: 3,
                            top: 0,
                            width: '90%',
                            height: '90%'
                        },
                        pieSliceBorderColor: 'none',
                        legend: {
                            position: 'none'
                        }
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);

                    var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
                    chart2.draw(data2, options2);

                    var data3 = google.visualization.arrayToDataTable(dataset);
                    var options3 = {
                        responsive: true,
                        maintainAspectRatio: false,
                        hAxis: {
                            textStyle: {
                                color: '#C0D4E3',
                            },
                            ticks: [2, 4, 6, 8, 10, 15, 20],
                            showTextEvery: 2,
                        },
                        vAxis: {
                            format: `#h`,
                            textStyle: {
                                color: '#C0D4E3',
                                fontSize: 13
                            },
                            gridlines: {
                                color: "transparent"
                            },
                            baselineColor: 'transparent',
                            showTextEvery: 2,
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 20 //値の最大表示数
                            }
                        },
                        bar: {
                            groupWidth: "55%"
                        },
                        chartArea: {
                            width: '90%',
                            height: '90%'
                        },
                        legend: {
                            position: 'none'
                        },
                    };
                    var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart3.draw(data3, options3);
                }
            } else {
                // 424px未満の場合の処理
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.load("visualization", "1", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                        foreach ($languages as $language) {
                        ?>['<?= $language->study_language ?>', <?= $language->sum ?>],
                        <?php
                        }
                        ?>
                    ]);

                    var data2 = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                        foreach ($contents as $content) {
                        ?>['<?= $content->study_content ?>', <?= $content->sum ?>],
                        <?php
                        }
                        ?>
                    ]);

                    var options = {
                        responsive: true,
                        maintainAspectRatio: false,
                        pieHole: 0.4,
                        colors: [
                            <?php
                            foreach ($languages as $language) {
                            ?> '<?= $language->color ?>',
                            <?php
                            }
                            ?>
                        ],
                        chartArea: {
                            // left: 10,
                            // right: 10,
                            top: 0,
                            width: '90%',
                            height: '90%'
                        },
                        pieSliceBorderColor: 'none',
                        legend: {
                            position: 'none'
                        },
                        width: 150,
                        height: 150,
                    };
                    var options2 = {
                        responsive: true,
                        maintainAspectRatio: false,
                        pieHole: 0.4,
                        colors: [
                            <?php
                            foreach ($contents as $content) {
                            ?> '<?= $content->color ?>',
                            <?php
                            }
                            ?>
                        ],
                        chartArea: {
                            // left: 10,
                            // right: 10,
                            top: 0,
                            width: '90%',
                            height: '90%'
                        },
                        pieSliceBorderColor: 'none',
                        legend: {
                            position: 'none'
                        },
                        width: 150,
                        height: 150,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);

                    var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
                    chart2.draw(data2, options2);

                    var data3 = google.visualization.arrayToDataTable(dataset);
                    var options3 = {
                        responsive: true,
                        maintainAspectRatio: false,
                        hAxis: {
                            textStyle: {
                                color: '#C0D4E3',
                            },
                            ticks: [2, 4, 6, 8, 10, 15, 20],
                            showTextEvery: 2,
                        },
                        vAxis: {
                            format: `#h`,
                            textStyle: {
                                color: '#C0D4E3',
                                fontSize: 13
                            },
                            gridlines: {
                                color: "transparent"
                            },
                            baselineColor: 'transparent',
                            showTextEvery: 2,
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 20 //値の最大表示数
                            }
                        },
                        bar: {
                            groupWidth: "55%"
                        },
                        chartArea: {
                            width: '90%',
                            height: '90%'
                        },
                        legend: {
                            position: 'none'
                        },
                        height: 150,
                    };
                    var chart3 = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                    chart3.draw(data3, options3);
                }
            }
        };

        // 3. イベントリスナーを追加（メディアクエリの条件一致を監視）
        mql.addListener(handleMediaQuery);

        // 4. 初回チェックのため関数を一度実行
        handleMediaQuery(mql);
    </script>


    <script src="{{ asset('webapp.js') }}"></script>
</body>

@section('body_scripts')
<script>
    // js にコントローラで定義したブレード変数を渡している
    const bar_data = @json($bar);
    const langs_data = @json($langs);
    const langs_labels = @json($langs_labels);
    const langs_colours = @json($langs_colours);
    const contents_data = @json($contents);
    const contents_labels = @json($contents_labels);
    const contents_colours = @json($contents_colours);
    const month = @json($month);
</script>
<script src="webapp.js"></script>
<script src="graphs.js"></script>
@endsection

</html>