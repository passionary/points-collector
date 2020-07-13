<?php
	session_start();
	if (isset($_SESSION['log_user'])) 
	{
		echo "<p style=\"top:26%;left:39.3%;font-family:Bork Display;color:green;z-index:1000;\">Вы зарегистрированы успешно!</p>";
	}
	require_once 'db.php';
	$let = false;
	$errors = array();
	if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		$sql = 'SELECT * FROM user_names';
		$check = $db->prepare($sql);
		$check->bindValue('name',$login);
		$check->execute();
		while($result = $check->fetch(PDO::FETCH_ASSOC))
		{
			if ($result['name'] == $login && $result['password'] == $password) 
			{
				$newname  = $result['name'];
				$insertdata = $db->prepare("INSERT INTO results(name,score) VALUES(:newname,0)");
				$insertdata->bindValue('newname',$newname);
				$insertdata->execute();
				$let = true;
				$_SESSION['logged_user'] = $login;
				header('location:bounce.php');
			}
			if ($result['name'] != $login)
			{
				$no_login = 'Данный логин не найден';
				$errors[] = $no_login;
			}
			else if ($result['password'] != $password) 
			{
				$error_password = 'Пароль введен не верно';
				$errors[] = $error_password;
			}
		}
		if(!empty($errors))
		{
			foreach($errors as $message)
			{
				if ($message == $no_login) 
				{
					$Ycoord = '42.7%';
				}
				if(in_array($error_password,$errors))
				{
					$Ycoord = '50.3%';
				}
			}
				echo "<p style=\"top:$Ycoord;left:55.2%;font-family:Bork Display;color:red;z-index:1000;font-size:8px;width:70px;
		 line-height:6px;\">".array_shift($errors)."</p>";
		}
	}
?>