-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 01:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psa`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `admins_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `body`, `admins_id_fk`) VALUES
(1, 'ggggggggg', 'ffffffffffff', 5);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `img`) VALUES
(5, 'Ghaith', 'AbuSharaa', 'ghaithmohamad7@gmail.com', '732000', '0796277906', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_img`, `book_pdf`) VALUES
(1, 'book1', 'sss.jpg', 'matar.pdf'),
(2, 'book2', '430fa5bf955b632e57b605821ec2c566.png', '2022-06-02-12-35-41_matar(4).pdf'),
(3, 'book3', 'Screenshot 2022-03-22 002622.png', '2022-06-02-08-33-22_BIT481-Assignment-Spring 2021-2022.pdf'),
(4, 'ghaith book', '525B0507.JPG', '2022-06-24-10-20-48_ghaith4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `completed_task`
--

CREATE TABLE `completed_task` (
  `id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` date NOT NULL,
  `volunteer_id_fk` int(10) NOT NULL,
  `task_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_task`
--

INSERT INTO `completed_task` (`id`, `file_name`, `uploaded_on`, `volunteer_id_fk`, `task_id_fk`) VALUES
(3, 'Ghaith.docx', '2022-06-02', 8, 52),
(4, '2022-06-01-11-05-10Ghaith.docx', '2022-06-02', 8, 52),
(5, '2022-06-02-12-39-13_Ghaith.docx', '2022-06-02', 8, 52),
(6, '2022-06-24-09-47-05_new word file.docx', '2022-06-24', 8, 52),
(7, '2022-06-24-09-49-20_song.mp3', '2022-06-24', 8, 53);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`email`, `id`, `name`, `phone_number`, `message`) VALUES
('ghaithmohamad12@gmail.com', 1, 'Ghaith', '07964587052', 'ghaith is here dude so just chill.'),
('ghaithmohamad7@gmail.com', 2, 'myName', '0796277906', 'LetterLetterLetter'),
('ghaithmohamad7@live.com', 6, 'Laith', '0796277906', 'Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as “a group of sentences or a single sentence that forms a unit” (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph. For instanc'),
('jehad@gmail.com', 7, 'jehad', '04823842309', 'djfbpiuebrvnqervunaevn;ern;jf'),
('ghaithmohamad7@gmail.com', 8, 'sdfsdfg', '04823842309', 'zdfbsdfbsdfbsdfb'),
('ghaithmohamad12@gmail.com', 12, 'ahmad', '0796277906', 'hello...'),
('', 13, '', '', ''),
('ghaithmohamad12@gmail.com', 14, 'Ghaith AbuSharaa', '0796277902', 'ghaioth'),
('jehad@gmail.com', 16, 'jehad', '0798', 'ghaith'),
('jehad@gmail.com', 17, 'jehad', '0798', 'ghaith'),
('jehad@gmail.com', 18, 'jehad', '0798', 'ghaith'),
('jehad@gmail.com', 19, 'jehad', '0798', 'ghaith'),
('ghaithmohamad7@live.com', 25, 'Ghaith Abusharaa', '0796277906', 'adfvadfvdfvdfv'),
('ghaithmohamad7@live.com', 26, 'Ghaith Abusharaa', '0796277906', 'adfvadfvdfvdfv'),
('tamer@yahoo.com', 27, 'Ghaith', '0796277902', 'xcvbsbwdg'),
('ghaithmohamad555@gmail.com', 28, 'cvbs', '0796277906', 'ghghgh'),
('0', 29, 'alert()', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `admins_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `whatsapp`, `email`, `facebook`, `instagram`, `linkedin`, `twitter`, `admins_id_fk`) VALUES
(1, 'https://www.whatsapp.com', 'ghaith@gamil.com', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com', 'https://www.twitter.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` blob NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `volunteer_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `volunteer_id_fk`) VALUES
(155, 0x35323542303539382e4a5047, '2022-05-28 03:08:11', 8),
(157, 0x35323542303538352e4a5047, '2022-05-31 22:37:12', 8),
(158, 0x7373732e6a7067, '2022-06-01 15:48:44', 8),
(159, 0x323032322d30362d30322d31322d32322d33315f35323542303539382d6d6f6469666965642e4a5047, '2022-06-02 01:22:31', 25),
(160, 0x323032322d30362d30322d31322d32342d32335f34333066613562663935356236333265353762363035383231656332633536362e706e67, '2022-06-02 01:24:23', 8),
(161, 0x323032322d30362d30322d31322d32342d33345f48442d77616c6c70617065722dc4b074616368692d6e617275746f2d736173756b652d6d6f6f6e2d6974616368692d6d61646172612d7563686968612d6974616368692d7368697375692d616e696d652e6a7067, '2022-06-02 01:24:34', 8),
(162, 0x323032322d30362d30322d31322d32352d32395f48442d77616c6c70617065722dc4b074616368692d6e617275746f2d736173756b652d6d6f6f6e2d6974616368692d6d61646172612d7563686968612d6974616368692d7368697375692d616e696d652e6a7067, '2022-06-02 01:25:29', 8),
(163, 0x323032322d30362d30322d31322d32362d30345f6177732e6a706567, '2022-06-02 01:26:04', 25),
(164, 0x323032322d30362d30322d31322d32372d31375f37333264306539643737646532306431373164663231326135666166646632642e6a7067, '2022-06-02 01:27:17', 8),
(165, 0x323032322d30362d30322d31322d32372d34325f35323542303539382d6d6f6469666965642e4a5047, '2022-06-02 01:27:42', 25),
(166, 0x323032322d30362d30322d31322d30382d31365f73696768746c657373312e6a7067, '2022-06-02 13:08:16', 8),
(167, 0x323032322d30362d30332d30332d35332d34305f35323542303539382d72656d6f766562672d707265766965772e706e67, '2022-06-03 16:53:40', 7),
(168, 0x323032322d30362d32342d30362d35342d30335f35323542303539392e4a5047, '2022-06-24 19:54:03', 8),
(169, 0x323032322d30362d32342d30372d33372d32335f35323542303532382e4a5047, '2022-06-24 20:37:23', 8),
(170, 0x323032322d30362d32342d30372d34312d30355f35323542303530372e4a5047, '2022-06-24 20:41:05', 8),
(171, 0x323032322d30362d32342d30372d34332d30365f35323542303530382e4a5047, '2022-06-24 20:43:06', 8),
(172, 0x323032322d30362d32342d30372d34332d31355f35323542303532322e4a5047, '2022-06-24 20:43:15', 8),
(173, 0x323032322d30362d32342d30372d34332d33345f35323542303533362e4a5047, '2022-06-24 20:43:34', 8),
(174, 0x323032322d30362d32342d30372d34342d33355f35323542303532302e4a5047, '2022-06-24 20:44:35', 8),
(175, 0x323032322d30362d32342d30372d34352d34325f35323542303530382e4a5047, '2022-06-24 20:45:42', 8),
(176, 0x323032322d30362d32342d30372d34352d35395f35323542303530392e4a5047, '2022-06-24 20:45:59', 8),
(177, 0x323032322d30362d32342d30372d34392d33395f35323542303530382e4a5047, '2022-06-24 20:49:39', 8),
(178, 0x323032322d30362d32342d30372d35332d34325f35323542303532382e4a5047, '2022-06-24 20:53:42', 8),
(179, 0x323032322d30362d32342d30372d35342d30325f35323542303530392e4a5047, '2022-06-24 20:54:02', 8);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `volunteer_id_fk` int(11) DEFAULT NULL,
  `task_status_id` int(11) NOT NULL,
  `book_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `duration`, `start_date`, `type`, `chapter`, `description`, `volunteer_id_fk`, `task_status_id`, `book_id_fk`) VALUES
(52, '1 0 0', '2022-06-01', 'pdf to word', '1-5', 'description', 7, 2, 1),
(53, '0 5 0', '2022-06-16', 'pdf to voice', '10-20', 'none', 8, 6, 3),
(54, '1 0 0', '2022-06-24', 'pdf to word', '0-5', 'duuuuuuuuuuuuuuude', 8, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `status`) VALUES
(1, 'New'),
(2, 'Finished'),
(3, 'Deleted'),
(4, 'Not Complete'),
(5, 'Complete'),
(6, 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded`
--

CREATE TABLE `uploaded` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded`
--

INSERT INTO `uploaded` (`id`, `file_name`, `uploaded_on`) VALUES
(21, '', '2022-06-01'),
(22, '', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `vmessage`
--

CREATE TABLE `vmessage` (
  `id` int(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vmessage`
--

INSERT INTO `vmessage` (`id`, `message`) VALUES
(1, 'Please pay atenmdfdfd;fdf.....'),
(2, 'Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay attention dude!!Please pay a'),
(3, 'Mr Ahmad : please book the task number 52 again, contact admin for more details.'),
(4, 'attention : blah blah blah ...'),
(5, 'please try to finish all of your tasks ...');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `admins_id_fk` int(11) NOT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `first_name`, `last_name`, `status`, `email`, `password`, `phone_number`, `admins_id_fk`, `bio`) VALUES
(6, 'nadeem', 'naddaf', 'Accepted', 'nadeem@gmail.com', '987654321', '0788498740', 5, NULL),
(7, 'nader', 'ali', 'Accepted', 'nader@gmail.com', '123456', '079685543', 5, ''),
(8, 'ahmad', 'ali', 'Accepted', 'ahmad@gmail.com', '123456', '0796277906', 5, 'hello my name is ahmad '),
(25, 'ali', 'malek', 'OnHold', 'ali@gmail.com', '123456', '0796277110', 5, ''),
(27, 'fares', 'ahmad', 'Blocked', 'fares@gmail.com', '123456', '0788498740', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_id_fk` (`admins_id_fk`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_task`
--
ALTER TABLE `completed_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voluteer_id_fk` (`volunteer_id_fk`),
  ADD KEY `task_id_fk` (`task_id_fk`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_id_fk` (`admins_id_fk`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `volunteer_id_fk` (`volunteer_id_fk`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `volunteer_id_fk` (`volunteer_id_fk`),
  ADD KEY `task_status_id` (`task_status_id`),
  ADD KEY `book_id_fk` (`book_id_fk`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded`
--
ALTER TABLE `uploaded`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmessage`
--
ALTER TABLE `vmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admins_id_fk` (`admins_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `completed_task`
--
ALTER TABLE `completed_task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE `uploaded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vmessage`
--
ALTER TABLE `vmessage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`admins_id_fk`) REFERENCES `admins` (`id`);

--
-- Constraints for table `completed_task`
--
ALTER TABLE `completed_task`
  ADD CONSTRAINT `completed_task_ibfk_1` FOREIGN KEY (`volunteer_id_fk`) REFERENCES `volunteers` (`id`),
  ADD CONSTRAINT `completed_task_ibfk_2` FOREIGN KEY (`task_id_fk`) REFERENCES `task` (`id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`admins_id_fk`) REFERENCES `admins` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`volunteer_id_fk`) REFERENCES `volunteers` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`volunteer_id_fk`) REFERENCES `volunteers` (`id`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`task_status_id`) REFERENCES `task_status` (`id`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `volunteers_ibfk_1` FOREIGN KEY (`admins_id_fk`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
