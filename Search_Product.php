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
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price/th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
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
                            <img src="public/image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
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