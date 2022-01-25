DROP SCHEMA IF EXISTS quizy;
CREATE SCHEMA quizy;
USE quizy;

-- USE quizy;

-- DROP TABLE IF EXISTS big_questions;
-- CREATE TABLE big_questions(
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255)
-- );
-- CREATE TABLE IF NOT EXISTS big_questions(
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255)
-- );
-- USE quizy;

SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_CONNECTION = utf8;

-- INSERT INTO big_questions (id, name) VALUES 
--     (1,'東京の難読地名クイズ'),
--     (2,'広島県の難読地名クイズ');

-- prefecturesテーブル
DROP TABLE IF EXISTS prefectures;
-- もし存在していたらデータベースを削除
CREATE TABLE prefectures(
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  -- 固有のもの
  name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

    INSERT INTO prefectures (name) VALUES
('東京の難読地名クイズ'),
('広島県の難読地名クイズ');

-- questionsテーブル
DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  prefecture_id INT NOT NULL,
  -- 'order' NOT NULL,
  name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);
INSERT INTO questions (prefecture_id,name) VALUES
(1,'高輪'),
(1,'亀戸'),
(2,'向洋');

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
prefecture_id INT NOT NULL,
-- big_question_id INT NOT NULL,
question_id INT NOT NULL,
choice0 VARCHAR(225) NOT NULL,
choice1 VARCHAR(225) NOT NULL,
choice2 VARCHAR(225) NOT NULL,
image VARCHAR(225) NOT NULL
);

INSERT INTO choices (prefecture_id, question_id, choice0, choice1, choice2, image) VALUES 
(1, 1, 'たかなわ', 'こうわ', 'わ', 'takanawa.png'),
(1, 2, 'かめいど', 'かめと', 'かめど', 'kameido.png'),
(1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'koujimati.png' ),
(1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'onarimon.png'),
(1, 5, 'とどろき', 'たたら', 'たたろき', 'todoroki.png'),
(1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'syakujii.png'),
(1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'zousiki.png'), 
(1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','okatimati.png'),
(1, 9, 'ししぼね', 'ろっこつ', 'しこね','sisibone.png'),
(1, 10, 'こぐれ', 'こばく', 'こしゃく','kogure.png'),
(2, 1, 'むかいなだ', 'むこうひら', 'むきひら','mukainada.png');