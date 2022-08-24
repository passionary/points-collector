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
            #button{
                position: absolute;
                width:140px;
                height: 40px;
                border-radius: 20px;
                top:65%;
                left:29%;
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
                left:60%;
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
                left:10px;
                top:10px;
                color:#fff;
                font-family:arbat;
                border-right: 1px solid white;
                border-bottom: 1px solid white;
            }
            td{
                text-align: center;
                padding-right: 22px;
                padding-bottom: 22px;
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
        <table>
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
        <canvas id="myCanvas" style="display:block"></canvas>
        <button id="button">restart</button>
        <button id="save">save</button>
        <script src="/script.js" type="text/javascript" defer></script>
    </body>
</html>