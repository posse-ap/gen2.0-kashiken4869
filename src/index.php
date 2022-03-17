<?php require($_SERVER['DOCUMENT_ROOT'] . "/db_connect.php");
$id = htmlspecialchars($_GET["id"]);
// jsを書き込んだとしても、ただの文字として扱ってほしい
// prefectures

if (!isset($_GET['id'])) {
  echo "何しとんねん";
  exit;
}

// URLからIDを取得
$id = $_GET['id'];


// title表示用
$title_stmt = $db->prepare("SELECT * FROM prefectures WHERE id = ?");
$title_stmt->execute(array($id));
$title = $title_stmt->fetch();

// $prefecture_id = $_GET['id'];
// $prefectures_value =  "SELECT * FROM prefectures WHERE id = $prefecture_id";
// $prefectures = $db->query($prefectures_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);

echo ($title["name"]);

// title表示用
$options_stmt = $db->prepare("SELECT * FROM choices WHERE prefecture_id = ?");
$options_stmt->execute(array($id));
$options = $options_stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>くいじー</title>
  <link rel="stylesheet" href="./timeiquiz.css">
</head>

<body>
  <div class="question">


    <?php
    foreach ($options as $option) :
    ?>

      <?php //phpのシャッフル、１・２・３がシャッフルされる
      $shuffle_num = [0, 1, 2];
      shuffle($shuffle_num);
      ?>



      <h1 class="title">

        <?php echo $option['question_id'] ?>

        .この地名はなんて読む？
      </h1>
      <div class="quiz-img-container">
        <img src="img/<?php echo $option['img']; ?>" alt="">
      </div>

      <ul id="quiz-choices<?php print($option['question_id']) ?>">
        <li id="choice<?php print($option['question_id']) ?>-<?= $shuffle_num[0] ?>" onclick="clickfunction(<?php print($option['question_id']) ?>,<?= $shuffle_num[0] ?>)"><?= $option["choice$shuffle_num[0]"]; ?></li>
        <li id="choice<?php print($option['question_id']) ?>-<?= $shuffle_num[1] ?>" onclick="clickfunction(<?php print($option['question_id']) ?>,<?= $shuffle_num[1] ?>)"><?= $option["choice$shuffle_num[1]"]; ?></li>
        <li id="choice<?php print($option['question_id']) ?>-<?= $shuffle_num[2] ?>" onclick="clickfunction(<?php print($option['question_id']) ?>,<?= $shuffle_num[2] ?>)"><?= $option["choice$shuffle_num[2]"]; ?></li>
      </ul>


      <div name="answerBoxDiv" class="answerBoxDiv" id="answerbox-div<?php print($option['question_id']) ?>">
        <h3 class="quiz-result-title"></h3>
        <p class="quiz-result-paragraph">

      </div>
    <?php endforeach; ?>


    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./kashiken.js"></script>
</body>

</html>