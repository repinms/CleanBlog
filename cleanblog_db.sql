-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 04 2022 г., 21:40
-- Версия сервера: 5.6.51
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cleanblog_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `name`, `date`, `logo`, `text`) VALUES
(1, 'Кардио дома без тренажеров: комплекс упражнений, правила выполнения', '2022-09-04', '1662315792.jpg', 'В последнее десятилетие занятия спортом приобрели широчайшую популярность среди молодежи. Массовое открытие спортклубов и фитнес-залов дает возможность людям разного возраста, из разных сфер деятельности и разных социальных слоев прийти сюда и начать свой нелегкий путь к изменениям в своей внешности. Недовольные своими пропорциями девушки, желающие набрать мышечную массу мужчины, а также те, кто хочет сбросить лишний вес, являются сегодня завсегдатаями подобного рода заведений. \r\nОднако в силу каких-либо трудностей – финансовых, временных, ограничительных – не все могут позволить себе удовольствие посещать спортивный клуб. Учитывая, что при этом рвение худеть и меняться к лучшему все-таки не пропадает, многие начинают искать способы заниматься тренировками в удобном для себя месте. И, конечно же, преобладающее большинство из них размышляют над проведением занятий в домашних условиях. Тренировки на кардио дома, без тренажеров, могут быть не менее действенными, нежели занятия, проводимые в спортклубе при помощи специального спортивного инвентаря. \r\nПольза кардио\r\nЕсли вы задались целью именно похудеть – избавиться от лишнего веса, – одним из наиболее действенных блоков в работе над своим телом для вас станет кардио. Дома, без тренажеров, тренировки данного направления дадут возможность справиться с поставленными задачами и дойти до желаемой цели так же эффективно, как и в тренажерном зале. Все зависит лишь от усердия худеющего, его нацеленности на результат, а также правильности выполнения конкретных упражнений и комплексного подхода к проблеме избавления от лишнего веса.\r\nСлово «кардио» пошло от греческой производной kardia: его значение предусматривает принадлежность к процессам в организме, которые связаны напрямую с работой сердца и физической активностью. Применение программы на кардио дома, в фитнес-зале или спортклубе является залогом формирования идеального тела и укрепления сердечно-сосудистой системы. Это подтверждают большинство проведенных медицинских исследований, которые говорят о значимости и порой даже необходимости осуществления подобного рода аэробных нагрузок на организм. Непосредственная польза выполнения тренировок с кардио в домашних условиях или в тренажерном зале при помощи специального оборудования включает в себя несколько основных наиболее значимых аспектов. \r\nУлучшается работа сердечно-сосудистой системы за счет того, что оказывается воздействие на сердечную мышцу – она тоже «тренируется», сокращается и растягивается. \r\nПовышается тонус мышц и сжигаются калории. \r\nРазвивается выносливость. Снижается уровень депрессивно-стагнационных процессов, а за счет выброса негативных эмоций повышается уровень эндорфина. \r\nУскоряются метаболические процессы. \r\nСнижается риск диабетических проявлений ввиду понижения чувствительности к скачкам уровня сахара в крови. \r\nВосстанавливается и улучшается работа дыхательной системы. \r\nУвеличивается плотность костной ткани.\r\n Помимо всего прочего, правильно выполненная структурированная работа над кардио улучшает самочувствие, повышает настроение, заряжает энергией и позитивом на целый день. Здесь главное все делать в меру, с соблюдением правил безопасности, чтобы тренировки с кардио дома, без тренажеров, не превратились в угрозу еще большую, чем опасность получить повреждения в спортзале. Ведь там присутствует гораздо более существенная вероятность травматизации при выполнении определенных упражнений. \r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comm_date` date NOT NULL,
  `comm_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Программирование'),
(2, 'Лайфхаки'),
(3, 'Автомобили'),
(4, 'Бизнес'),
(5, 'Здоровое питание'),
(6, 'Спорт'),
(7, 'Кулинария'),
(8, 'Компьютеры'),
(9, 'Новости'),
(10, 'Мода'),
(11, 'Путешествия'),
(12, 'Фильмы');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `type`) VALUES
(11, 'admin', '$2y$10$CMxmsQx2ir4MfNVB4HBMqu5LmaJuzfOzyeL.8rAE4QF32dPqFcp3m', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
