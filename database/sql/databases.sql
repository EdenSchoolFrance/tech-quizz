-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 mars 2025 à 13:15
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quiz_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question`
(
    `id_question`   int(11) NOT NULL,
    `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `question_type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question_text`, `question_type`)
VALUES (1, 'What keyword is used to declare a variable in JavaScript?', 'QCM'),
       (2, 'What is the output of console.log(typeof []) ?', 'QCM'),
       (3, 'How do you write a single-line comment in JavaScript?', 'QCM'),
       (4, 'What does the expression Boolean(\'false\') return?', 'QCM'),
       (5, 'Which method is used to add an element to the end of an array in JavaScript?', 'QCM'),
       (6, 'What is the output of console.log(2 + \"2\") ?', 'QCM'),
       (7, 'Which structure is used to execute code repeatedly?', 'QCM'),
       (8, 'Which object is used to manipulate dates in JavaScript?', 'QCM'),
       (9, 'What does the JSON.stringify() method do?', 'QCM'),
       (10, 'What is the difference between == and === in JavaScript?', 'QCM'),
       (11, 'What is the role of HTML?', 'QCM'),
       (12, 'What is the correct tag to insert an image in HTML?', 'QCM'),
       (13, 'Which tag is used to create a hyperlink?', 'QCM'),
       (14, 'What is the basic structure of an HTML document?', 'QCM'),
       (15, 'Which tag is used to insert an unordered list?', 'QCM'),
       (16, 'How do you create an input field for a form in HTML?', 'QCM'),
       (17, 'Which tag is used to create a table in HTML?', 'QCM'),
       (18, 'Which attribute allows you to open a link in a new tab?', 'QCM'),
       (19, 'Which tag is used to define a navigation section?', 'QCM'),
       (20, 'What is the correct semantics for a first-level heading in HTML?', 'QCM'),
       (21, 'What does CSS stand for?', 'QCM'),
       (22, 'Which CSS property is used to change the text color?', 'QCM'),
       (23, 'Which CSS selector is used to target an element with id=\"menu\"?', 'QCM'),
       (24, 'Which CSS rule adds 10px of padding inside an element?', 'QCM'),
       (25, 'What is the effect of display: flex; on an element?', 'QCM'),
       (26, 'Which CSS property is used to round the corners of an element?', 'QCM'),
       (27, 'Which position value allows an element to stay fixed at the top of the page while scrolling?', 'QCM'),
       (28, 'Which property is used to add a shadow to text in CSS?', 'QCM'),
       (29, 'Which CSS rule is used to apply a style only when the user hovers over an element?', 'QCM'),
       (30, 'Which CSS unit is relative to the parent element\'s font size?', 'QCM'),
(31, 'What is web accessibility?', 'QCM'),
(32, 'Which HTML tag is used to provide alternative text for images?', 'QCM'),
(33, 'What does WCAG stand for?', 'QCM'),
(34, 'Which text color provides the best contrast on a white background?', 'QCM'),
(35, 'Which ARIA attribute is used to define a text alternative when no visible text is available?', 'QCM'),
(36, 'What does keyboard navigation allow?', 'QCM'),
(37, 'Why is it important to use semantic HTML tags (<header>, <nav>, <main>, <footer>)?', 'QCM'),
(38, 'What is essential to make a website accessible to visually impaired users?', 'QCM'),
(39, 'Which CSS property improves readability for dyslexic people?', 'QCM'),
(40, 'Which tool can be used to test the accessibility of a website?', 'QCM');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `title`, `category`, `difficulty`) VALUES
(1, 'Quiz JavaScript', 'Développement Web', 'medium'),
(2, 'Quiz HTML', 'Développement Web', 'easy'),
(3, 'Quiz CSS', 'Développement Web', 'medium'),
(4, 'Quiz Accessibilité Web', 'Développement Web', 'hard');

-- --------------------------------------------------------

--
-- Structure de la table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `id_question` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quiz_question`
--

INSERT INTO `quiz_question` (`id_question`, `id_quiz`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4);

-- --------------------------------------------------------

--
-- Structure de la table `response`
--

CREATE TABLE `response` (
  `id_response` int(11) NOT NULL,
  `id_question` int(11) DEFAULT NULL,
  `response_text` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_response_true` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `response`
--

