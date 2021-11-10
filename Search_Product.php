<?php
if (isset($_POST['search'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');

    //Lấy dữ liệu từ file 
    $search   = $_POST['txtSearch'];

    $result = pg_query($conn, "SELECT productname,price,quantity,categoryid,image,description FROM public.product WHERE productname LIKE '%{$search}%'");

    if ($result) {
        echo "Search with keyword: $search";
        echo '<meta http-equiv="refresh" content="0;URL=?page=category"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình tìm kiếm. <a href='?page=add_category'>Again</a>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            
            <thead>
                <tr>

                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row["productname"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["categoryid"]; ?></td>
                        <td>
                            <img src="image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["description"]; ?></td>
                        
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>