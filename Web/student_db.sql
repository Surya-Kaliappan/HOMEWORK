
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE demo;

CREATE TABLE `students` (
  `admin_no` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` int(2) NOT NULL,
  `section` varchar(2) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `last_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `students` (`admin_no`, `name`, `class`, `section`, `gender`, `password`, `role`, `last_update`) VALUES
('0001', 'Admin', 0, '', NULL, 'e3afed0047b08059d0fada10f400c1e5', 'admin', '');

ALTER TABLE `students`
  ADD PRIMARY KEY (`admin_no`);
COMMIT;
