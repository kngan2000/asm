<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>Product ID</strong></th>
                <th><strong>Category ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Price</strong></th>
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from product");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["productid"];?></td>
              <td><?php echo $row["categoryid"];?></td>
              <td><?php echo $row["productname"];?></td>
              <td><?php echo $row["price"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>