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
    <a href="/cabinet/tasks"><=BACKWARD</a><br>
</div>
<h2>
    <?php echo $pageData['task'] ; ?>

</h2>

<form action="" method="post" name="task">
    <table>
        <tbody>
        <tr>
            <td></td>
            <td><input type="submit" name="appoint" value="APPOINT MEMBER FAMILY" /></td>
            <td><input type="text" name="name" placeholder="Enter name"  /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="mark" value="MARK DONE" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="delete" value="DELETE" /></td>
        </tr>
        </tbody>
    </table>
</form>
<a href="/cabinet">Back Home Page</a>
</body>
</html>