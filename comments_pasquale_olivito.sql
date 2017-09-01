-- CREATE USER 'pasquale'@'localhost' IDENTIFIED BY '12345';
-- GRANT ALL PRIVILEGES ON *.* TO 'pasquale'@'localhost' WITH GRANT OPTION;

CREATE DATABASE pasquale;

use pasquale;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` SMALLINT NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `date` datetime NOT NULL,
  `email` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (id)
);
