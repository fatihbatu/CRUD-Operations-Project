<?php
ob_start();
session_start();
require 'connect.php';



if (isset($_POST['useredit'])) {

	$users_id=$_POST['users_id'];

	$setSave=$pdo->prepare("UPDATE users SET
		users_fname=:users_fname,
		users_lname=:users_lname,
		users_email=:users_email,
		users_state=:users_state,
		users_gender=:users_gender
		WHERE users_id={$_POST['users_id']}");

	$update=$setSave->execute(array(
		'users_fname' => $_POST['users_fname'],
		'users_lname' => $_POST['users_lname'],
		'users_email' => $_POST['users_email'],
		'users_state' => $_POST['users_state'],
		'users_gender' => $_POST['users_gender']
		));


	if ($update) {
        $_SESSION['state']='ok';
		Header("Location:./edit-user.php?users_id=$users_id");

	} else {
        $_SESSION['state']='no';
		Header("Location:./edit-user.php?users_id=$users_id");
	}

}

if (isset($_POST['userdetail'])) {

	$users_id=$_POST['users_id'];

	$setSave=$pdo->prepare("UPDATE users SET
		users_fname=:users_fname,
		users_lname=:users_lname,
		users_email=:users_email
		WHERE users_id={$_POST['users_id']}");

	$update=$setSave->execute(array(
		'users_fname' => $_POST['users_fname'],
		'users_lname' => $_POST['users_lname'],
		'users_email' => $_POST['users_email']
		));


	if ($update) {
        $_SESSION['state']='ok';
		Header("Location:./edit-user.php?users_id=$users_id");

	} else {
        $_SESSION['state']='no';
		Header("Location:./edit-user.php?users_id=$users_id");
	}

}


if (isset($_POST['userdelete'])) {

	$users_id=$_POST['users_id'];

	$setSave=$pdo->prepare("DELETE FROM users
		WHERE users_id={$_POST['users_id']}");

	$update=$setSave->execute(array());


	if ($update) {
        $_SESSION['state']='ok';
		Header("Location:./index.php");

	} else {
        $_SESSION['state']='no';
		Header("Location:./index.php");
	}

}

if (isset($_POST['useradd'])) {

	$users_fname = $_POST['users_fname'];
	$users_lname = $_POST['users_lname'];
	$users_email = $_POST['users_email'];


	$setSave=$pdo->prepare("INSERT INTO `users` (`users_fname`, `users_lname`, `users_email`)
	VALUES ('$users_fname', '$users_lname', '$users_email')");

	$update=$setSave->execute(array());


	if ($update) {
        $_SESSION['useradd']='ok';
		Header("Location:./index.php");

	} else {
        $_SESSION['useradd']='no';
		Header("Location:./index.php");
	}

}


if (isset($_POST['adminaccess'])) {

	$admin_mail=$_POST['admin_mail'];
	$admin_password=$_POST['admin_password'];

	$query = "SELECT * FROM admins WHERE (admin_mail = :mail)";
	$values = [':mail' => $admin_mail];

	try
	{
  		$res = $pdo->prepare($query);
  		$res->execute($values);
	}
	catch (PDOException $e)
	{
  		echo 'Query error.';
  		die();
	}

	$row = $res->fetch(PDO::FETCH_ASSOC);
	if (is_array($row))
	{
		if (password_verify($admin_password, $row['admin_password']))
		{
			$_SESSION['admin_mail']=$admin_mail;
			header("Location:./index.php");
			exit;
		}	else {
			header("Location:./login.php?state=no");
			exit;
		}
	}
	else {

		header("Location:./login.php?state=no");
		exit;
	}

}

if (isset($_POST['admincreate'])) {

	$admin_name=$_POST['admin_name'];
	$admin_mail=$_POST['admin_mail'];
	$admin_password=$_POST['admin_password'];
	$hash = password_hash($admin_password, PASSWORD_DEFAULT);

	$check=$pdo->prepare("SELECT * FROM admins WHERE admin_mail=:mail");
	$values = [':mail' => $admin_mail];
	$check->execute($values);

	$row = $check->fetch(PDO::FETCH_ASSOC);
	if(!$row) {
		$setSave=$pdo->prepare("INSERT INTO admins (admin_name, admin_mail, admin_password) VALUES (:name, :mail, :passwd)");
		$values = [':name' => $admin_name, ':mail' => $admin_mail, ':passwd' => $hash];
		$setSave->execute($values);
		if ($setSave) {
			$_SESSION['state']='success';
			$_SESSION['info']=$admin_mail;
			header("Location:./join.php");
			exit;
		} else {
			$_SESSION['state']='fail';
			header("Location:./join.php");
			exit;
		}
	} else {
		$_SESSION['state']='existRecord';
		$_SESSION['info']=$admin_mail;
		header("Location:./join.php");
		exit;
	}



	

}
?>