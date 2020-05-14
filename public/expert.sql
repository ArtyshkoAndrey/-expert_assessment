-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2020 г., 17:59
-- Версия сервера: 5.7.25-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `expert`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Умная среда', NULL, NULL),
(2, 'Умные технологии', NULL, NULL),
(3, 'Умное образование', NULL, NULL),
(4, 'Умная медицина', NULL, NULL),
(5, 'Умный транспорт', NULL, NULL),
(6, 'Умное управление', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `name`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Интернет-услуги', 1, NULL, NULL),
(2, 'Мобильные приложения (обеспечение качества жизни)', 1, NULL, NULL),
(3, 'Доступ к бесплатному Wi-Fi', 1, NULL, NULL),
(4, 'Социализация общества (участие в электронном правительстве)', 1, NULL, NULL),
(5, 'Интернет оплата всех услуг', 1, NULL, NULL),
(6, 'Экологический транспорт', 1, NULL, NULL),
(7, 'Оказание государственных услуг онлайн', 2, NULL, NULL),
(8, 'Использование населением ПК', 2, NULL, NULL),
(9, 'Использование населением сети Интернет', 2, NULL, NULL),
(10, 'Использование сети Интернет для заказа товаров и услуг', 2, NULL, NULL),
(11, 'Интернет аудитория', 2, NULL, NULL),
(12, 'Электронные технологии обучения', 2, NULL, NULL),
(25, 'Веб-сайты учебных учреждений', 3, NULL, NULL),
(26, 'Публикации студентов в научных изданиях', 3, NULL, NULL),
(27, 'Цитируемость научных работ преподавателей', 3, NULL, NULL),
(28, 'Дистанционное образование', 3, NULL, NULL),
(29, 'Изобретения и патенты', 3, NULL, NULL),
(30, 'Компетенции выпускаемых студентов', 3, NULL, NULL),
(31, 'Телемедицина', 4, NULL, NULL),
(32, 'Получение медицинских услуг онлайн', 4, NULL, NULL),
(33, 'Электронные медицинские карты', 4, NULL, NULL),
(34, 'Информированность населения', 4, NULL, NULL),
(35, 'Сообщества в Интернет пространстве для обсуждения пациентами и специалистами проблем здоровья', 4, NULL, NULL),
(36, 'Безопасность лечения пациентов', 4, NULL, NULL),
(37, 'Онлайн отслеживание перемещения общественного транспорта', 5, NULL, NULL),
(38, 'Умные светофоры', 5, NULL, NULL),
(39, 'Экологические виды транспорта', 5, NULL, NULL),
(40, 'Беспилотный общественный транспорт', 5, NULL, NULL),
(41, 'Возможность оплаты за проезд банковской картой/с помощью мобильного телефона в общественном транспорте', 5, NULL, NULL),
(42, 'Уровень развития систем оплаты за проезд в общественном транспорте в зависимости от пройденного расстояния', 5, NULL, NULL),
(43, 'Информированность населения', 6, NULL, NULL),
(44, 'Доля людей, принимающих участие в управлении городом с помощью социальных сетей', 6, NULL, NULL),
(45, 'Получение государственных услуг онлайн', 6, NULL, NULL),
(46, 'Онлайн-системы для обсуждения вопросов развития города', 6, NULL, NULL),
(47, 'Доля населения, имеющего электронную подпись', 6, NULL, NULL),
(48, 'Уровень прозрачности государственных закупок', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mark` int(11) NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_group_id_foreign` (`group_id`);

--
-- Индексы таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_question_id_foreign` (`question_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
