var question_list = new Array();
question_list.push(['たかなわ', 'こうわ', 'たかわ']);
question_list.push(['かめいど', 'かめと', 'かめど']);
question_list.push(['こうじまち', 'おかとまち', 'かゆまち']);
question_list.push(['おなりもん', 'おかどもん', 'ごせいもん']);
question_list.push(['とどろき', 'たたら', 'たたりき']);
question_list.push(['しゃくじい', 'いじい', 'せきこうい']);
question_list.push(['ぞうしき', 'ざっしき', 'ざっしょく']);
question_list.push(['おかちまち', 'みとちょう', 'ごしろちょう']);
question_list.push(['ししぼね', 'ろっこつ', 'しこね']);
question_list.push(['こぐれ', 'こばく', 'こしゃく']);



// クリック時の処理
// question_id：問題番号
// selection_id：回答番号、選択された選択肢の番号を受け取る
// valid_id：正解番号、正解の選択肢の番号を受け取る
function check(question_id, selection_id, valid_id) {

    // クリック無効化
    var answerlists = document.getElementsByName('answerlist_' + question_id);
    answerlists.forEach(answerlist => {
        answerlist.style.pointerEvents = 'none';
    });

    // 選択項目のスタイル設定処理
    // 選択された選択肢の背景色をオレンジ、正解の選択肢を水色に設定
    // 選択された選択肢が正解だった場合は水色で上書きする
    var selectiontext = document.getElementById('answerlist_' + question_id+ '_' + selection_id);
    var validtext = document.getElementById('answerlist_' + question_id + '_' + valid_id);
    selectiontext.className = 'answer_invalid';
    validtext.className = 'answer_valid';

    // 正解・不正解の表示設定処理
    var answerbox = document.getElementById('answerbox_' + question_id);
    var answertext = document.getElementById('answertext_' + question_id);
    if (selection_id == valid_id) {
        answertext.className = 'answerbox_valid';
        answertext.innerText = '正解！';
    } else {
        answertext.className = 'answerbox_invalid';
        answertext.innerText = '不正解！';
    }
    answerbox.style.display = 'block';
}

// 問題分のHTMLを生成して出力する
// question_id：問題番号、1問目の場合は[1]を受け取る
// selection_list：回答の選択肢配列を受け取る
// valid_id：正解番号、正解の選択肢の番号を受け取る。先頭の選択肢が正解の場合は1となる
function createquestion(question_id, selection_list, valid_id) {
    var contents = `<div class="quiz">`
        + `    <h1>${question_id + 1}. この地名はなんて読む？</h1>`
        + `    <img src="img/${(question_id + 1)}.png">`
        + `    <ul>`;

    // selection_listの配列分だけループ処理して選択肢を作成する
    selection_list.forEach(function (selection, index) {
        contents += `        <li id="answerlist_${(question_id + 1)}_${(index + 1)}" name="answerlist_${(question_id + 1)}" `
            + `class="answerlist" onclick="check(${(question_id + 1)}, ${(index + 1)}, ${(valid_id + 1)})">${selection}</li>`;
    });

    contents += `        <li id="answerbox_${(question_id + 1)}" class="answerbox">`
        + `            <span id="answertext_${(question_id + 1)}"></span><br>`
        + `            <span>正解は「${selection_list[valid_id]}」です！</span>`
        + `        </li>`
        + `    </ul>`
        + `</div >`;
    document.getElementById('main').insertAdjacentHTML('beforeend', contents);
}

function createhtml() {
  question_list.forEach(function(question, index) {
    answer = question[0];

    //配列ランダム（フィッシャーイエーツ）
    for (var i = question.length - 1; i > 0; i--) {
      var r = Math.floor(Math.random() * (i + 1));
      var tmp = question[i];
      question[i] = question[r];
      question[r] = tmp;
    }

    createquestion(index, question, question.indexOf(answer));
  });
}

window.onload = createhtml();