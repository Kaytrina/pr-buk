-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 25 2023 г., 13:45
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `1110-20_pr-bukasova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cate`, `category`) VALUES
(1, 'Цветы'),
(2, 'Букеты'),
(3, 'Открытки'),
(4, 'Дополнительно');

-- --------------------------------------------------------

--
-- Структура таблицы `chart`
--

CREATE TABLE `chart` (
  `id_chart` int(11) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `chart`
--

INSERT INTO `chart` (`id_chart`, `id_user`, `id_prod`, `count`) VALUES
(3, 5, 6, 5),
(4, 5, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id_ord` int(11) NOT NULL,
  `id_chart` int(100) DEFAULT NULL,
  `id_user` int(100) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `count` int(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` enum('новый','подтвержден','удален') NOT NULL DEFAULT 'новый',
  `reason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_ord`, `id_chart`, `id_user`, `id_prod`, `count`, `time`, `status`, `reason`) VALUES
(1, NULL, 4, 2, 10, '2023-01-25 10:40:17.593960', 'новый', NULL),
(2, NULL, 4, 6, 1, '2023-01-25 10:40:17.597936', 'новый', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_prod` int(11) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL,
  `count` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `category` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_prod`, `photo`, `name`, `count`, `price`, `country`, `category`, `color`, `time`) VALUES
(2, '/productPhoto/PniyBOoW0IRI-U5xDHL6C569vDhjkqRRinz_GVIpgEQemHqvmK.png', 'Цветочный онигири', 8, 75, 'Россия', 3, 'есть', '2023-01-16 12:39:15'),
(5, '/productPhoto/EZ6-KDgHADt02Cd_IHAUT3rA7HwZw8-mjOZseBvt2Ut-4FEWRu.png', 'Свадебная открытка', 50, 150, 'Россия', 3, 'зеленый', '2023-01-20 12:39:15'),
(6, '/productPhoto/Jdt-_bTrHkvrYSwM4uP_6EEO3WEq42MKeMdo_Z8Ndby4dxaf6o.jpg', 'Открытка мини', 48, 50, 'Россия', 3, 'белый', '2023-01-20 12:39:15'),
(7, '/productPhoto/ckrkwlVHTKipmF9GDAOzYuiH3tfeUMcZzChMWIaFj4pIuoShUz.png', 'Открытка с сухоцветом', 99, 160, 'Россия', 3, 'белый', '2023-01-20 12:39:15'),
(8, '/productPhoto/W0CsNarEkQq9E3j6NWmaiEKKhkhIGGKJbPFkn8bs-HhHL-MIFA.jpg', 'Сухоцвет лаванда', 50, 140, 'Россия', 4, 'сирень', '2023-01-20 12:39:16'),
(9, '/productPhoto/VhhlZdrYS0ERkMvjKlnLPapU1_Di__4daq2RrBAfmxA7fzkPXz.jpg', 'Ножницы', 50, 350, 'Россия', 4, 'золото', '2023-01-20 12:39:16'),
(10, '/productPhoto/q12J9ttvUN9wvtHH_w5J1oGsVj5pBWx5R_KQ-FtyXC2e43XCgf.jpg', 'Ленты на выбор (метр)', 35, 40, 'Россия', 4, 'разный', '2023-01-20 12:39:16'),
(11, '/productPhoto/UsF3AOQc-L4rbs-PCHFhyO6f5CzMj2F_eFG5WlQNAUqL-Iv2W-.jpg', 'Свадебная бутоньерка', 40, 200, 'Россия', 4, 'белый', '2023-01-20 12:39:16'),
(12, '/productPhoto/D4K8s9SylxsHJhNh_TeLqVLW1APCED5BEtZPlbrhf9_BVuf8OU.jpg', 'Комплект свадебный', 40, 550, 'Россия', 4, 'белый', '2023-01-20 12:39:16'),
(13, '/productPhoto/siH5j2LnYPzyjvLMzYWo-cbTbYWhhLdSYkxZRkQU9B2gEgxyno.jpg', 'Тюльпан белый', 50, 80, 'Голландия', 1, 'белый', '2023-01-21 12:39:16'),
(14, '/productPhoto/CbCOVEqOHFKCwH6Qn_gh0YkX_ZHARrKBAB8peRBCiNd6dUjUlZ.jpg', 'Тюльпан розовый', 40, 80, 'Голландия', 1, 'розовый', '2023-01-21 12:39:16'),
(15, '/productPhoto/RZFmFoVUtdTmXuM4gxIu0QJwdh6pIww47zuR0TSjftzMhitOgb.jpg', 'Гипсофила', 40, 50, 'Голландия', 1, 'белый', '2023-01-21 12:39:16'),
(16, '/productPhoto/zZSpDmfW6HZxORn3SpS3ctO1dfFxUTYdp-75xe3iagqwLbiGu0.jpg', 'Лимониум', 50, 60, 'Голландия', 1, 'сирень', '2023-01-21 12:39:16'),
(17, '/productPhoto/PubqidauX5XeBVV7uctMfUhlo3_4v7Jv3r62hfJ05UXrlBMcrN.jpg', 'Орхидея розовая', 30, 120, 'Голландия', 1, 'розовый', '2023-01-21 12:39:16'),
(18, '/productPhoto/LOBJi4NOK1o7D4MEGRvbU9PLvoAWGiKyjEvpnfmL0UQdqi31Dj.jpg', 'Пион белый', 50, 95, 'Голландия', 1, 'белый', '2023-01-21 12:39:16'),
(19, '/productPhoto/Ghv5dGHtKIJZXcmjGMNosObz2OrSA5LH5Fk1-gRxSkFG8JiTFK.jpg', 'Фрезия', 35, 70, 'Голландия', 1, 'белый', '2023-01-21 12:39:16'),
(20, '/productPhoto/VHS0AL2eKL4509ehez88XQVeMo6xUeFZdFB5mGFMENXjfttbmx.jpg', 'Ромашка', 50, 55, 'Голландия', 1, 'белый', '2023-01-21 12:39:16'),
(21, '/productPhoto/niY5BA9cxMA7c84IyoFRV3AuvUPhSJDA6TRUcdTDRCHrYaLodC.jpg', 'Букет свадебный', 5, 450, 'Голландия', 2, 'белый', '2023-01-22 12:39:16'),
(22, '/productPhoto/1yELRbmuhEn1nkIw68wiWCKxfMtTeHsW6GsKz6xDUSyOaV1TR_.jpg', 'Букет с антуриумом', 3, 1050, 'Голландия', 2, 'зеленый', '2023-01-21 12:39:16'),
(23, '/productPhoto/KRapRzZMjoi81j_3peqrxKlR2fAT4C33FMtOkgI9bwkFA0zZb_.jpg', 'Букет тюльпаны', 4, 965, 'Голландия', 2, 'белый', '2023-01-22 12:39:16'),
(24, '/productPhoto/O9n6GasAhPoZPct2Ej9oidqCc65esA0Fn8N9HbDY1P5hq0Q1qC.jpg', 'Букет гипсофила', 4, 846, 'Голландия', 2, 'белый', '2023-01-22 12:39:16'),
(25, '/productPhoto/3mOPG1V8XF_o8f_NDKMcifO7r_QbJdFBepbERpKdRVl0TDWSpf.jpg', 'Букет роза', 2, 2010, 'Голландия', 2, 'белый', '2023-01-22 12:39:16'),
(26, '/productPhoto/478ve8X_2FhS4nXTTEARVYNbfnAI-18wsPfFLQESgxzz489W0D.jpg', 'Букет хризантема', 4, 1809, 'Голландия', 2, 'белый', '2023-01-21 12:39:16');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'Иван', 'Кузнецов', 'Александрович', 'userbob', 'userbob@gmail.com', '123321', 1),
(3, 'Анастасия', 'Репейникова', 'Александровна', 'anast', 'anast@gmail.com', '001122Qq', 0),
(4, 'Иван', 'Демьян', 'Степанович', 'demuv', 'demuv@gmail.com', '12qwerty', 0),
(5, 'ааааа', 'зачем', 'ТакМногоБуков', 'anya', 'anya.zaebalas@shiza.blya', 'AAA111', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Индексы таблицы `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id_chart`),
  ADD KEY `user_ibfk_1` (`id_user`),
  ADD KEY `product_ibfk_1` (`id_prod`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_ord`),
  ADD KEY `user_ibfk_2` (`id_user`),
  ADD KEY `product_ibfk_2` (`id_prod`),
  ADD KEY `chart_ibfk_2` (`id_chart`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `cate_ibfk_1` (`category`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chart`
--
ALTER TABLE `chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_ord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `product` (`id_prod`),
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `chart_ibfk_2` FOREIGN KEY (`id_chart`) REFERENCES `chart` (`id_chart`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `product` (`id_prod`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `cate_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
