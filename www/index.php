<?php 
    require_once 'auth.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bounce</title>
        <style>
            * {
                font-family: Roboto;
                font-size: 14px;
            }
            body {
                overflow: hidden;
                margin:0;
                background: url('bounces.png') no-repeat;
                background-size: cover;
                min-height: 100vh;
            }
            .name {
                position: absolute;
                line-height: 7px;
                color:red;
                top: 454px;
                left: 668px;
                font-size: 10px;
            }
            .password {
                position: absolute;
                line-height: 7px;
                color:red;
                left: 668px;
                top: 509px;
                font-size: 10px;
            }
            .wrapper {
                display: flex;
                justify-content: center;
            }
            .content {
                width: 595px;
            }
            .margin-top-20 {
                margin-top: 20px;
            }
            .title {
                text-align: center;
                text-transform: uppercase;
                color: #fff;
            }
            .title-description {
                margin-top: 48px;
                font-size: 29px;
                font-family: AunchantedXspaceThin;
            }
            .title-main {
                margin-top: 43px;
                font-size: 110px;
                font-family: arbat;
                margin-bottom: 45px;
            }
            .submit-form {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .data-container {
                display: flex;
                width: 100%;
                justify-content: space-between;
            }
            .labels {
                text-align: right;
            }
            .input-section label {
                color: #fff;
            }
            .input-section {
                position: relative;
                display: flex;
                flex-direction: column;
            }
            .label, .action {
                position: absolute;
                white-space: nowrap;
            }
            .login-label {
                left: -70px;
            }
            .password-label {
                left: -95px;
            }
            .confirm-password-label {
                left: -162px;
            }
            .login-action {
                left: 229px;
            }
            .password-action {
                left: 229px;
                white-space: nowrap;
            }
            .input-section a, span {
                color: #fff;
            }
            .input-section input {
                color: #fff;
                background: none;
                border: 1px solid #fff;
                width: 200px;
            }
            .submit__btn {
                border-radius: 100px;
                width: 325px;
                height: 78px;
                background: #fff;
                color: #00EE6D;
                font-size: 28px;
                margin-top: 55px;
                border: none;
                cursor: pointer;
            }
            .margin-bottom {
                margin-bottom: 32px;
            }
            @font-face {
                font-family: Roboto;
                src: url(RobotoMono.ttf);
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
            @font-face{
                font-family: AunchantedXspaceThin;
                src:url(AunchantedXspaceThin.ttf);
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="content">
                <p class="title title-description">2d scorer game</p>
                <h1 class="title title-main">point collector</h1>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="submit-form">
                    <div class="input-section margin-bottom">
                        <label class="label login-label" for="login">Login</label>
                        <input name="name" id="login" type="text">
                        <a class="action login-action" href="/log.php">Sign In</a>
                    </div>
                    <div class="input-section margin-bottom">
                        <label class="label password-label" for="password">Password</label>
                        <input name="password" type="password" id="password" type="text">
                        <a class="action password-action" href="/">Show password</a>
                    </div>
                    <div class="input-section">
                        <label class="label confirm-password-label" for="password2">Confirm Password</label>
                        <input name="password2" type="password" id="password2" type="text">
                        <a class="action password-action" href="/">Show password</a>
                    </div>
                    <input type="submit" value="REGISTRATION" class="submit__btn" />
                </form>
            </div>
        </div>
    </body>
</html> 
