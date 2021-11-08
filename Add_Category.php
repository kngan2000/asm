<?php
        include_once("connection.php");
		if(isset($_POST["submit"]))
		{
			$id = $_POST["categoryid"];
			$name = $_POST["categoryname"];
			$des = $_POST["description"];
			$err="";
			if($id==""){
				$err .="<li>Enter Category ID, please!</li>";
			}
			if($name==""){
				$err .="<li>Enter Category Name, please!</li>";
			}
			if($err!="")
			{
				echo "<ul>$err</ul>";
			}
			else{
				$sq = "SELECT * from public.category where catogoryid='$id' or categoryname='$name'";
				$row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
				if(pg_num_rows($result)==0)
				{
					pg_query($conn, "INSERT INTO public.category (categoryid, categoryname, description) VALUES ('$id','$name','$des')");
					echo '<meta http-equiv="refresh" content="0;URL=?page=category_management" />';
				}
				else
				{
					echo "<li>Duplicate category ID or Name</li>";
				}
			}
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