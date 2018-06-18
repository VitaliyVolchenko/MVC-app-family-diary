<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
</head>
<body>
    <header></header>
    <h1>Registration Here</h1>
    <div id="content">
        <form action="" method="post" name="reg">
            <table>
                <tbody>
                <tr>
                    <th>Category:</th>
                    <td><select name="category" required >
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="child">Child</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name" placeholder="Name" required="" /></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" name="upass" placeholder="Password" required="" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Register" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php if(!empty($pageData['error'])) :?>
                            <p><?php echo $pageData['error']; ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="/login">Already registered! Click Here!</a></td>
                </tr>                
                </tbody>
            </table>
        </form>
    </div>

    <footer>
    </footer>

</body>
</html>