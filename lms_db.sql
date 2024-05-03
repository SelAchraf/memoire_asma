-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 mai 2024 à 18:52
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
-- Base de données : `lms_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `course_lang` varchar(25) NOT NULL,
  `course_tut` varchar(25) NOT NULL,
  `course_img` text NOT NULL,
  `course_total` int(200) NOT NULL,
  `progres_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_lang`, `course_tut`, `course_img`, `course_total`, `progres_value`) VALUES
(20, 'c++', 'Frensh', 'FormationVideo', '../image/courseimg/', 6, 0),
(22, 'java', 'english', 'formationVideo', '../image/courseimg/img6.png', 4, 100),
(23, 'PHP', 'English', 'Test', '../image/courseimg/img6.png', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` varchar(100) NOT NULL,
  `lesson_link` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `lesson_btn_etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_link`, `course_id`, `course_name`, `lesson_btn_etat`) VALUES
(12, 'Introduction', '../lessonvid/C   in 100 Seconds.mp4', 15, 'C++', 0),
(13, 'Introduction', '../lessonvid/', 20, 'c++', 0),
(14, 'conclusion', '../lessonvid/', 20, 'c++', 0),
(15, 'php', '../lessonvid/', 22, 'java', 1),
(16, 'py', '../lessonvid/img3.png', 22, 'java', 1),
(17, 'problem', '../lessonvid/', 20, 'c++', 0),
(18, 'introducion', '../lessonvid/', 23, 'PHP', 0),
(19, 'testing', '../lessonvid/about-1.jpg', 20, 'c++', 0),
(21, 'testing', '../lessonvid/', 23, 'PHP', 0),
(22, 'no', '../lessonvid/', 22, 'java', 1),
(25, '3', '../lessonvid/', 23, 'PHP', 0);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `username` varchar(240) NOT NULL,
  `password` varchar(249) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('dearprogrammer', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `progresprc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `choices` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`choices`)),
  `correct_choice` int(11) NOT NULL,
  `quiz_btn_etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`quiz_id`, `quiz_name`, `course_name`, `course_id`, `question`, `choices`, `correct_choice`, `quiz_btn_etat`) VALUES
(5, 'Quiz °1', 'C++', 15, 'What is a correct syntax to output &quot;Hello World&quot; in C++?', '[\"print(&quot;Hello world&quot;);\",\"cout&lt;&lt;&quot;Hello world&quot;;\",\"System.out.println(&quot;Hello world&quot;);\"]', 0, 0),
(6, 'Quiz °1', 'c++', 20, 'What is a correct syntax to output &quot;Hello World&quot; in C++?', '[\"print(&quot;Hello world&quot;);\",\"cout&lt;&lt;&quot;Hello world&quot;;\",\"System.out.println(&quot;Hello world&quot;);\"]', 0, 0),
(8, 'Quiz d\'aujourdhui', 'java', 22, 'asma is here', '[\"no\",\"yes\",\"yj(h\"]', 0, 1),
(9, 'first', 'c++', 20, 'asma isn&#039;t here', '[\"yj(h\",\"no\",\"yes\"]', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `course_name` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_name` varchar(100) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `password`) VALUES
(1, 'jhzd', 'jdhe', 'jevh'),
(2, 'gh', 'hjh', 'hg'),
(3, 'asma', 'dbfg', 'jhegjf'),
(4, 'asma', 'slsd', 'lzdfn'),
(5, 'd', 'f', 'v'),
(6, 'a', 'z', 's'),
(7, 'a', 'b', 'c'),
(8, 'ASMA', 'asma082013@gmail.com', '27082003'),
(9, 'Achraf', 'newachraf23@gmail.com', 'newnew23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Index pour la table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Index pour la table `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
