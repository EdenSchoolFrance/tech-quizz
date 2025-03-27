-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 mars 2025 à 15:56
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` varchar(20) NOT NULL,
  `question_id` varchar(20) DEFAULT NULL,
  `answer_text` text NOT NULL,
  `is_correct` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer_text`, `is_correct`) VALUES
('64fb2aa2c1d78', '64fb2aa1d3c45', 'let', 0),
('64fb2aa3b0f89', '64fb2aa1d3c45', 'var', 0),
('64fb2aa49fa9a', '64fb2aa1d3c45', 'const', 0),
('64fb2aa58cabb', '64fb2aa1d3c45', 'All of the above', 1),
('64fb2aa767cdd', '64fb2aa678bcc', '\"array\"', 0),
('64fb2aa856dee', '64fb2aa678bcc', '\"object\"', 1),
('64fb2aa945eff', '64fb2aa678bcc', '\"undefined\"', 0),
('64fb2aaa34f00', '64fb2aa678bcc', '\"function\"', 0),
('64fb2aac12e22', '64fb2aab23d11', '# This is a comment', 0),
('64fb2aad01f33', '64fb2aab23d11', '/* This is a comment */', 0),
('64fb2aadf0e44', '64fb2aab23d11', '// This is a comment', 1),
('64fb2aaed0f55', '64fb2aab23d11', '-- This is a comment', 0),
('64fb2ab0bef77', '64fb2aafcfd66', 'true', 1),
('64fb2ab1adf88', '64fb2aafcfd66', 'false', 0),
('64fb2ab29ce99', '64fb2aafcfd66', 'undefined', 0),
('64fb2ab38bdaa', '64fb2aafcfd66', 'NaN', 0),
('64fb2ab569fcd', '64fb2ab47aebc', '.push()', 1),
('64fb2ab658fde', '64fb2ab47aebc', '.pop()', 0),
('64fb2ab747fef', '64fb2ab47aebc', '.shift()', 0),
('64fb2ab836f00', '64fb2ab47aebc', '.unshift()', 0),
('64fb2aba14f22', '64fb2ab925f11', '4', 0),
('64fb2abb03f33', '64fb2ab925f11', '22', 1),
('64fb2abbf2f44', '64fb2ab925f11', 'NaN', 0),
('64fb2abce1f55', '64fb2ab925f11', 'TypeError', 0),
('64fb2abeaff77', '64fb2abdd0f66', 'if', 0),
('64fb2abf9ef88', '64fb2abdd0f66', 'switch', 0),
('64fb2ac08df99', '64fb2abdd0f66', 'loop', 0),
('64fb2ac17cfaa', '64fb2abdd0f66', 'for', 1),
('64fb2ac35afcc', '64fb2ac26bfbb', 'Date', 1),
('64fb2ac449fdd', '64fb2ac26bfbb', 'Time', 0),
('64fb2ac538fee', '64fb2ac26bfbb', 'Clock', 0),
('64fb2ac628eff', '64fb2ac26bfbb', 'Calendar', 0),
('64fb2ac806f11', '64fb2ac717f00', 'Converts a JavaScript object to a JSON string', 1),
('64fb2ac9f5f22', '64fb2ac717f00', 'Converts a JSON string to a JavaScript object', 0),
('64fb2acae4f33', '64fb2ac717f00', 'Checks if a string is in JSON format', 0),
('64fb2acbd3f44', '64fb2ac717f00', 'None of the above', 0),
('64fb2acdb1f66', '64fb2accc2f55', 'No difference', 0),
('64fb2acef0f77', '64fb2accc2f55', '== compares values only, while === compares both values and types', 1),
('64fb2acfe0f88', '64fb2accc2f55', '=== compares values only', 0),
('64fb2ad0cff99', '64fb2accc2f55', '== compares memory references', 0),
('64fb2ad39cfcc', '64fb2ad2adfbb', 'Defines the structure of a webpage', 1),
('64fb2ad48bfdd', '64fb2ad2adfbb', 'Applies style to webpages', 0),
('64fb2ad57afee', '64fb2ad2adfbb', 'Adds interactivity', 0),
('64fb2ad669fff', '64fb2ad2adfbb', 'Stores data', 0),
('64fb2ad936222', '64fb2ad847111', 'Creative Style Sheets', 0),
('64fb2ada25333', '64fb2ad847111', 'Cascading Style Sheets', 1),
('64fb2adb14444', '64fb2ad847111', 'Computer Styled Sections', 0),
('64fb2adc03555', '64fb2ad847111', 'Colorful Style Sheets', 0),
('64fb2aded0888', '64fb2adde1777', 'A set of rules to make a website faster', 0),
('64fb2adfbf999', '64fb2adde1777', 'Adapting websites for users with disabilities', 1),
('64fb2ae0aeaaa', '64fb2adde1777', 'A principle to improve search engine optimization', 0),
('64fb2ae19dbbb', '64fb2adde1777', 'A technology for creating animations', 0),
('64fb2ae46aeee', '64fb2ae37bddd', 'let', 0),
('64fb2ae559fff', '64fb2ae37bddd', 'var', 0),
('64fb2ae648000', '64fb2ae37bddd', 'const', 0),
('64fb2ae737111', '64fb2ae37bddd', 'Toutes les réponses ci-dessus', 1),
('67e4116943179', '67e4116942746', 'test1', 1),
('67e41169438cf', '67e4116942746', 'test2', 0),
('67e4116943fbd', '67e4116942746', 'test3', 0),
('67e4116944623', '67e4116942746', 'test4', 0);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` varchar(20) NOT NULL,
  `quizz_id` varchar(20) DEFAULT NULL,
  `question_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `quizz_id`, `question_text`, `created_at`) VALUES
