-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 04:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `author_f_name` varchar(25) NOT NULL,
  `author_l_name` varchar(25) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `author_f_name`, `author_l_name`, `date`) VALUES
(1, 19, 2, 'Great!', 'Ahadi', 'Josue', '2019-08-10 07:17:43'),
(4, 19, 2, 'Hhh', 'Ntwari', 'Tresor', '2019-08-16 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(4, 1, 'No', 'negativity.jpg', '2019-08-08 09:01:51'),
(5, 1, 'This is the right time.', 'quotes-I-look-to-a-day-when.jpg', '2019-08-08 09:19:05'),
(6, 1, 'No', '62348977_461825184361250_2916789883592769536_n.jpg', '2019-08-08 09:23:11'),
(14, 1, 'No', 'you-know-youre-a-procrammer.png', '2019-08-08 16:51:19'),
(16, 1, '\"Sometimes being a Brother is even better than being a Superhero.\" â€”Marc Brown', '', '2019-08-08 21:20:59'),
(19, 2, 'No', '107414.jpg', '2019-08-10 03:50:50'),
(20, 2, '&quot;Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.&quot; &mdash;Mother Teresa', '', '2019-08-11 07:29:23'),
(21, 1, 'No', 'For-Apple-macbook-desktop-monitor-base-notebook-stand-bracket-computer-elevated-frame-storage-frame-artifact.webp', '2020-01-17 15:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(1, 'Ahadi', 'Josue', 'ahadi_josue', 'Live once, live forever', 'Single', 'josue29002', 'josue@gmail.com', 'Rwanda', 'Male', '2003-10-29', 'profile_2.jpg', 'asus-rog-phone-1280x720-abstract-colorful-android-8-0-hd-20597.jpg', '2019-06-19 22:18:26', 'verified', 'yes', 'Joel'),
(2, 'Khn', 'Jobzy', 'khn_jobzy', 'We are black on skin but white in mind', 'Single', 'khn@nik11', 'khnjobzy@gmail.com', 'Rwanda', 'Male', '1999-08-16', 'Big Bro.jpg', '177615.jpg', '2019-08-10 03:29:21', 'verified', 'yes', 'Jules'),
(3, 'Ntwari', 'Tresor', 'ntwari_tresor_15', 'Its better to always be perfect', 'Single', '123456789', 'tresor15@gmail.com', 'US', 'Male', '1998-06-24', 'avatar-3.png', 'default_cover.jpg', '2019-08-10 14:05:54', 'verified', 'no', 'Lidia');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(3, 3, 1, 'Hi!', '2019-08-16 08:22:59', 'no'),
(4, 2, 1, 'Hello?!', '2019-08-16 08:23:19', 'no'),
(5, 1, 2, 'I am fine.', '2019-08-16 08:26:26', 'no'),
(6, 1, 2, 'How are you?', '2019-08-16 08:26:38', 'no'),
(7, 3, 2, 'Hi!\r\n', '2019-08-16 20:11:13', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
