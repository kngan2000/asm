<?php
include_once("connect.php");
?>
<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "Login") {
            include_once("Login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h3>Member Registation</h3>
    <form action="register_submit.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></tr>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></tr>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="repassword"></tr>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></tr>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email"></tr>
            </tr>
            <tr>
                <td>Address: </td>
                <td><input type="address" name="address"></tr>
            </tr>
            <tr>
                <td>Telephone: </td>
                <td><input type="telephone" name="telephone"></tr>
            </tr>
            <tr>
                <td colspan="2">
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>