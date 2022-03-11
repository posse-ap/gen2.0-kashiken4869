<?php require($_SERVER['DOCUMENT_ROOT'] . "/db_connect.php");
// $id = htmlspecialchars($_GET["id"]);
// jsを書き込んだとしても、ただの文字として扱ってほしい
// prefectures

if (!isset($_GET['id'])) {
  echo "URLにidが指定されていません。";
  exit;
}

$prefecture_id = $_GET['id'];
$prefectures_value =  "SELECT * FROM prefectures WHERE id = $prefecture_id";
$prefectures = $db->query($prefectures_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);

echo ($prefectures[$id]["name"]);

// choices
$choices_value =  "SELECT * FROM choices WHERE prefecture_id = $prefecture_id";
$choices = $db->query($choices_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);

// $odai = [];
// $questions = $db->query($prefectures_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
// foreach ($questions as $question) {
//   $questionId = $question['id'];
//   $choices = $db->query($choices_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
//   $question['choices'] = $choices;
// }
// $odai = $questions;

// 恐らく$correctsの配列は不要。$choicesを使って実装が可能だと思います
$choices_corrects =  "SELECT choice0 FROM choices WHERE prefecture_id = $prefecture_id";
$corrects = $db->query($choices_corrects)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
print_r($corrects);

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
    foreach ($choices as $choice) : ?>
      <h1 class="title">
 

        .この地名はなんて読む？
      </h1>
      <div class="quiz-img-container">
        <img src="src/img/photo<? echo $prefecture_id ?>.png" alt="選択肢の写真">
      </div>
      <ul class="question__lists">
        <?php shuffle($choices) ?>
        <?php foreach ($choices as $index => $choice) { ?>
          <li class="question__list<?php if ($choice['correct'] == 1) {
                                      echo 1;
                                    } else {
                                      echo 0;
                                    } ?>">
            <?php echo $choice['name']; ?>
          </li>
      </ul>
    <?php }; ?>

    <div class="question__answer">
      <p class="question__answer__text">正解！</p>
      <p class="question__answer__text__choice">
        正解は「
        <?php
        echo ($corrects[$index]);
        ?>
        」です！
      </p>
    </div>
  <?php endforeach; ?>


  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="./timeiquiz.js"></script>
</body>

</html>