('64fb2aa1d3c45', '64fb2aa0e5f12', 'What keyword is used to declare a variable in JavaScript?', '2025-03-24 13:36:51'),
('64fb2aa678bcc', '64fb2aa0e5f12', 'What is the output of console.log(typeof [])?', '2025-03-24 13:36:51'),
('64fb2aab23d11', '64fb2aa0e5f12', 'How do you write a single-line comment in JavaScript?', '2025-03-24 13:36:51'),
('64fb2aafcfd66', '64fb2aa0e5f12', 'What does the expression Boolean(\'false\') return?', '2025-03-24 13:36:51'),
('64fb2ab47aebc', '64fb2aa0e5f12', 'Which method is used to add an element to the end of an array in JavaScript?', '2025-03-24 13:36:51'),
('64fb2ab925f11', '64fb2aa0e5f12', 'What is the output of console.log(2 + \'2\')?', '2025-03-24 13:36:51'),
('64fb2abdd0f66', '64fb2aa0e5f12', 'Which structure is used to execute code repeatedly?', '2025-03-24 13:36:51'),
('64fb2ac26bfbb', '64fb2aa0e5f12', 'Which object is used to manipulate dates in JavaScript?', '2025-03-24 13:36:51'),
('64fb2ac717f00', '64fb2aa0e5f12', 'What does the JSON.stringify() method do?', '2025-03-24 13:36:51'),
('64fb2accc2f55', '64fb2aa0e5f12', 'What is the difference between == and === in JavaScript?', '2025-03-24 13:36:52'),
('64fb2ad2adfbb', '64fb2ad1befaa', 'What is the role of HTML?', '2025-03-24 13:36:52'),
('64fb2ad847111', '64fb2ad758000', 'What does CSS stand for?', '2025-03-24 13:36:52'),
('64fb2adde1777', '64fb2adcf2666', 'What is web accessibility?', '2025-03-24 13:36:52'),
('64fb2ae37bddd', '64fb2ae28cccc', 'Quel mot-clé est utilisé pour déclarer une variable en JavaScript ?', '2025-03-24 13:36:52'),
('67e4116942746', '67e2b7db58230', 'testtest', '2025-03-26 14:38:33');

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

CREATE TABLE `quizz` (
  `id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id`, `title`, `description`, `created_by`, `created_at`) VALUES
