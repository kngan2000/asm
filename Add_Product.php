<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['submit'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');


    //Lấy dữ liệu từ file dangky.php
    $proid   = addslashes($_POST['proid']);
    $cateid   = addslashes($_POST['cateid']);
    $proname   = addslashes($_POST['proname']);
    $price      = addslashes($_POST['price']);
    $result = pg_query($conn, "INSERT INTO public.product(productid,categoryid,productname,price) VALUES ('{$proid}','{$cateid}','{$proname}','{$price}')");

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
    <title>Product</title>
</head>
<body>
    <h3>Add Product</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Product ID: </td>
                <td><input type="text" name="proid"></tr>
            </tr>
            <tr>
                <td>Category ID: </td>
                <td><input type="password" name="cateid"></tr>
            </tr>
            <tr>
                <td>Product Name: </td>
                <td><input type="text" name="prodname"></tr>
            </tr>
            <tr>
                <td>Price: </td>
                <td><input type="email" name="price"></tr>
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