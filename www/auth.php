<?php
	require_once 'db.php';
	$no_let = false;
	$double = false;
	if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['name'])); 
		{
			$name = $_POST['name'];
		}
		if(isset($_POST['password']))
		{
			$password = $_POST['password'];
			md5("$password");
		}
		if(isset($_POST['password2']))
		{
			$password2 = $_POST['password2'];
			md5("$password2");
		}
		$errors = array();
		if (strlen($name) < 5 && strlen($name) != 0) 
		{
			$short_name = 'Ваш логин слишком короткий';
			$errors[] = $short_name;
			$no_let = false;
		}else if(strlen($name) == 0)
		{
			$empty_name = 'Поля не должны быть пустыми!';
			$errors[] = $empty_name;
			$no_let = true;
		}
		if (strlen($password) < 5 && strlen($password) != 0) 
		{
			$short_password = 'Ваш пароль слишком короткий';
			$errors[] = $short_password;
			$no_let = false;
		}else if(strlen($password) == 0)
		{
			$empty_password = 'Поля не должны быть пустыми!';
			$errors[] = $empty_password;
			$no_let = true;
		}
		else if ($password != $password2)
		{
			$no_coin_pswd = 'Пароли не совпадают';
			$errors[] = $no_coin_pswd;
			$no_let = false;
		}
		$sql1 = "SELECT * FROM user_names";
		$make_q = $db->prepare($sql1);
		$make_q->execute();
		while ($checking = $make_q->fetch(PDO::FETCH_ASSOC))
		{
			if($checking['name'] == $name)
			{
				$coincidenced_name = 'Такое логин уже есть';
				$errors[] = $coincidenced_name;
			}
			if ($checking['password'] == $_POST['password']) 
			{
				$coincidenced_password = 'Такой пароль уже существует';
				$errors[] = $coincidenced_password;
			}
		}
		if(empty($errors) && !$no_let)
		{
			$log_user = true;
			$_SESSION['log_user'] = $log_user;
			header('location:log.php');
			$sql2 = "INSERT INTO user_names(name,password) VALUES(:name,:password)";
			$get_users = $db->prepare($sql2);
			$get_users->bindValue('name',$name);
			$get_users->bindValue('password',$password);
			$get_users->execute();
			$result = $get_users->fetchAll(PDO::FETCH_ASSOC);
		}else
		{
			foreach($errors as $message)
			{
				if($message == $short_name)
				{
					$Xcoord = '55.1%';
					$Ycoord = '44%';
					echo "<p class=\"message\" style=\"top:$Ycoord;left:$Xcoord;font-family:Bork Display;\">".array_shift($errors)."</p>";
				}else if ($message == $short_password) 
				{
					$Xcoord = '55.1%';
					$Ycoord = '52%';
					echo "<p class=\"message\" style=\"top:$Ycoord;left:$Xcoord;font-family:Bork Display;\">".array_shift($errors)."</p>";
				}else if($message == $empty_name)
				{
					$Xcoord = '55.1%';
					$Ycoord = '43.6%';
					echo "<p class=\"message\" style=\"top:$Ycoord;left:$Xcoord;font-family:Bork Display;\">".array_shift($errors)."</p>";
				}
				if($message == $no_coin_pswd)
				{
					$Xcoord = '55.1%';
					$Ycoord = '59.3%';
					echo "<p class=\"message\" style=\"top:$Ycoord;left:$Xcoord;font-family:Bork Display;\">".array_shift($errors)."</p>";

				}
				if($message == $empty_name)
				{
					$Xcoord = '55.1%';
					$Ycoord = '51.5%';
					echo "<p class=\"message\" style=\"top:$Ycoord;left:$Xcoord;font-family:Bork Display;\">".array_shift($errors)."</p>";
				}else if ($message == $coincidenced_name) 
				{
					$double = true;
					echo "<p style=\"top:26%;left:42.3%;font-family:Bork Display;color:red;z-index:1000;\">Такой логин уже есть</p>"; 	
				}else if ($message == $coincidenced_password) 
				{
					if($double)
					{
						echo "<p style=\"top:30%;left:42.3%;font-family:Bork Display;color:red;z-index:1000;\">Такой пароль уже есть</p>";
					}else
					{
						echo "<p style=\"top:30%;left:42.3%;font-family:Bork Display;color:red;z-index:1000;\">Такой пароль уже есть</p>";
					}
				}
			}
		}
	}
?>

