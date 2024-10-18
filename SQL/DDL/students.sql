CREATE TABLE `students` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `dob` date NOT NULL,
    `marks_10` int(11) NOT NULL,
    `marks_12` int(11) NOT NULL,
    `specialization` varchar(255) NOT NULL,
    `certificate_10` varchar(255) NOT NULL,
    `certificate_12` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);