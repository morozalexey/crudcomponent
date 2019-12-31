-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 31 2019 г., 13:17
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `marlin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `dt_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `dt_add`, `name`, `text`, `user_id`, `hide`) VALUES
(4, '2019-10-23 13:27:46', 'Алексей', 'Супер', 1, 1),
(5, '2019-10-23 13:32:28', 'Алексей', 'Здорово', 1, 1),
(6, '2019-10-23 14:05:47', 'Алексей', 'Получилось', 1, 1),
(32, '2019-11-11 12:48:49', 'Иван', 'Z', 2, 1),
(34, '2019-12-26 21:00:00', 'Алексей', '111', 10, 1),
(35, '2019-12-26 21:00:00', 'Алексей', '2222', 10, 1),
(36, '2019-12-30 21:00:00', 'Иван', '!!!!!!!!', 12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `avatar`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(10, 'alexey.moroz87@gmail.com', '$2y$10$rD84oRO4YYZgdPGHUbuw0eSDmkbaNhNXFlPuD512jNztZ1EtNJDFK', 'Алексей', 'img/5e0b1f56bcb4f.jpg', 0, 1, 1, 1, 1577280352, 1577787198, 0),
(12, 'abuelofrio@yandex.ru', '$2y$10$Bv/ZKpuHQNnvckc4HB8eWOwWW/44zbrPt1w8YpPCVJ14mpF1HR022', 'Иван', 'img/5e0b1ee89ba1c.jpg', 0, 1, 1, 0, 1577280827, 1577782038, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(16, 16, 'alexey.moroz@mail.ru', '9KoaznTyIS_yXCvo', '$2y$10$epyMNyPlCc1F3JeiOArOY.DhzfPNKry3KooOfIQciXbCSQag.bie.', 1577868019),
(17, 12, 'abuelofrio1@yandex.ru', 'fHDI1Kz1euMiJ1K9', '$2y$10$9T8dosPZwSIIh/pENRrelucFAP2jalqUCO.QoJRv4RRM8yXXO9caC', 1577873264),
(15, 15, 'alexey.moroz@mail.ru', '8b-xEXPNp0HVjfNT', '$2y$10$doOmuARSuHY7JcAufqcm9uDteZx57DJa0LbxdrAU8k40wKmZT2Nji', 1577867852),
(13, 13, 'alexey.moroz@mail.ru', 'S8Wq80hzwR9xzQ_2', '$2y$10$/U2HlgqsYIqBAjkRswcDC.QNPBpwT7hSfZOz77MJylk4HqBe.bIvO', 1577795790),
(11, 11, 'ivan@mail.ru', 'gtaWWOa8Mg7sGVpW', '$2y$10$ffXXwO1a1jNHq5PGm4z/J.z1AlRmlmw0Cyv11UrOc3W2/w39XNkyG', 1577367178),
(14, 14, 'alexey.moroz@mail.ru', 'gLPBjpIBE-Rnx-lj', '$2y$10$akK3MOeBSkRVVkFfs7W.ne8AxDDyfHcHEln66WCbvh6KEfCJimqri', 1577867668);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('Av425yYmtvZCcdC_M5kjDHb5g8uRmCGpSpTHq4B1qp4', 29, 1577280852, 1577352852),
('eYHhYc7w8xM8cXiqbYjBy4GIeJqWyTMf0T0-XJrzHJg', 29, 1577280852, 1577352852),
('JVFsgydVCO4iS1ajXUlxZghs6CwDHBQiCYU_gYprLxo', 29, 1577280402, 1577352402),
('xCTh9pIxWr0Wv-cIU2QQtiJBzaelm0WtJ7IG0yLyILo', 29, 1577280402, 1577352402),
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 48.625, 1577280852, 1577352852),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 2.00811, 1577781620, 1578213620),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 67.6471, 1577787198, 1578327198),
('cUP3Rk5T08qq46rfTnh6f2Gb9SczC6v5dw3izhcqvLY', 0.00137731, 1577786983, 1577959783),
('4SIEqVSrUfbHDykIMNzQgj4bibgxQ9QnYLpxlq-85Dk', 2, 1577786864, 1578305264);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
