const optionLength = 3;


let choice = [

    ['たかなわ', 'たかわ', 'こうわ'], //0
    ['かめいど', 'かめど', 'かめと'], //1
    ['こうじまち', 'かゆまち', 'おかとまち'], //2
    ['おなりもん', 'おかどもん', 'ごせいもん'], //3
    ['とどろき', 'たたら', 'たたりき'], //4
    ['しゃくじい', 'いじい', 'せきこうい'], //5
    ['ぞうしき', 'ざっしき', 'ざっしょく'], //6
    ['おかちまち', 'みとちょう', 'ごしろちょう'], //7
    ['ししぼね', 'ろっこつ', 'しこね'], //8
    ['こぐれ', 'こばく', 'こしゃく'], //9
];

let answer = [
    'たかなわ', 'かめいど', 'こうじまち', 'おなりもん', 'とどろき', 'しゃくじい', 'ぞうしき', 'おかちまち', 'ししぼね', 'こぐれ'
]


let clickfunction = function(quesNum, choiceNum) {　 //クリックすると3つの変数が更新される
    let correctNum = choice[quesNum].indexOf(answer[quesNum]);
    let correctChoice = document.getElementById(`choice${quesNum}-${correctNum}`); //答えのli取得
    let clickedChoice = document.getElementById(`choice${quesNum}-${choiceNum}`); //選んだもののli取得
    let answerBoxDiv = document.getElementById(`answerbox-div${quesNum}`); //回答ボックスのdiv取得
    let result = document.createElement('h3');
    result.classList.add('quiz-result-title');
    answerBoxDiv.appendChild(result);

    let resultParagraph = document.createElement('p');
    //回答済の全ての問題の回答ボックスへの表示を行う
    let answerBoxChoice = [answerBoxDiv]
    answerBoxChoice.forEach(answerBoxDiv => {
        //スタイルの追加
        answerBoxDiv.classList.add('answer-box');
        resultParagraph.classList.add('quiz-result-paragraph');
        //正解を表す文面をpタグに追加
        resultParagraph.innerHTML = `正解は「${answer[quesNum-1]}」です！`;
        //divの子要素として追加することで、実際に表示する
        //  answerBoxDiv.appendChild(result);
        answerBoxDiv.appendChild(resultParagraph);
    });

    clickedChoice.classList.add('incorrect-color'); //クリックしたliを赤くする
    correctChoice.classList.add('correct-color'); //正解のliを青くする（正解を選んだ場合は上書きされる）


    if (choiceNum === correctNum) {
        result.innerHTML = `<h3 class = "bingo"> 正解！ </span>`;
    } else {
        result.innerHTML = `<h3 class = "not-bingo"> 不正解！ </span>`;
    }
    for (let i = 0; i < optionLength; i++) {
        document.getElementById(`choice${quesNum}-${i}`).classList.add('oneClick');
    };
}