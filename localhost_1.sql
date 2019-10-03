-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 18 2017 г., 22:36
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `content` text,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `coordinats` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `content`, `date`, `image`, `viewed`, `user_id`, `status`, `category_id`, `coordinats`) VALUES
(42, 'Каждый веб-разработчик знает, что такое текст-«рыба».', '<p><span style="background-color:rgb(238, 238, 238); font-family:trebuchet ms,arial,sans-serif; font-size:16px">Каждый веб-разработчик знает, что такое текст-&laquo;рыба&raquo;. Текст этот, несмотря на название, не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему нести совсем необязательно. Более того, нечитабельность текста сыграет на руку при оценке качества восприятия макета.</span></p>\r\n', '<p><span style="background-color:rgb(238, 238, 238); font-family:trebuchet ms,arial,sans-serif; font-size:16px">Каждый веб-разработчик знает, что такое текст-&laquo;рыба&raquo;. Текст этот, несмотря на название, не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему нести совсем необязательно. Более того, нечитабельность текста сыграет на руку при оценке качества восприятия макета.</span></p>\r\n', '2017-11-10', 'dd00db1c3c709c86887e7b76c4722f0e.jpg', 12, 45087636, 1, 8, '55.862815644680076, 37.01080418066407'),
(43, 'Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '2017-11-10', '66e6b6dbb735149833e50f8473613b32.jpg', 2, 45087636, 1, 8, ''),
(44, 'НОВОСТРОЙКИ В НЕКРАСОВКЕ', '<p>4</p>\r\n', '<p>4</p>\r\n', '2017-11-10', '40b92f2955baf0f93326fc95d16fe225.jpg', 1, 45087636, 1, 7, '55.80485021864132, 37.23945713476564'),
(45, 'Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '2017-11-10', '3c13a75bfec1100a212e11d2ed929769.jpg', 1, 45087636, 1, 7, '55.770518526721354, 37.49656769787247'),
(46, 'Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '2017-11-10', '78438aec23b0e20f1b1ec97b35162e1d.jpg', 1, 45087636, 1, 7, '55.826989306861705, 37.46772858654434'),
(47, 'Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '2017-11-10', 'f0a229b95f61e68f14105f795fa40655.jpg', 1, 45087636, 1, 7, '55.79324671942304, 37.30400181250001'),
(48, 'Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '<p><span style="color:rgb(0, 0, 0); font-family:roboto,arial,sans-serif; font-size:16px">Не следует, однако, забывать о том, что начало повседневной работы по формированию позиции способствует повышению актуальности экономической ц</span></p>\r\n', '2017-11-10', '5b9bef0b30ed1798e476c21a97612598.jpg', NULL, 45087636, 1, 6, '55.78086582591342, 37.11586094335939');

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_tag`
--

INSERT INTO `article_tag` (`id`, `article_id`, `tag_id`) VALUES
(1, 43, 9),
(2, 43, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(6, 'Проекты'),
(7, 'Новости агентства'),
(8, 'Новости города'),
(9, 'Реализация'),
(10, 'Фотогаллерея'),
(11, 'Новости индустрии');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `text`, `user_id`, `article_id`, `status`, `date`) VALUES
(1, 'вфвфвф', 45087636, 42, 1, '2017-12-05');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `thumbnail_width` tinyint(3) unsigned NOT NULL DEFAULT '250',
  `thumbnail_height` tinyint(3) unsigned NOT NULL DEFAULT '150',
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `position` int(11) unsigned NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_lang`
--

CREATE TABLE IF NOT EXISTS `gallery_lang` (
  `gallery_id` int(11) NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1510000390),
('m150211_094318_init', 1510241041),
('m160406_120743_onmotion_yii2_gallery', 1510164456),
('m171106_195750_create_article_table', 1510000392),
('m171106_195813_create_category_table', 1510000392),
('m171106_195836_create_tag_table', 1510000392),
('m171106_195854_create_user_table', 1510000392),
('m171106_195942_create_comment_table', 1510000393),
('m171106_200004_create_article_tag_table', 1510000393),
('m171108_180422_add_date_to_comment', 1510164456),
('m171109_155108_add_coordinats_to_article', 1510242806);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(3, 'Buisness'),
(4, 'City'),
(5, 'Fashion'),
(6, 'Holidays'),
(7, 'New Year'),
(8, 'Programming'),
(9, 'Games'),
(10, 'Google'),
(11, 'Technology');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45087637 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `isAdmin`, `photo`) VALUES
(3, 'vasya', 'vasya@mail.ru', 'vasya', 1, 'oko'),
(45087636, 'Игорь', NULL, NULL, 1, 'https://pp.userapi.com/c841139/v841139389/34cfe/W4IGAdovjnE.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_article_article_id` (`article_id`),
  ADD KEY `idx_tag_id` (`tag_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-post-user_id` (`user_id`),
  ADD KEY `idx-article_id` (`article_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_lang`
--
ALTER TABLE `gallery_lang`
  ADD PRIMARY KEY (`gallery_id`,`language`),
  ADD KEY `language` (`language`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45087637;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `fk-tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_article_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk-article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-post-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery_lang`
--
ALTER TABLE `gallery_lang`
  ADD CONSTRAINT `FK_GALLERY_LANG_GALLERY_ID` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
