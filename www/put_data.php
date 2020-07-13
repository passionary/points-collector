<?php
	require_once 'db.php';
	session_start();
	$name = $_SESSION['logged_user'];
	$score = json_decode($_GET['data']);
	echo $score;
	$putting = 'INSERT INTO results(name,score) VALUES(:login,:score)';
	$put_sql = $db->prepare($putting);
	$put_sql->bindValue('login',$name);
	$put_sql->bindValue('score',$score);
	$put_sql->execute();
?>