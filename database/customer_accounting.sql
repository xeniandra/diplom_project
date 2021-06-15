-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2021 г., 00:22
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `customer_accounting`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `fio_client` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_client`, `fio_client`, `phone`, `email`, `address`, `birthday`, `type`) VALUES
(4, 'Визлев Георгий Артурович', '+79683535530', 'george@gmail.com', 'Москва, ул. Красная Пресня, д. 23, к.55 ', '1978-04-01', 1),
(5, 'Визлев Фёдор Артурович', '+79685455531', 'Fedor@gmail.com', 'Москва, ул. Красная Пресня, д. 23, к. 55 ', '1978-04-01', 1),
(6, 'Васильев Валерий Валентинович', '+79685454525', 'valeryval@gmail.com', 'Москва, Садовая-Спасская ул., д. 3, кв. 105 ', '1990-06-08', 1),
(7, 'Жаркова Алла Юрьевна', '+79683535544', 'zharkova95@gmail.com', 'Московская область, Долгопрудный, пр-кт Ракетостроителей, д.1 ', '1995-06-22', 1),
(8, 'Демчук Алексей Павлович', '+79684454512', 'demap@gmail.com', 'Московская область, Жуковский, ул Гагарина, д.65А ', '1985-06-05', 1),
(9, 'Романова Татьяна Станиславовна', '+79684470445', 'romanovats@gmail.com', 'Московская область, Клин, ул Карла Маркса, д.6 ', '1992-05-06', 1),
(10, 'Горин Вячеслав Викторович ', '+79685454789', 'gor1975@gmail.com', 'Московская область, Жуковский, ул Гагарина, д.12', '1975-07-05', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id_event` int NOT NULL,
  `type_event` varchar(255) NOT NULL,
  `theme_event` varchar(255) NOT NULL,
  `date_event` date NOT NULL,
  `priority_event` int NOT NULL,
  `status_event` int NOT NULL,
  `id_client` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id_event`, `type_event`, `theme_event`, `date_event`, `priority_event`, `status_event`, `id_client`) VALUES
(1, '2', 'Сборка ПК', '2021-06-27', 1, 1, 4),
(2, '3', 'Скидка', '2021-06-10', 2, 1, 5),
(3, '1', 'Предложить мастера', '2021-06-03', 1, 1, 7),
(4, '4', 'Exegate EX282351RUS Термопаста ETT-2WMK Standard', '2021-06-11', 2, 1, 7),
(5, '2', 'Вызов мастера на дом', '2021-06-12', 1, 1, 5),
(6, '2', 'Смена термопасты', '2021-07-01', 2, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `fio`) VALUES
(1, 'morozov', 'morozov123', 'Морозов Сергей Юрьевич');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_client` (`id_client`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
