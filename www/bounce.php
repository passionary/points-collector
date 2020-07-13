<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bounce</title>
        <style>
            body{
                margin: 0;
                overflow: hidden;
            }
            .pike{
                position: absolute;
                top:57px;                
                left: 2px;
            }
            .pike img{
                width:30px;
                height: 40px;
            }
            #button{
                position: absolute;
                width:140px;
                height: 40px;
                border-radius: 20px;
                top:65%;
                left:27%;
                background-color: orange;
                color:red;
                font-size:20px;
                font-weight:bold;
                font-family:arbat;
                visibility: hidden;
                cursor: pointer;
                letter-spacing: 2px;
            }
            #save{
                cursor: pointer;
                letter-spacing: 2px;
                position: absolute;
                width:140px;
                height: 40px;
                border-radius: 20px;
                top:65%;
                left:61%;
                background-color: orange;
                color:red;
                font-size:20px;
                font-weight:bold;
                font-family:arbat;
                visibility: hidden;
            }
            .title{
                position: absolute;
                left:43%;
                color:#2997d4;
                font-size: 30px;
                text-transform: uppercase;
                letter-spacing: 10px;
                font-family: UltratypeBeta;
            }
            table{
                width:100px;
                position: absolute;
                right:27px;
                top:8.6%;
                background-color:#ffffff;
                color:#002bff;
                font-family:arbat;
            }
            td{
                border:1px solid black;
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
        <table style="opacity: 0.6;">
            <tr>
                <td>Name</td>
                <td>Score</td>
            </tr>
                <?php
                    require_once 'db.php';
                    $sql = 'SELECT * FROM results ORDER BY score DESC LIMIT 3';
                    $take = $db->prepare($sql);
                    $take->execute();
                    while($results = $take->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr><td>'.$results['name'].'</td><td>'.$results['score'].'</td></tr>';
                    }
                ?>
        </table>
        <h2 class="title">2D GAME</h2>
        <canvas id="myCanvas" style="display:block"></canvas>
        <div class="pike"><img src="pike.png"></div>
        <button id="button">restart</button>
        <button id="save">save</button>
        <script src="/script.js" type="text/javascript" defer></script>
    </body>
</html>