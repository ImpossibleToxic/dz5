-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 19 2024 г., 01:58
-- Версия сервера: 5.7.24
-- Версия PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database_std`
--

-- --------------------------------------------------------

--
-- Структура таблицы `std_works`
--

CREATE TABLE `std_works` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `work_type` int(11) NOT NULL,
  `action_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `std_works`
--

INSERT INTO `std_works` (`id`, `user`, `work_type`, `action_date`) VALUES
(26, '3213', 2, '2024-12-19 04:51:15'),
(27, '3213', 2, '2024-12-19 04:51:15'),
(28, '3213', 2, '2024-12-19 04:51:17'),
(29, '3213', 2, '2024-12-19 04:51:39'),
(30, '3213', 2, '2024-12-19 04:51:39'),
(31, '3213', 2, '2024-12-19 04:52:46'),
(32, '3213', 2, '2024-12-19 04:54:06'),
(33, '3213', 2, '2024-12-19 04:54:06'),
(34, '3213', 2, '2024-12-19 04:54:07'),
(35, '3213', 2, '2024-12-19 04:54:07'),
(36, '3213', 2, '2024-12-19 04:54:07'),
(37, '3213', 2, '2024-12-19 04:54:07'),
(38, '3213', 2, '2024-12-19 04:54:07'),
(39, '3213', 2, '2024-12-19 04:54:08'),
(40, '3213', 2, '2024-12-19 04:54:08');

-- --------------------------------------------------------

--
-- Структура таблицы `std_workslist`
--

CREATE TABLE `std_workslist` (
  `id` int(11) NOT NULL,
  `worktype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `std_workslist`
--

INSERT INTO `std_workslist` (`id`, `worktype`) VALUES
(1, 'Прорисовка макета'),
(2, 'Верстка'),
(3, 'Написание текстов'),
(4, 'Программирование'),
(5, 'Тестирование');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `std_works`
--
ALTER TABLE `std_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_type` (`work_type`);

--
-- Индексы таблицы `std_workslist`
--
ALTER TABLE `std_workslist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `std_works`
--
ALTER TABLE `std_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `std_workslist`
--
ALTER TABLE `std_workslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `std_works`
--
ALTER TABLE `std_works`
  ADD CONSTRAINT `std_works_ibfk_1` FOREIGN KEY (`work_type`) REFERENCES `std_workslist` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
