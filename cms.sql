-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2020 г., 22:39
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aboutus`
--

CREATE TABLE `aboutus` (
  `keySetting` varchar(255) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `directoryservices`
--

CREATE TABLE `directoryservices` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` int(5) DEFAULT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `activity` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `directoryservices`
--

INSERT INTO `directoryservices` (`id`, `name`, `category`, `preview`, `path`, `activity`) VALUES
(1, 'example1', 1, '1.jpg', 'example1', 1),
(2, 'example2', 1, '2.jpg', 'example2', 1),
(3, 'example3', 2, '3.jpg', 'example3', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `directoryservicescategory`
--

CREATE TABLE `directoryservicescategory` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `directoryservicescategory`
--

INSERT INTO `directoryservicescategory` (`id`, `name`, `description`) VALUES
(1, 'Кулинария', 'Предприятия по производству и продаже кулинарных изделий.'),
(2, 'Канцелярия', 'Предприятия по производству и продаже кулинарных канцелярских изделий для дома и офиса.');

-- --------------------------------------------------------

--
-- Структура таблицы `generalsettings`
--

CREATE TABLE `generalsettings` (
  `keySetting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `generalsettings`
--

INSERT INTO `generalsettings` (`keySetting`, `value`) VALUES
('numberOfDisplayedPosts', '2'),
('pathDirServices', '/generalData/Services/');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `fromWhom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `feedback` text DEFAULT NULL,
  `addToView` tinyint(4) DEFAULT NULL,
  `answerCompany` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `fromWhom`, `description`, `feedback`, `addToView`, `answerCompany`) VALUES
(1, 'Олег', 'Сайт великолепен!', 'Номер телефона: 8(8442) 43-15-87', 1, 'Спасибо, мы стараемся!'),
(2, 'Мария', 'Очень понравилось!', '', 1, 'Нам тоже понравилось.'),
(3, 'Владимир', 'Мне не понравилось!', 'Email: a@a.ru', 0, NULL),
(4, 'Ирина', 'Хочу еще!', NULL, NULL, NULL),
(7, 'Никита', 'Тестовое добавление отзыва!', 'Мой номер телефона - 88442666666', NULL, NULL),
(8, 'Никита', 'Тестовое добавление отзыва!', 'Мой номер телефона - 88442666666', NULL, NULL),
(9, 'Никита', 'Тестовое добавление отзыва!', 'Мой номер телефона - 88442666666', NULL, NULL),
(10, 'lol', 'kek', '', NULL, NULL),
(11, 'Алина', 'Отличный Сайт!', 'Никак', NULL, NULL),
(12, 'Псевдоним', 'Отзыв', '', NULL, NULL),
(13, 'Тестовый', 'Прекрасный сайт!', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(5) NOT NULL,
  `descriptions` text NOT NULL,
  `directoryservices` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `descriptions`, `directoryservices`) VALUES
(1, 'Описание сервиса 1.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','user','moderator','') NOT NULL,
  `date_reg` datetime DEFAULT current_timestamp(),
  `hash` varchar(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `date_reg`, `hash`, `name`, `surname`, `phonenumber`) VALUES
(1, 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', '2020-02-25 21:45:11', 'eec99cd76dd50685e160a3ce8bc078a5', NULL, NULL, NULL),
(3, 'user@user.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, '53ec4fbcf6da821fc24dadf0cef38d1c', 'Никита', 'Соловьев', '88005553535'),
(4, 'A@a.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, NULL, 'test', 'test', '88005553535'),
(5, 'A1@a.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, '128791b5687f49367eed9449efcc6ced', 'test', 'test', '88005553535'),
(6, 'alina@alina.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, 'dd8e459ffa51b4e6fdea5b21303fc796', 'Бирюкова', 'Алина', '88005553535'),
(7, 'test@test.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, 'c6817828ef417e580a06bf9681abdf60', 'Имя', 'фамилия', '88005553535'),
(8, 't@t.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'user', NULL, 'fe15b7430632e3ba22d6ca49ff8c3d76', 'ТестовоеИмя', 'ТестоваяФамилия', '88005553535');

-- --------------------------------------------------------

--
-- Структура таблицы `usersettings`
--

CREATE TABLE `usersettings` (
  `keySetting` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`keySetting`);

--
-- Индексы таблицы `directoryservices`
--
ALTER TABLE `directoryservices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `directoryservicescategory`
--
ALTER TABLE `directoryservicescategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`keySetting`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directoryservices` (`directoryservices`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usersettings`
--
ALTER TABLE `usersettings`
  ADD PRIMARY KEY (`keySetting`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `directoryservices`
--
ALTER TABLE `directoryservices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `directoryservicescategory`
--
ALTER TABLE `directoryservicescategory`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `directoryservices`
--
ALTER TABLE `directoryservices`
  ADD CONSTRAINT `directoryservices_ibfk_1` FOREIGN KEY (`category`) REFERENCES `directoryservicescategory` (`id`);

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`directoryservices`) REFERENCES `directoryservices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
