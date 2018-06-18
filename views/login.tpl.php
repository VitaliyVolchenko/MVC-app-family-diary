<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<header></header>
<div id="content"><h1>Login Here</h1>
<form action="" method="post" name="login">
    <table>
        <tbody>
        <?php if(!empty($pageData['error'])) :?>
            <p><?php echo $pageData['error']; ?></p>
        <?php endif; ?>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="name" required="" /></td>
        </tr>
        <tr>
            <th>Password:</th>
            <td><input type="password" name="upass" required="" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Login" /></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="/login/logout">Register new user</a></td>
        </tr>
        </tbody>
    </table>
</form>