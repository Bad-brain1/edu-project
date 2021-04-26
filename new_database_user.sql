-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 23 2020 г., 16:48
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_database_user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `new_order`
--

CREATE TABLE `new_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `new_order`
--

INSERT INTO `new_order` (`id`, `id_user`, `Id_product`, `name`, `phone`) VALUES
(1, 1, 1, 'asd ads', '89876877777'),
(2, 1, 2, 'alex alex', '89876877777'),
(3, 1, 2, 'alex alex', '89876877777'),
(4, 1, 5, 'alex alex', '89876877777'),
(5, 1, 3, 'alex alex', '89876877777'),
(6, 1, 4, 'alex alex', '89876877777');

-- --------------------------------------------------------

--
-- Структура таблицы `new_product`
--

CREATE TABLE `new_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `new_product`
--

INSERT INTO `new_product` (`id`, `name`, `price`) VALUES
(1, 'standart', 20000),
(2, 's-long', 25000),
(3, 'strandmon', 12000),
(4, 'malm-two', 7500),
(5, 'rakkestad', 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `new_users`
--

CREATE TABLE `new_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `new_users`
--

INSERT INTO `new_users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.ru', '21232f297a57a5a743894a0e4a801fc3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `new_order`
--
ALTER TABLE `new_order`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `new_product`
--
ALTER TABLE `new_product`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `new_users`
--
ALTER TABLE `new_users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `new_order`
--
ALTER TABLE `new_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `new_product`
--
ALTER TABLE `new_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `new_users`
--
ALTER TABLE `new_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
