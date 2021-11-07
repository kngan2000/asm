<?php
    session_start();
    include('connection.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM user WHERE username='".$username."' AND 
        password='".$password."' LIMIT 1";
        $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
        $count = pg_num_rows($row);
        if($count >0){
            $_SESSION['submit'] = $username;
            header("Location:index.php");
        }else{
            echo '<script>alert("Incorrect account or password, please re-enter!")</script>';
            header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
</head>
<body>
    <h3>Log in</h3>
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
            <td colspan="2">
                <button type="submit" name="submit">Login</button>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>