INSERT INTO `response` (`id_response`, `id_question`, `response_text`, `is_response_true`) VALUES
(1, 1, 'let', 0),
(2, 1, 'var', 0),
(3, 1, 'const', 0),
(4, 1, 'All of the above', 1),
(5, 2, '\"array\"', 0),
(6, 2, '\"object\"', 1),
        (7, 2, '\"undefined\"', 0),
        (8, 2, '\"function\"', 0),
        (9, 3, '# This is a comment', 0),
        (10, 3, '/* This is a comment */', 0),
        (11, 3, '// This is a comment', 1),
        (12, 3, '-- This is a comment', 0),
        (13, 11, 'Defines the structure of a webpage', 1),
        (14, 11, 'Applies style to webpages', 0),
        (15, 11, 'Adds interactivity', 0),
        (16, 11, 'Stores data', 0),
        (17, 12, '<image>', 0),
        (18, 12, '<img>', 1),
        (19, 12, '<picture>', 0),
        (20, 12, '<photo>', 0),
        (21, 21, 'Creative Style Sheets', 0),
        (22, 21, 'Cascading Style Sheets', 1),
        (23, 21, 'Computer Styled Sections', 0),
        (24, 21, 'Colorful Style Sheets', 0),
        (25, 22, 'text-color', 0),
        (26, 22, 'color', 1),
        (27, 22, 'font-color', 0),
        (28, 22, 'text-style', 0),
        (29, 31, 'A set of rules to make a website faster', 0),
        (30, 31, 'Adapting websites for users with disabilities', 1),
        (31, 31, 'A principle to improve SEO', 0),
        (32, 31, 'A technology for creating animations', 0),
        (33, 32, 'title', 0),
        (34, 32, 'alt', 1),
        (35, 32, 'aria-label', 0),
        (36, 32, 'desc', 0);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat`
(
    `id_resultat` int(11) NOT NULL,
    `id_user`     int(11) DEFAULT NULL,
    `user_score`  int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`id_resultat`, `id_user`, `user_score`)
VALUES (1, 1, 10),
       (2, 2, 5),
       (3, 3, 7);

-- --------------------------------------------------------

--
--
-- Déchargement des données de la table `user`
--

INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`)
VALUES ('admin1', 'admin1@example.com', 'hashed_password', now(), now()),
       ('user1', 'user1@example.com', 'hashed_password', now(), now()),
       ('user2', 'user2@example.com', 'hashed_password', now(), now());

-- --------------------------------------------------------

--
-- Structure de la table `user_quiz`
--

CREATE TABLE `user_quiz`
(
    `id_user` int(11) NOT NULL,
    `id_quiz` int(11) NOT NULL,
    `status`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_quiz`
--

INSERT INTO `user_quiz` (`id_user`, `id_quiz`, `status`)
VALUES (1, 1, 'completed'),
       (2, 2, 'in_progress'),
       (3, 3, 'started');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `question`
--
ALTER TABLE `question`
    ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
    ADD PRIMARY KEY (`id_quiz`);

--
-- Index pour la table `quiz_question`
--
ALTER TABLE `quiz_question`
    ADD PRIMARY KEY (`id_question`, `id_quiz`),
  ADD KEY `id_quiz` (`id_quiz`);

--
-- Index pour la table `response`
--
ALTER TABLE `response`
    ADD PRIMARY KEY (`id_response`),
  ADD KEY `id_question` (`id_question`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
    ADD PRIMARY KEY (`id_resultat`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user_quiz`
--
ALTER TABLE `user_quiz`
    ADD PRIMARY KEY (`id_user`, `id_quiz`),
  ADD KEY `id_quiz` (`id_quiz`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
    MODIFY `id_question` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
    MODIFY `id_quiz` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `response`
--
ALTER TABLE `response`
    MODIFY `id_response` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
    MODIFY `id_resultat` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `quiz_question`
--
ALTER TABLE `quiz_question`
    ADD CONSTRAINT `quiz_question_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_question_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON
DELETE
CASCADE ON
UPDATE CASCADE;

--
-- Contraintes pour la table `response`
--
ALTER TABLE `response`
    ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
    ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_quiz`
--
ALTER TABLE `user_quiz`
    ADD CONSTRAINT `user_quiz_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_quiz_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON
DELETE
CASCADE ON
UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
