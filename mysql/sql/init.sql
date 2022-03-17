DROP SCHEMA IF EXISTS quizy;
CREATE SCHEMA quizy;
USE quizy;


SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_CONNECTION = utf8;

-- prefecturesテーブル
DROP TABLE IF EXISTS prefectures;
-- もし存在していたらデータベースを削除
CREATE TABLE prefectures(
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  -- 固有のもの
  name varchar(255) NOT NULL
);

    INSERT INTO prefectures (name) VALUES
('東京の難読地名クイズ'),
('広島県の難読地名クイズ');


DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
prefecture_id INT NOT NULL,
question_id INT NOT NULL,
choice0 VARCHAR(225) NOT NULL,
choice1 VARCHAR(225) NOT NULL,
choice2 VARCHAR(225) NOT NULL,
img VARCHAR(225) NOT NULL
);

INSERT INTO choices (prefecture_id, question_id, choice0, choice1, choice2, img) VALUES 
(1, 1, 'たかなわ', 'こうわ', 'たかわ', 'photo0.png'),
(1, 2, 'かめいど', 'かめと', 'かめど', 'photo1.png'),
(1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'photo2.png' ),
(1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'photo3.png'),
(1, 5, 'とどろき', 'たたら', 'たたろき', 'photo4.png'),
(1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'photo5.png'),
(1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'photo6.png'), 
(1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','photo7.png'),
(1, 9, 'ししぼね', 'ろっこつ', 'しこね','photo8.png'),
(1, 10, 'こぐれ', 'こばく', 'こしゃく','photo9.png'),
(2, 1, 'むかいなだ', 'むこうひら', 'むきひら','photo1.png');