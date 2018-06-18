<html>
<head>
    <meta charset="utf-8">
    <title>Homework</title>
    <style>
        a {
            text-decoration: none; /* Отменяем подчеркивание у ссылки */
        }
    </style>
</head>
<body>
<div id="header">
    <a href="/cabinet"><=BACKWARD</a>
</div>
<div id="main-body">
    <h2>
        Hello <?php echo $pageData['category'] .' '. $pageData['name']; ?>!
    </h2>
</div>
<div>
    <h3>
        Housework:<br/>
    </h3>

    <?php $data = $pageData['row'];

        foreach ($data as $item){

            echo '<a href="task?id=' . $item['id'] . ' " >' . $item['task'] .'</a> 
             |work for: <i>'. $item['mem'] .'</i>' . '  |status: <i>'.  $item['mark'] .'</i><br/>';

        }
    ?>
</div>
</body>
</html>