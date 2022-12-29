<?php
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
	`users_time` timestamp NOT NULL DEFAULT current_timestamp()
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
	INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_email`, `users_time`) VALUES
	(1, 'Fatih', 'Batu', 'me@fatihbatu.com', '2022-12-27 15:49:15');
	ALTER TABLE `users`
	ADD PRIMARY KEY (`users_id`);
	ALTER TABLE `users`
	MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
	COMMIT;");

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>