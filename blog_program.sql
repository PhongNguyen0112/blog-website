CREATE DATABASE blog_program;
GRANT USAGE ON *.* TO 'root'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON demo.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

USE blog_program;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `blog_content` (
  `id` int(11) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `author` varchar(20) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `blog_content` (`id`, `time`, `author`, `keyword`, `content`) VALUES
(1, '2023-11-26', 'admin', 'technology', '123'),
(2, '2023-11-26', 'admin', 'lifestyle', '234wfd'),
(3, '2023-11-26', 'admin', 'technology', 'www'),
(4, '2023-11-26', 'admin', 'technology', '234'),
(5, '2023-11-26', 'admin', 'technology', '234'),
(6, '2023-11-26', 'admin', 'lifestyle', '123'),
(7, '2023-11-26', 'admin', 'technology', '123435'),
(8, '2023-11-26', 'admin', 'technology', '123435'),
(9, '2023-11-26', 'admin', 'technology', 'q'),
(10, '2023-11-26', 'admin', 'technology', 'q'),
(11, '2023-11-27', 'admin', 'technology', 'test'),
(12, '2023-11-27', 'user2', 'technology', 'test2'),
(13, '2023-11-27', 'user3', 'technology', '123');


CREATE TABLE `user_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `user_login` (`username`, `password`, `email`, `gender`, `age`, `detail`) VALUES
('admin', 'admin123', NULL, NULL, NULL, NULL),
('user2', '123', NULL, NULL, NULL, NULL),
('user3', '123', NULL, NULL, NULL, NULL);


ALTER TABLE `blog_content`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user_login`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `blog_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    comment_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blog_content(id)
);
