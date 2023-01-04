<?php
error_reporting(0);
// PHP Connect Information Pass
require_once 'config.php';

try {
	// Mysql Root Access
	$pdc = new PDO("mysql:host=$host", $root, $root_password);
	$pdc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// DB Create if not exist as equlas to db variable
	$dbname = "`".str_replace("`","``",$db)."`";
	$pdc->query("CREATE DATABASE IF NOT EXISTS $db");
	// Mysql root access kill
	$pdc=NULL;
	//Mysql root access with dbname alternative way to useDB...
	$pdo = new PDO("mysql:host=$host;dbname=$db", $root, $root_password);
	// users table create if not exist with 1 row for deafult actions
	$pdo->query("CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(50) NOT NULL,
  `users_lname` varchar(50) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_state` tinyint(1) NOT NULL DEFAULT 1,
  `users_gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_email`, `users_time`, `users_state`, `users_gender`) VALUES
(1, 'Fatih', 'Batu', 'me@fatihbatu.com', '2022-12-27 12:49:15', 1, '');

ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;");

	$pdo->query("CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(59) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_password` varchar(500) NOT NULL,
  `admin_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_mail`, `admin_password`, `admin_time`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$8pEyysf7C2cOM0LhkI3yPea1Rd77cyor9cLS/CBPOk32lIhQ12KH2', '2022-12-29 13:11:30');
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;");




} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>