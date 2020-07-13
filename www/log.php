<?php
    require_once 'login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<style>
		.message{
                color:green;
                font-size:27px;
                position: absolute;
                z-index: 1000;
                line-height: 17px;
                margin: 0;
                padding: 0;
                height:22px;
            }
		body{
			margin:0;
		}
		img{
			display: block;
            height:657px;
            width:1366px;
            opacity: 0.9;
		}
		form{
				position: absolute;
                left:42%;
                top:35%;
                width:240px;
                height:200px;
                background-color:#0f1c4c;
                border-radius: 14%;
                box-shadow: 0 0 50px inset;
		}
		input{
				padding-left:5px;
                margin-top:7px;
                margin-bottom:15px;
                margin-left:28%;
                width:44%;
                height:25px;
                border:none;
                box-shadow: 0 0 2px inset;
                background-color:black;
                color:white;
                border-radius: 5px;
            }
            .login{
                color:#2942ff;
                font-size:14px;
                white-space: nowrap;
                margin-left:10px;
                position: absolute;
                left:-2%;
                top:68%;
                text-shadow: 0 0 1px red;
            }
            button{
                background:linear-gradient(to top,#f07f22,white);
                color:black;
                text-shadow: 0 0 5px gray;
                font-weight: bold;
                margin-left:25%;
                margin-top:14px;
                border:none;
                border-radius: 50px;
                width:120px;
                height:24px;
                font-size: 14px;
                padding-top:0;
                font-family: arbat; 
                position: absolute;
                top:74%;
                left:0;
                z-index: 1;
                cursor:pointer;
            }
            h2{
                font-size: 19px;
                margin-top:16px;
                padding-bottom:0;
                margin-bottom:7px;
                color:white;
                margin-left:93px;
                font-family:UltratypeBeta;
                padding-left:0;
                width:54px;
                padding-bottom: 5px;
                border-bottom:1px solid white;
            }
            p{
                position: absolute;
                font-size:14px;
                color:white;
            }
            p:nth-child(2){
                top:22.5%;
                left:12%;
                font-family: arbat;
            }
            p:nth-child(3){
                top:47%;
                left:4px;
                font-family: arbat;
            }
            .bounce{
            	position: absolute;
            	left:50%;
            	top:70%;
            	z-index: 1000;
            }
            @font-face{
                font-family: arbat;
                src:url(16781.ttf);
            }
            @font-face{
                font-family: UltratypeBeta;
                src:url(17225.otf);
            }
            @font-face{
                font-family: Bork Display;
                src:url(17236.otf);
            }
	</style>
</head>
<body>
	<img src="joshua-rodriguez-E-DFV53MXOc-unsplash.jpg"> 
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
		<h2>Login</h2>
		<p>Login</p>
        <p>Password</p>
		<input type="text" name="login">
		<input type="password" name="password">
		<a href="index.php" class="login">Back to Authorisation</a>
		<button type="submit">login</button>
	</form>
</body>
</html>

