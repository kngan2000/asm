<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
</head>
<body>
    <h3>Đăng kí thành viên</h3>
    <form action="register_submit.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="Submit" name="submit">Đăng ký</button>
                    <button type="reset">Làm mới</button>

</body>
</html>