<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['submit'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');


    //Lấy dữ liệu từ file dangky.php
    $cateid   = addslashes($_POST['categoryid']);
    $catename   = addslashes($_POST['categoryname']);
    $descrip   = addslashes($_POST['description']);
    $result = pg_query($conn, "INSERT INTO public.category (categoryid,categoryname,description) VALUES ('{$cateid}','{$catename}','{$descrip}')");

    if ($result) {
        echo "Quá trình đăng ký thành công.";

    } else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='index.php'>Thử lại</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Category</title>
</head>
<body>
<h3>Add Category</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Category ID: </td>
                <td><input type="text" name="categoryid"></tr>
            </tr>
            <tr>
                <td>Category Name: </td>
                <td><input type="text" name="categoryname"></tr>
            </tr>
            <tr>
                <td>Description: </td>
                <td><input type="text" name="description"></tr>
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