('64fb2aa0e5f12', 'JavaScript Quiz', 'Quiz importé depuis JSON', '64fb2a9ec7d53', '2025-03-24 13:36:51'),
('64fb2ad1befaa', 'HTML Quiz', 'Quiz importé depuis JSON', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2ad758000', 'CSS Quiz', 'Quiz importé depuis JSON', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2adcf2666', 'Web Accessibility Quiz', 'Quiz importé depuis JSON', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2ae28cccc', 'Quiz JavaScript', 'Quiz importé depuis JSON (FR)', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2ae826222', 'Quiz HTML', 'Quiz importé depuis JSON (FR)', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2ae915333', 'Quiz CSS', 'Quiz importé depuis JSON (FR)', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('64fb2aea04444', 'Quiz Accessibilité Web', 'Quiz importé depuis JSON (FR)', '64fb2a9ec7d53', '2025-03-24 13:36:52'),
('67e2b7db58230', 'Terraria', 'Let&#039;s try your Terraria knowledge', '67e2b4de27883', '2025-03-25 14:04:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `is_active`) VALUES
('64fb2a9ec7d53', 'admin', 'admin@example.com', '$2y$10$someHashedPassword', 'admin', '2025-03-24 13:36:51', 0),
('67d98e752203f', 'Auguste', 'auguste.dollinger@gmail.com', '$2y$10$4Gxfbntw4gNcbIN5kRKVQeQOXbH2HWYOBjxyY1f1qosTTvH/xklrG', 'admin', '2025-03-18 15:17:09', 0),
('67d99884d0654', 'ilan', 'Ilanbonobo@gmail.com', '$2y$10$NSDGraA5xw8NqjN84DPkQeEBEDZ2Bs0ABlXLSZkOMWotWAIwSJ/8y', 'user', '2025-03-18 16:00:05', 0),
('67e2b4de27883', 'Test', 'test@gmal.com', '$2y$10$KFhbWV8Fo7YBpJFgfIgATufqSL3d27Msya65qpQ3JbgVMVT0CsfJe', 'admin', '2025-03-25 13:51:26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` varchar(20) NOT NULL,
  `try_id` varchar(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `question_id` varchar(20) DEFAULT NULL,
  `answer_id` varchar(20) DEFAULT NULL,
  `answered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_answers`
--

INSERT INTO `user_answers` (`id`, `try_id`, `user_id`, `question_id`, `answer_id`, `answered_at`) VALUES
('67e2af0c608ce', '67e2af0a2a41e', '67d98e752203f', '64fb2aa1d3c45', '64fb2aa58cabb', '2025-03-25 13:26:36'),
('67e2af1421604', '67e2af0a2a41e', '67d98e752203f', '64fb2aa678bcc', '64fb2aa856dee', '2025-03-25 13:26:44'),
('67e2af1756a5a', '67e2af0a2a41e', '67d98e752203f', '64fb2aab23d11', '64fb2aadf0e44', '2025-03-25 13:26:47'),
('67e2af1fcbe18', '67e2af0a2a41e', '67d98e752203f', '64fb2aafcfd66', '64fb2ab1adf88', '2025-03-25 13:26:55'),
('67e2af2e70a91', '67e2af0a2a41e', '67d98e752203f', '64fb2ab47aebc', '64fb2ab569fcd', '2025-03-25 13:27:10'),
('67e2af33c4d42', '67e2af0a2a41e', '67d98e752203f', '64fb2ab925f11', '64fb2abb03f33', '2025-03-25 13:27:15'),
('67e2af3ee496f', '67e2af0a2a41e', '67d98e752203f', '64fb2abdd0f66', '64fb2ac08df99', '2025-03-25 13:27:26'),
('67e2af4884ba3', '67e2af0a2a41e', '67d98e752203f', '64fb2ac26bfbb', '64fb2ac35afcc', '2025-03-25 13:27:36'),
('67e2af57cc75f', '67e2af0a2a41e', '67d98e752203f', '64fb2ac717f00', '64fb2ac806f11', '2025-03-25 13:27:51'),
('67e2af5e27945', '67e2af0a2a41e', '67d98e752203f', '64fb2accc2f55', '64fb2acef0f77', '2025-03-25 13:27:58'),
('67e2b02631e06', '67e2b02480513', '67d98e752203f', '64fb2aa1d3c45', '64fb2aa2c1d78', '2025-03-25 13:31:18'),
('67e2b028027f3', '67e2b02480513', '67d98e752203f', '64fb2aa678bcc', '64fb2aaa34f00', '2025-03-25 13:31:20'),
('67e2b02995c30', '67e2b02480513', '67d98e752203f', '64fb2aab23d11', '64fb2aaed0f55', '2025-03-25 13:31:21'),
('67e2b02ac2062', '67e2b02480513', '67d98e752203f', '64fb2aafcfd66', '64fb2ab38bdaa', '2025-03-25 13:31:22'),
('67e2b02bd0f16', '67e2b02480513', '67d98e752203f', '64fb2ab47aebc', '64fb2ab836f00', '2025-03-25 13:31:23'),
('67e2b02ccc15b', '67e2b02480513', '67d98e752203f', '64fb2ab925f11', '64fb2abce1f55', '2025-03-25 13:31:24'),
('67e2b02e0b5bf', '67e2b02480513', '67d98e752203f', '64fb2abdd0f66', '64fb2ac17cfaa', '2025-03-25 13:31:26'),
('67e2b02f0cb00', '67e2b02480513', '67d98e752203f', '64fb2ac26bfbb', '64fb2ac628eff', '2025-03-25 13:31:27'),
('67e2b030126db', '67e2b02480513', '67d98e752203f', '64fb2ac717f00', '64fb2acbd3f44', '2025-03-25 13:31:28'),
('67e2b0311f8ad', '67e2b02480513', '67d98e752203f', '64fb2accc2f55', '64fb2ad0cff99', '2025-03-25 13:31:29'),
('67e2b12bc7119', '67e2b122d7a0b', '67d98e752203f', '64fb2ad847111', '64fb2ada25333', '2025-03-25 13:35:39'),
('67e2b75ba7caa', '67e2b757c9fb4', '67e2b4de27883', '64fb2ad2adfbb', '64fb2ad39cfcc', '2025-03-25 14:02:03'),
('67e2b7608b8e0', '67e2b75dc287a', '67e2b4de27883', '64fb2ad2adfbb', '64fb2ad57afee', '2025-03-25 14:02:08'),
('67e2b783f2029', '67e2b77e66179', '67e2b4de27883', '64fb2aa1d3c45', '64fb2aa58cabb', '2025-03-25 14:02:43'),
('67e2b78aa790f', '67e2b77e66179', '67e2b4de27883', '64fb2aa678bcc', '64fb2aa767cdd', '2025-03-25 14:02:50'),
('67e2b79596918', '67e2b77e66179', '67e2b4de27883', '64fb2aab23d11', '64fb2aad01f33', '2025-03-25 14:03:01'),
('67e2b7a0a741e', '67e2b77e66179', '67e2b4de27883', '64fb2aafcfd66', '64fb2ab1adf88', '2025-03-25 14:03:12'),
('67e2b7a38c82c', '67e2b77e66179', '67e2b4de27883', '64fb2ab47aebc', '64fb2ab836f00', '2025-03-25 14:03:15'),
('67e2b7a5e38a1', '67e2b77e66179', '67e2b4de27883', '64fb2ab925f11', '64fb2abbf2f44', '2025-03-25 14:03:17'),
('67e2b7a8f2f5c', '67e2b77e66179', '67e2b4de27883', '64fb2abdd0f66', '64fb2abeaff77', '2025-03-25 14:03:20'),
('67e2b7acd6bc5', '67e2b77e66179', '67e2b4de27883', '64fb2ac26bfbb', '64fb2ac538fee', '2025-03-25 14:03:24'),
('67e2b7afe9e21', '67e2b77e66179', '67e2b4de27883', '64fb2ac717f00', '64fb2ac9f5f22', '2025-03-25 14:03:27'),
('67e2b7b29f723', '67e2b77e66179', '67e2b4de27883', '64fb2accc2f55', '64fb2acef0f77', '2025-03-25 14:03:30'),
('67e3c14e6eb01', '67e3c14a33e0f', '67e2b4de27883', '64fb2aa1d3c45', '64fb2aa58cabb', '2025-03-26 08:56:46'),
('67e3c15941321', '67e3c14a33e0f', '67e2b4de27883', '64fb2aa678bcc', '64fb2aa856dee', '2025-03-26 08:56:57'),
('67e3c15edb688', '67e3c14a33e0f', '67e2b4de27883', '64fb2aab23d11', '64fb2aadf0e44', '2025-03-26 08:57:02'),
('67e3c16521b2f', '67e3c14a33e0f', '67e2b4de27883', '64fb2aafcfd66', '64fb2ab1adf88', '2025-03-26 08:57:09'),
('67e3c16bb1c6d', '67e3c14a33e0f', '67e2b4de27883', '64fb2ab47aebc', '64fb2ab569fcd', '2025-03-26 08:57:15'),
('67e3c17164b18', '67e3c14a33e0f', '67e2b4de27883', '64fb2ab925f11', '64fb2abce1f55', '2025-03-26 08:57:21'),
('67e3c17db0cd3', '67e3c14a33e0f', '67e2b4de27883', '64fb2abdd0f66', '64fb2ac17cfaa', '2025-03-26 08:57:33'),
('67e3c1828e6c3', '67e3c14a33e0f', '67e2b4de27883', '64fb2ac26bfbb', '64fb2ac449fdd', '2025-03-26 08:57:38'),
('67e3c18ea3e53', '67e3c14a33e0f', '67e2b4de27883', '64fb2ac717f00', '64fb2ac9f5f22', '2025-03-26 08:57:50'),
('67e3c1955005b', '67e3c14a33e0f', '67e2b4de27883', '64fb2accc2f55', '64fb2acef0f77', '2025-03-26 08:57:57'),
('67e3c24575914', '67e3c240e219c', '67e2b4de27883', '64fb2ad847111', '64fb2ada25333', '2025-03-26 09:00:53'),
('67e40e47abda9', '67e40e3b37eab', '67e2b4de27883', '64fb2aa1d3c45', '64fb2aa58cabb', '2025-03-26 14:25:11'),
('67e40e4e5ed68', '67e40e3b37eab', '67e2b4de27883', '64fb2aa678bcc', '64fb2aa856dee', '2025-03-26 14:25:18'),
('67e40e5166873', '67e40e3b37eab', '67e2b4de27883', '64fb2aab23d11', '64fb2aadf0e44', '2025-03-26 14:25:21'),
('67e40e554a794', '67e40e3b37eab', '67e2b4de27883', '64fb2aafcfd66', '64fb2ab0bef77', '2025-03-26 14:25:25'),
('67e40e579b858', '67e40e3b37eab', '67e2b4de27883', '64fb2ab47aebc', '64fb2ab569fcd', '2025-03-26 14:25:27'),
('67e40e5a6e102', '67e40e3b37eab', '67e2b4de27883', '64fb2ab925f11', '64fb2abb03f33', '2025-03-26 14:25:30'),
('67e40e5d56922', '67e40e3b37eab', '67e2b4de27883', '64fb2abdd0f66', '64fb2ac17cfaa', '2025-03-26 14:25:33'),
('67e40e6295bb1', '67e40e3b37eab', '67e2b4de27883', '64fb2ac26bfbb', '64fb2ac35afcc', '2025-03-26 14:25:38'),
('67e40e6626dcf', '67e40e3b37eab', '67e2b4de27883', '64fb2ac717f00', '64fb2ac9f5f22', '2025-03-26 14:25:42'),
('67e40e69749bb', '67e40e3b37eab', '67e2b4de27883', '64fb2accc2f55', '64fb2acef0f77', '2025-03-26 14:25:45'),
('67e41be1dade1', '67e41bde747d8', '67e2b4de27883', '67e4116942746', '67e4116944623', '2025-03-26 15:23:13');

-- --------------------------------------------------------

--
-- Structure de la table `user_quizz`
--

CREATE TABLE `user_quizz` (
  `id` varchar(20) NOT NULL,
  `try_id` varchar(20) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `quizz_id` varchar(20) DEFAULT NULL,
  `score` varchar(10) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_quizz`
--

INSERT INTO `user_quizz` (`id`, `try_id`, `user_id`, `quizz_id`, `score`, `completed_at`) VALUES
('67e2af5f848ff', '67e2af0a2a41e', '67d98e752203f', '64fb2aa0e5f12', '8 / 10', '2025-03-25 13:27:59'),
('67e2b03155084', '67e2b02480513', '67d98e752203f', '64fb2aa0e5f12', '1/10', '2025-03-25 13:31:29'),
('67e2b12cb86cf', '67e2b122d7a0b', '67d98e752203f', '64fb2ad758000', '1/1', '2025-03-25 13:35:40'),
('67e2b75c96be4', '67e2b757c9fb4', '67e2b4de27883', '64fb2ad1befaa', '1/1', '2025-03-25 14:02:04'),
('67e2b7b36726e', '67e2b77e66179', '67e2b4de27883', '64fb2aa0e5f12', '2/10', '2025-03-25 14:03:31'),
('67e3c195ed180', '67e3c14a33e0f', '67e2b4de27883', '64fb2aa0e5f12', '6/10', '2025-03-26 08:57:57'),
('67e3c2463a36a', '67e3c240e219c', '67e2b4de27883', '64fb2ad758000', '1/1', '2025-03-26 09:00:54'),
('67e40e6a07350', '67e40e3b37eab', '67e2b4de27883', '64fb2aa0e5f12', '9/10', '2025-03-26 14:25:46'),
('67e41c0821d49', '67e41bde747d8', '67e2b4de27883', '67e2b7db58230', '0/1', '2025-03-26 15:23:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_id` (`quizz_id`);

--
-- Index pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `try_id` (`try_id`);

--
-- Index pour la table `user_quizz`
--
ALTER TABLE `user_quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quizz_id` (`quizz_id`),
  ADD KEY `try_id` (`try_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizz_id`) REFERENCES `quizz` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `quizz_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_quizz`
--
ALTER TABLE `user_quizz`
  ADD CONSTRAINT `user_quizz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_quizz_ibfk_2` FOREIGN KEY (`quizz_id`) REFERENCES `quizz` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
