-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 11 2021 г., 07:59
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `machines`
--

-- --------------------------------------------------------

--
-- Структура таблицы `machine_1`
--

CREATE TABLE `machine_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `on_off` varchar(20) NOT NULL,
  `temperature` tinyint(4) NOT NULL,
  `stroke` varchar(30) DEFAULT NULL,
  `revs` smallint(6) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `machine_1`
--

INSERT INTO `machine_1` (`id`, `on_off`, `temperature`, `stroke`, `revs`, `time`) VALUES
(1, 'Включен', 57, 'функц.', 250, NULL),
(2, 'Включен', 59, 'функц.', 251, NULL),
(3, 'Включен', 61, 'функц', 250, NULL),
(4, 'Включен', 60, 'функц', 250, NULL),
(5, 'Включен', 57, 'функц', 250, NULL),
(6, 'Включен', 56, 'функц', 249, NULL),
(7, 'Включен', 56, 'функц', 250, NULL),
(8, 'Включен', 55, 'функц', 250, NULL),
(9, 'Включен', 57, 'функц', 251, NULL),
(10, 'Включен', 54, 'функц', 250, NULL),
(11, 'Включен', 58, 'функц', 251, NULL),
(12, 'Включен', 59, 'функц', 250, NULL),
(13, 'Включен', 59, 'функц', 250, NULL),
(14, 'Включен', 57, 'функц', 250, NULL),
(15, 'Включен', 59, 'функц', 250, NULL),
(16, 'Включен', 56, 'функц', 251, NULL),
(17, 'Включен', 54, 'функц', 250, NULL),
(18, 'Включен', 55, 'функц', 249, NULL),
(19, 'Включен', 59, 'функц', 250, NULL),
(20, 'Включен', 60, 'функц', 250, NULL),
(21, 'Включен', 62, 'функц', 255, NULL),
(22, 'Включен', 64, 'функц', 260, NULL),
(23, 'Включен', 66, 'функц', 260, NULL),
(24, 'Включен', 67, 'функц', 260, NULL),
(25, 'Включен', 69, 'функц', 260, NULL),
(26, 'Включен', 67, 'функц', 260, NULL),
(27, 'Выключен', 65, NULL, 0, NULL),
(28, 'Выключен', 64, NULL, 0, NULL),
(29, 'Выключен', 63, NULL, 0, NULL),
(30, 'Выключен', 61, NULL, 0, NULL),
(31, 'Выключен', 60, NULL, 0, NULL),
(32, 'Выключен', 58, NULL, 0, NULL),
(33, 'Выключен', 55, NULL, 0, NULL),
(34, 'Выключен', 52, NULL, 0, NULL),
(35, 'Выключен', 50, NULL, 0, NULL),
(36, 'Выключен', 48, NULL, 0, NULL),
(37, 'Выключен', 45, NULL, 0, NULL),
(38, 'Выключен', 44, NULL, 0, NULL),
(39, 'Включен', 45, 'функц', 120, NULL),
(40, 'Включен', 47, 'функц', 120, NULL),
(41, 'Включен', 48, 'функц', 120, NULL),
(42, 'Включен', 50, 'функц', 120, NULL),
(43, 'Включен', 51, 'функц', 121, NULL),
(44, 'Включен', 52, 'функц', 119, NULL),
(45, 'Включен', 55, 'функц', 120, NULL),
(46, 'Включен', 55, 'функц', 120, NULL),
(47, 'Включен', 52, 'функц', 120, NULL),
(48, 'Включен', 53, 'функц', 120, NULL),
(49, 'Включен', 53, 'функц', 120, NULL),
(50, 'Включен', 52, 'функц', 120, NULL),
(51, 'Выключен', 50, NULL, 0, NULL),
(52, 'Выключен', 48, NULL, 0, NULL),
(53, 'Включен', 50, 'функц', 249, NULL),
(54, 'Включен', 53, 'функц', 250, NULL),
(55, 'Включен', 56, 'функц', 250, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `machine_2`
--

CREATE TABLE `machine_2` (
  `id` int(11) NOT NULL,
  `on_off` varchar(20) NOT NULL,
  `temperature` tinyint(4) NOT NULL,
  `stroke` varchar(30) DEFAULT NULL,
  `revs` smallint(6) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `machine_2`
--

INSERT INTO `machine_2` (`id`, `on_off`, `temperature`, `stroke`, `revs`, `time`) VALUES
(1, 'Включен', 71, 'функц', 800, NULL),
(2, 'Включен', 70, 'функц', 801, NULL),
(3, 'Включен', 71, 'функц', 800, NULL),
(4, 'Включен', 72, 'функц', 801, NULL),
(5, 'Включен', 71, 'функц', 800, NULL),
(6, 'Включен', 72, 'функц', 800, NULL),
(7, 'Включен', 75, 'функц', 800, NULL),
(8, 'Включен', 75, 'функц', 801, NULL),
(9, 'Включен', 72, 'функц', 800, NULL),
(10, 'Включен', 73, 'функц', 800, NULL),
(11, 'Включен', 70, 'функц', 800, NULL),
(12, 'Включен', 72, 'функц', 800, NULL),
(13, 'Включен', 71, 'функц', 801, NULL),
(14, 'Включен', 73, 'функц', 800, NULL),
(15, 'Включен', 72, 'функц', 799, NULL),
(16, 'Включен', 70, 'функц', 801, NULL),
(17, 'Включен', 69, 'функц', 800, NULL),
(18, 'Включен', 72, 'функц', 800, NULL),
(19, 'Включен', 72, 'функц', 801, NULL),
(20, 'Включен', 71, 'функц', 801, NULL),
(21, 'Включен', 70, 'функц', 800, NULL),
(22, 'Включен', 72, 'функц', 800, NULL),
(23, 'Включен', 73, 'функц', 800, NULL),
(24, 'Включен', 74, 'функц', 800, NULL),
(25, 'Включен', 71, 'функц', 800, NULL),
(26, 'Включен', 70, 'функц', 800, NULL),
(27, 'Включен', 73, 'функц', 801, NULL),
(28, 'Выключен', 70, NULL, 0, NULL),
(29, 'Выключен', 70, NULL, 0, NULL),
(30, 'Выключен', 67, NULL, 0, NULL),
(31, 'Выключен', 66, NULL, 0, NULL),
(32, 'Выключен', 64, NULL, 0, NULL),
(33, 'Выключен', 63, NULL, 0, NULL),
(34, 'Выключен', 61, NULL, 0, NULL),
(35, 'Выключен', 59, NULL, 0, NULL),
(36, 'Включен', 60, 'функц', 880, NULL),
(37, 'Включен', 62, 'функц', 881, NULL),
(38, 'Включен', 60, 'функц', 880, NULL),
(39, 'Включен', 62, 'функц', 881, NULL),
(40, 'Включен', 64, 'функц', 880, NULL),
(41, 'Включен', 65, 'функц', 880, NULL),
(42, 'Включен', 67, 'функц', 880, NULL),
(43, 'Включен', 65, 'функц', 880, NULL),
(44, 'Включен', 67, 'функц', 880, NULL),
(45, 'Включен', 69, 'функц', 880, NULL),
(46, 'Включен', 70, 'функц', 880, NULL),
(47, 'Включен', 72, 'функц', 880, NULL),
(48, 'Включен', 75, 'функц', 880, NULL),
(49, 'Включен', 77, 'функц', 880, NULL),
(50, 'Включен', 77, 'функц', 880, NULL),
(51, 'Включен', 79, 'функц', 880, NULL),
(52, 'Включен', 80, 'функц', 880, NULL),
(53, 'Включен', 78, 'функц', 800, NULL),
(54, 'Включен', 75, 'функц', 800, NULL),
(55, 'Включен', 73, 'функц', 800, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `machine_3`
--

CREATE TABLE `machine_3` (
  `id` int(11) NOT NULL,
  `on_off` varchar(20) NOT NULL,
  `temperature` tinyint(4) NOT NULL,
  `stroke` varchar(30) DEFAULT NULL,
  `revs` smallint(6) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `machine_3`
--

INSERT INTO `machine_3` (`id`, `on_off`, `temperature`, `stroke`, `revs`, `time`) VALUES
(1, 'Включен', 16, 'холостой ', 50, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `machine_1`
--
ALTER TABLE `machine_1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `machine_2`
--
ALTER TABLE `machine_2`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `machine_3`
--
ALTER TABLE `machine_3`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `machine_1`
--
ALTER TABLE `machine_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `machine_2`
--
ALTER TABLE `machine_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `machine_3`
--
ALTER TABLE `machine_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
