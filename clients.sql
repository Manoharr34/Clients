CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Rohan', 'rohan1@gmail.com', '+919568745125', 'India', '2023-10-07 10:28:57'),
(2, 'Robert', 'robert@gmail.com', '+124986578', 'USA', '2023-10-07 14:55:39'),
(3, 'Jhon', 'jhon03@gmail.com', '+124986564', 'UK', '2023-10-12 15:41:36');


ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);




