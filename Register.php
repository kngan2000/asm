<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['submit'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');


    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['username']);
    $password   = addslashes($_POST['password']);
    $fullname   = addslashes($_POST['fullname']);
    $email      = addslashes($_POST['email']);
    $address    = addslashes($_POST['address']);
    $telephone  = addslashes($_POST['telephone']);
    $result = pg_query($conn, "INSERT INTO public.user(username,password,fullname,email,address,telephone) 
    VALUES ('{$username}','{$password}','{$fullname}','{$email}','{$address}','{$telephone}',0)");

    if ($result) {
        echo "Quá trình đăng ký thành công.";

    } else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='index.php'>Thử lại</a>";
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