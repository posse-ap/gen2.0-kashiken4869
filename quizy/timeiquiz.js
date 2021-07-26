let quesNum;
let choiceNum;
let correct = document.getElementById('choice${i}-0');
let incorrect1 = document.getElementById('choice${i}-1');
let incorrect2 = document.getElementById('choice${i}-2');
let correctNum = 0;
const quizLength = 10;

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



for (let i = 0; i < quizLength; i++) {

let quizDiv = document.createElement('div');
quizDiv.id  = `quiz-div${i}`;
document.body.appendChild(quizDiv);

let quizTitle = document.createElement('h1');
quizTitle.innerHTML = `<h1 class="title">${i + 1}. この地名はなんて読む？</h1>`;
//<span class="markertext">${i + 1}.この地名は</span>
quizDiv.appendChild(quizTitle);

let underlineBox = document.createElement('p');
underlineBox.classList.add("underline-box");
quizDiv.appendChild(underlineBox);

let quizImgContainer = document.createElement('div');
quizImgContainer.classList.add("quiz-img-container");
quizDiv.appendChild(quizImgContainer);

let timeiImg = document.createElement('img');
timeiImg.src = `./img/photo${i}.png`;
quizImgContainer.appendChild(timeiImg);

let choices = document.createElement('ul');
choices.id = `quiz-choices${i}`;
quizDiv.appendChild(choices);
choices.innerHTML = 
`<li id="choice${i}-0" >${choice[i][0]}</li>     
 <li id="choice${i}-1" >${choice[i][1]}</li>
 <li id="choice${i}-2" >${choice[i][2]}</li>`;

// <li id="choice${i}-0" onclick="clickfunction(${i},0,correctNum)">${choice[i][0]}</li>     
//  <li id="choice${i}-1" onclick="clickfunction(${i},1,correctNum)">${choice[i][1]}</li>
//  <li id="choice${i}-2" onclick="clickfunction(${i},2,correctNum)">${choice[i][2]}</li>

// 回答ボックスの表示//
 let answerBoxDiv = document.createElement('div');
answerBoxDiv.id  = `answerbox-div${i}`;
document.body.appendChild(answerBoxDiv);

}

let clickedChoice = document.getElementById(`choice${quesNum}-${choiceNum}`);   //選んだもののli取得
let correctChoice = document.getElementById(`choice${quesNum}-${correctNum}`);  //答えのli取得
let answerBoxDiv = document.getElementById(`answerbox-div${quesNum}`);          //回答ボックスのdiv取得

let result = createElement('h3');
if (correctNum === choiceNum) {
   result.innerHTML  = `<span class = "seikai"> 正解！ </span>`;
} else {
   result.innerHTML = `<span class = "fuseikai"> 不正解！ </span>`;
}
document.answerBoxDiv.appendChild(result);

let correctParagraph = createElement('p');
correctParagraph.innerHTML = `<p> 正解は「${correctChoice.innerText}」です！ </p> `;
answerBoxDiv.appendChild(correctParagraph);


//　正解を選んだとき
function correctAnswer() {
      // correct.style.backgroundColor = "#297CFE";
      // correct.style.color = "#ffffff";
      correct.classList.add("correct-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( success.style.display=="block"){
         // noneで非表示
         success.style.display　= "none";
      } else {
         //blockで表示
         success.style.display　= "block";
      }
   }
   correct.addEventListener('click',correctAnswer);
   
// 不正解1を選んだとき、正解の選択肢を青色にする
   function incorrectAnswer1() {
      correct.style.backgroundColor = "#297CFE";
      correct.style.color = "#ffffff";
  // incorrect1.style.backgroundColor = "#FD5129";
      // incorrect1.style.color = "#FD5129";
      incorrect1.classList.add("incorrect-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( failure.style.display=="block"){
         // noneで非表示
         failure.style.display　= "none";
      } else {
         //blockで表示
         failure.style.display　= "block";
      }
   }
  incorrect1.addEventListener('click',incorrectAnswer1);
  
// 不正解2を選んだとき,

  function incorrectAnswer2() {
      correct.style.backgroundColor = "#297CFE";
      correct.style.color = "#ffffff";
      // incorrect2.style.backgroundColor = "##FD5129";
      // incorrect2.style.color = "#ffffff";
      incorrect2.classList.add("incorrect-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( failure.style.display=="block"){
         // noneで非表示
         failure.style.display　= "none";
      } else {
         //blockで表示
         failure.style.display　= "block";
      }
  }
  incorrect2.addEventListener('click',incorrectAnswer2);
 