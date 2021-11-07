<?php

//Xử lý đăng nhập
if (isset($_POST['login'])) {
    //Kết nối tới database
    include_once('connect.php');

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    //Kiểm tra tên đăng nhập có tồn tại không
    $result = pg_query($conn, "SELECT username, password,state FROM public.user WHERE username='{$username}'");
    if (pg_num_rows($result) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = pg_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (pg_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        $_SESSION["admin"] = $row['state'];
        echo"thanh cong";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
        echo "You loged in fail!";
    }
}
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
    <form action="" method="POST">
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
                <td>Full Name: </td>
                <td><input type="text" name="fullname"></tr>
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