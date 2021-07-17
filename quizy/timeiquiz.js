'use strict';

let correct = document.getElementById('timeiquiz3');
let incorrect1 = document.getElementById('timeiquiz1');
let incorrect2 = document.getElementById('timeiquiz2');
// letは上書きできるけどconstは上書きできない


//　正解を選んだとき
function correctAnswer() {
      // correct.style.backgroundColor = "#297CFE";
      // correct.style.color = "#ffffff";
      correct.classList.add("correct-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( kaitou.style.display=="block"){
         // noneで非表示
         kaitou.style.display　= "none";
      } else {
         //blockで表示
         kaitou.style.display　= "block";
      }
   }
   correct.addEventListener('click',correctAnswer);
   

// たかわを選んだとき
   function incorrectAnswer1() {
      correct.style.backgroundColor = "#297CFE";
      correct.style.color = "#ffffff";
      incorrect2.style.color = "#ffffff";
      incorrect2.style.backgroundColor = "#FD5129";
  // incorrect1.style.backgroundColor = "#FD5129";
      // incorrect1.style.color = "#FD5129";
      incorrect1.classList.add("incorrect-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( kaitou2.style.display=="block"){
         // noneで非表示
         kaitou2.style.display　= "none";
      } else {
         //blockで表示
         kaitou2.style.display　= "block";
      }
   }
  incorrect1.addEventListener('click',incorrectAnswer1);
  
// こうわを選んだとき
  function incorrectAnswer2() {
      correct.style.backgroundColor = "#297CFE";
      correct.style.color = "#ffffff";
      incorrect1.style.color = "#ffffff";
      incorrect1.style.backgroundColor = "#FD5129";
      // incorrect2.style.backgroundColor = "##FD5129";
      // incorrect2.style.color = "#ffffff";
      incorrect2.classList.add("incorrect-color")
      correct.classList.add("oneClick")
      incorrect1.classList.add("oneClick")
      incorrect2.classList.add("oneClick")
      if( kaitou2.style.display=="block"){
         // noneで非表示
         kaitou2.style.display　= "none";
      } else {
         //blockで表示
         kaitou2.style.display　= "block";
      }
  }
  incorrect2.addEventListener('click',incorrectAnswer2);
 