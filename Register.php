<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>Name</strong></th>
                <th><strong>Password</strong></th>
                <th><strong>Confirm Password</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Address</strong></th>
                <th><strong>Telephone</strong></th>
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"Select * from user");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["username"];?></td>
              <td><?php echo $row["password"];?></td>
              <td><?php echo $row["confirmpassword"];?></td>
              <td><?php echo $row["email"];?></td>
              <td><?php echo $row["address"];?></td>
              <td><?php echo $row["telephone"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>