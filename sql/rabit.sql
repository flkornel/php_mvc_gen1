CREATE TABLE `users` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_name` varchar(50) UNIQUE NOT NULL
);

CREATE TABLE `advertisements` (
  `ad_id` int PRIMARY KEY AUTO_INCREMENT,
  `ad_user` int,
  `ad_title` varchar(255) UNIQUE NOT NULL
);

ALTER TABLE `advertisements` ADD FOREIGN KEY (`ad_user`) REFERENCES `users` (`user_id`);

/*INSERT INTO users(user_name) VALUES ("Bob"), ("Bob"), ("Tom"), ("Al"), ("Pal");*/
