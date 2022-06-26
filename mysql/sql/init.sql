DROP SCHEMA IF EXISTS webapp;

CREATE SCHEMA webapp;

USE webapp;

DROP TABLE IF EXISTS `study_languages`;

CREATE TABLE `study_languages` (
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `study_language` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
);

INSERT INTO
    `study_languages` (`study_language`, `color`)
VALUES
    ('JavaScript', '1754EF'),
    ('CSS', '1071BD'),
    ('PHP', '20BEDE'),
    ('HTML', '3CCEFE'),
    ('Lalavel', 'B29EF3'),
    ('SQL', '6D46EC'),
    ('SHELL', '4A18EF'),
    ('情報システム基礎知識（その他)', '3105C0');

DROP TABLE IF EXISTS `study_contents`;

CREATE TABLE `study_contents` (
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `study_content` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `color` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
);

INSERT INTO
    `study_contents` (`study_content`, `color`)
VALUES
    ('ドットインストール', '1754EF'),
    ('N予備校', '1071BD'),
    ('POSSE課題', '20BEDE');

DROP TABLE IF EXISTS `study_data`;

CREATE TABLE `study_data` (
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `study_date` datetime NOT NULL,
    `study_language_id` INT NOT NULL,
    `study_content_id` INT NOT NULL,
    `study_hour` INT
);

INSERT INTO
    `study_data` (
        `study_date`,
        `study_language_id`,
        `study_content_id`,
        `study_hour`
    )
VALUES
    ('2022-3-05', 1, 1, 1),
    ('2022-3-06', 3, 2, 1),
    ('2022-3-07', 4, 3, 1),
    ('2022-3-08', 2, 1, 1),
    ('2022-3-09', 1, 1, 2),
    ('2022-3-10', 5, 2, 2),
    ('2022-3-11', 6, 3, 2),
    ('2022-3-12', 7, 3, 2),
    ('2022-3-13', 3, 1, 3),
    ('2022-3-14', 3, 2, 3),
    ('2022-3-15', 8, 3, 3),
    ('2022-3-16', 3, 2, 3),
    ('2022-4-17', 4, 1, 1),
    ('2022-4-17', 3, 2, 1),
    ('2022-4-17', 2, 3, 2),
    ('2022-4-17', 3, 1, 2),
    ('2022-5-17', 4, 1, 3),
    ('2022-5-17', 3, 2, 3),
    ('2022-5-17', 2, 3, 3);

-- INSERT INTO choices (prefecture_id, question_id, choice0, choice1, choice2, img) VALUES 
-- (1, 1, 'たかなわ', 'こうわ', 'たかわ', 'photo0.png'),
-- (1, 2, 'かめいど', 'かめと', 'かめど', 'photo1.png'),
-- (1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'photo2.png' ),
-- (1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'photo3.png'),
-- (1, 5, 'とどろき', 'たたら', 'たたろき', 'photo4.png'),
-- (1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'photo5.png'),
-- (1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'photo6.png'), 
-- (1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','photo7.png'),
-- (1, 9, 'ししぼね', 'ろっこつ', 'しこね','photo8.png'),
-- (1, 10, 'こぐれ', 'こばく', 'こしゃく','photo9.png'),
-- (2, 1, 'むかいなだ', 'むこうひら', 'むきひら','photo1.png');



DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id SMALLINT(4),
  name VARCHAR(255) NOT NULL
);

INSERT INTO big_questions
VALUES
  (1, '東京の難読地名クイズ'),
  (2, '広島県の難読地名クイズ');


DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id SMALLINT(4),
  big_question_id SMALLINT(4),
  image VARCHAR(255) NOT NULL
);

INSERT INTO questions
VALUES
  (1, 1, 'takanawa.png'),
  (2, 1, 'kameido.png'),
  (3, 2, 'mukainada.png');

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id SMALLINT(4),
  question_id SMALLINT(4),
  name VARCHAR(255) NOT NULL,
  valid SMALLINT(4)
);

INSERT INTO choices
VALUES
  (1, 1, 'たかなわ', 1),
  (2, 1, 'たかわ', 0),
  (3, 1, 'こうわ', 0),
  (4, 2, 'かめと', 0),
  (5, 2, 'かめど', 0),
  (6, 2, 'かめいど', 1),
  (7, 3, 'むこうひら', 0),
  (8, 3, 'むきひら', 0),
  (9, 3, 'むかいなだ', 1);



