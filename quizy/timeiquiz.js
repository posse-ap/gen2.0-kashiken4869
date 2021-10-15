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
   ['こぐれ', 'こばく', 'こしゃく'], //9
];

let answer = [
   'たかなわ', 'かめいど', 'こうじまち', 'おなりもん', 'とどろき', 'しゃくじい', 'ぞうしき', 'おかちまち', 'ししぼね', 'こぐれ',
]

for (let i = 0; i < choice.length; i++) {
   let quizDiv = document.createElement('div');
   quizDiv.id = `quiz-div${i}`;
   quizDiv.classList.add("quiz-div");
   document.body.appendChild(quizDiv);

   let quizTitle = document.createElement('h1');
   quizTitle.innerHTML = `<h1 class="title">${i + 1}. この地名はなんて読む？</h1>`;
   quizDiv.appendChild(quizTitle);

   let quizImgContainer = document.createElement('div');
   quizImgContainer.classList.add("quiz-img-container");
   quizDiv.appendChild(quizImgContainer);

   let timeiImg = document.createElement('img');
   timeiImg.src = `./img/photo${i}.png`;
   quizImgContainer.appendChild(timeiImg);

   for (let k = optionLength - 1; k > 0; k--) {
      const j = Math.floor(Math.random() * (k + 1));
      [choice[i][j], choice[i][k]] = [choice[i][k], choice[i][j]];
      console.log(choice[i][j],choice[i][k]);
   }
   
   let choices = document.createElement('ul');
   choices.id = `quiz-choices${i}`;
   choices.innerHTML =
   `<li id="choice${i}-0" onclick="clickfunction(${i},0)">${choice[i][0]}</li>`
   + `<li id="choice${i}-1" onclick="clickfunction(${i},1)">${choice[i][1]}</li>`
   + `<li id="choice${i}-2" onclick="clickfunction(${i},2)">${choice[i][2]}</li>`;

   quizDiv.appendChild(choices);

   // 回答ボックスの表示//
   let answerBoxDiv = document.createElement('div');
   answerBoxDiv.id = `answerbox-div${i}`;
   quizDiv.appendChild(answerBoxDiv);
}

/* quesNum → i = 問題番号-1 (index番号) 
 * choiceNum →  選択肢番号 0,1,2
 */
let clickfunction = function (quesNum, choiceNum) {  //クリックすると3つの変数が更新される
   let correctNum =  choice[quesNum].indexOf(answer[quesNum]);
   let correctChoice = document.getElementById(`choice${quesNum}-${correctNum}`);  //答えのli取得
   let clickedChoice = document.getElementById(`choice${quesNum}-${choiceNum}`);   //選んだもののli取得
   let answerBoxDiv = document.getElementById(`answerbox-div${quesNum}`);          //回答ボックスのdiv取得

   let result = document.createElement('h3');
   result.classList.add('quiz-result-title');
   answerBoxDiv.appendChild(result);

   let resultParagraph = document.createElement('p');
   //回答済の全ての問題の回答ボックスへの表示を行う
   let answerBoxChoice = [answerBoxDiv];
   answerBoxChoice.forEach(answerBoxDiv => {
      //スタイルの追加
      answerBoxDiv.classList.add('answer-box');
      resultParagraph.classList.add('quiz-result-paragraph');
      //正解を表す文面をpタグに追加
      resultParagraph.innerHTML = `正解は「${answer[quesNum]}」です！`;
      //divの子要素として追加することで、実際に表示する
      //  answerBoxDiv.appendChild(result);
      answerBoxDiv.appendChild(resultParagraph);
   });

   if (choiceNum === correctNum) {
      result.innerHTML = `<h3 class = "bingo"> 正解！ </span>`;
      correctChoice.classList.add('correct-color'); //正解のliを青くする（正解を選んだ場合は上書きされる）
   } else {
      result.innerHTML = `<h3 class = "not-bingo"> 不正解！ </span>`;
      clickedChoice.classList.add('incorrect-color'); //クリックしたliを赤くする
      correctChoice.classList.add('correct-color'); //正解のliを青くする（正解を選んだ場合は上書きされる）
   }
   for (let i = 0; i < optionLength; i++) {
      document.getElementById(`choice${quesNum}-${i}`).classList.add('oneClick');
   };

   // if (choiceNum !== correctNum) {
   //    result.innerHTML = `<h3 class = "not-bingo"> 不正解！ </span>`;
   //    clickedChoice.classList.add('incorrect-color'); //クリックしたliを赤くする
   //    correctChoice.classList.add('correct-color'); //正解のliを青くする（正解を選んだ場合は上書きされる）
   // } else {
   //    result.innerHTML = `<h3 class = "bingo"> 正解！ </span>`;
   //    correctChoice.classList.add('correct-color'); //正解のliを青くする（正解を選んだ場合は上書きされる）
   // }
   // for (let i = 0; i < optionLength; i++) {
   //    document.getElementById(`choice${quesNum}-${i}`).classList.add('oneClick');
   // };
}