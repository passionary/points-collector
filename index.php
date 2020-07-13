<?php 
    require 'www/auth.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bounce</title>
        <style>
            .message{
                color:red;
                font-size:7px;
                position: absolute;
                z-index: 1000;
                line-height: 7px;
                width:65px;
                margin: 0;
                padding: 0;
                height:22px;
            }
            body{
                margin: 0;
            }
            img{
                display: block;
                height:657px;
                width:1366px;
                opacity: 0.9;
            }
            #auth{
                position: absolute;
                left:42%;
                top:35%;
                width:240px;
                height:230px;
                background-color:#0f1c4c;
                border-radius: 14%;
                box-shadow: 0 0 50px inset;
            }
            .auth{
                position: absolute;
                top:26%;
                left:38%;
                z-index: 100;
                font-size:16px;
                color:green;
            }
            .login{
                color:#2942ff;
                font-size:14px;
                white-space: nowrap;
                margin-left:10px;
                position: absolute;
                left:-2%;
                top:78.5%;
                text-shadow: 0 0 1px red;
            }
            input{
                margin-top:7px;
                margin-bottom:15px;
                margin-left:27.5%;
                width:45%;
                height:25px;
                border:none;
                box-shadow: 0 0 2px inset;
                background-color:black;
                color:white;
                border-radius: 5px;
            }
            h2{
                font-size: 19px;
                margin-top:16px;
                padding-bottom:0;
                margin-bottom:7px;
                color:white;
                margin-left:51px;
                font-family:UltratypeBeta;
                padding-left:0;
                width:140px;
                border-bottom:1px solid white;
                padding-bottom: 5px;
            }
            button{
                background:linear-gradient(to top,#f07f22,white);
                color:black;
                text-shadow: 0 0 5px gray;
                font-weight: bold;
                margin-left:25%;
                margin-top:5px;
                border:none;
                border-radius: 50px;
                width:120px;
                height:24px;
                font-size: 14px;
                padding-top:0;
                font-family: arbat; 
                cursor: pointer;
            }
            p{
                position: absolute;
                font-size:14px;
                color:white;
            }
            p:nth-child(2){
                top:20%;
                left:12%;
                font-family: arbat;
            }
            p:nth-child(3){
                top:40%;
                left:4px;
                font-family: arbat;
            }
            p:nth-child(4){
                top:60%;
                left:28px;
                font-family: arbat;
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
        <form method="POST" action="/index.php">
            <div id="auth">
                <h2>Authorisation</h2>
                <p>Login</p>
                <p>Password</p>
                <p>Again</p>
                <input type="text" name="name">
                <input type="password" name="password">
                <input type="password" name="password2">
                <a href="log.php" class="login">Have you a profile?</a>
                <button type="submit">CREATE</button>
            </div> 
        </form>
    </body>
</html> 
