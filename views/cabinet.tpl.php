<html>
<head>
    <meta charset="utf-8">
    <title>Cabinet</title>
    <style>
a {
    text-decoration: none; /* Отменяем подчеркивание у ссылки */
        }
    </style>
</head>

<body>
<div id="header">
    <a href="/cabinet/logout">LOGOUT</a>
</div>
<div id="main-body">
    <br/>
    <h2>
Hello <?php echo $pageData['category'] .' '. $pageData['name']; ?>!
</h2>
</div>

<h3>Upload file with housework:</h3>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <button type="submit" name="btn-upload">UPLOAD</button>
</form>
<div id="header">
    <a href="/cabinet/tasks">WATCH HOMEWORK</a>
</div>
</body>
</html>