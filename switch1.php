<html>
    <head>
        <title>Changer langue date</title>
        <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
    </head>
    <body>
            <form method="post" action="">
            <select name="langue">
                <option value="francais">francais</option>
                <option value="english">english</option>
                <option value="spanish">spanish</option>
            </select>
            <input type ="submit" name="submit" value="go"/>
        <?php
            if(isset($_POST['langue']))
            {
                $langue = isset($_POST['$langue']);
                switch ($langue)
                {
                    case 'francais' :
                        setlocale(LC_TIME, 'fra_fra');
                        echo strftime('%a %d %b');
                        break;
                    case 'english' :
                        echo date('D \ d\ M');
                        break;
                    case 'spanish' :
                        setlocale(LC_ALL, 'es_ES@euro', 'es_ES', 'es', 'ES');
                        echo strftime('%a %d %b');
                        break;
                    default:
                        setlocale(LC_TIME, 'fra_fra');
                        echo strftime('%a %d %b');
                        break;
                }
            }
        ?>
    </body>
</html>