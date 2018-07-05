<!DOCTYPE html>

<html>
	<head>
		<title>List of Products</title>
	</head>
	<body>

		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "searchproject";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) 
			{
    			die("Connection failed: " . $conn->connect_error);
			} 
			//echo "Database Connected successfully";

            $catname=$_POST["cname"];

            $sql2 = "SELECT DISTINCT SubcategoryName from table_subcategory where CategoryName='$catname'";
            $result2 = $conn->query($sql2);
            if($result2->num_rows > 0)
            {
                echo "<option value=''>None</option>";
                while($row2 = $result2->fetch_assoc())
                { 
                    echo '<option value='. $row2['SubcategoryName'] .'>'. $row2['SubcategoryName'] .'</option>'; 
                }
            }
            else
            {
                echo "<option value=''>None</option>";
            }
            $conn->close();
        ?>
    </body>
</html>