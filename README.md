# Book project by FuelPHP framework

## Setup

We need to set up database first before starting application.

Run this script in MySQL console or workbench to create database name `book_db` and its tables `books`,`eategory`,`form`, `detail_form`, `users`, `sessions`:

```mysql
create database if not exists `book_db`;
use `book_db`;

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) CHARACTER SET latin1 NOT NULL,
  `author` varchar(80) CHARACTER SET latin1 NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `books` (`id`, `title`, `author`, `price`, `category_id`, `url`) VALUES
(1, 'The C Programming Language', 'Dennie Ritchie', '25.00', 1, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/small_image/400x400/9df78eab33525d08d6e5fb8d27136e95/5/1/51dxwcr9fjl.jpg'),
(3, 'C Primer Plus (5th Edition)', 'Stephen Prata', '45.00', 2, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/small_image/400x400/9df78eab33525d08d6e5fb8d27136e95/i/m/image_195509_1_24919.jpg'),
(4, 'Modern PHP', 'Josh Lockhart', '10.00', 2, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/small_image/400x400/9df78eab33525d08d6e5fb8d27136e95/i/m/image_55054.jpg'),
(5, 'Learning PHP, MySQL & JavaScript, 4th Edition', 'Robin Nixon', '60.00', 2, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/small_image/400x400/9df78eab33525d08d6e5fb8d27136e95/9/7/9780712676090_1.jpg'),
(10, 'The C Programming Language 2', 'Andree', '20.00', 2, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/small_image/400x400/9df78eab33525d08d6e5fb8d27136e95/i/m/image_179650.jpg');

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'business'),
(2, 'education'),
(3, 'science');

DROP TABLE IF EXISTS `detail_form`;
CREATE TABLE IF NOT EXISTS `detail_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_form` (`form_id`),
  KEY `detail_book` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(30) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `previous_id` varchar(40) CHARACTER SET latin1 NOT NULL,
  `user_agent` text CHARACTER SET latin1 NOT NULL,
  `ip_hash` char(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `created` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `payload` longtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `PREVIOUS` (`previous_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `group` int(11) NOT NULL,
  `last_login` int(20) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_fields`, `group`, `last_login`, `login_hash`, `created_at`, `updated_at`) VALUES
(1, 'test', 'GsYl6LRADNC+oTPxR4Kcuv4Wf98M5VNtvpoefy00U0M=', 'test@gmail.com', 'a:0:{}', 1, 1622878034, 'c584f92015047ebe11836489165392cb71444b1f', 1621059720, 0),
(2, 'admin', 'GsYl6LRADNC+oTPxR4Kcuv4Wf98M5VNtvpoefy00U0M=', 'admin@email.com', 'a:0:{}', 100, 1622879110, '6cd1c27af22e09bb37af73eccc3e3c3675ee157d', 1621059746, 0);

ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `detail_form`
  ADD CONSTRAINT `detail_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `detail_form` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`);

ALTER TABLE `form`
  ADD CONSTRAINT `form_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

```

!!!! After register a user, change group id to 100
Install WAMP Server to run application on local.

Copy all project folder into `www` folder of WAMP Server.

Click icon server --> Apache --> httpd-vhosts.conf -->

```
${INSTALL_DIR}/www/public"
```

Restart server

Access application at `http://localhost`

## More information

### Versions

This is the current version of all main libraries that project is using:

- FuelPHP - V.1.8.2
- MySQL - V.8.0.21
- PHP - V.7.3.21
- Apache - V2.4.46
