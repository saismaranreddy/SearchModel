<!DOCTYPE html>

<html>
	<head>
		<title>List of Products</title>
		<style>
			table 
			{
			    width:35%;
			}
			table, th, td 
			{
			    border: 1px solid black;
			    border-collapse: collapse;
			}
			th, td 
			{
    			padding: 15px;
    			text-align: left;
			}
		</style>
	</head>
	<body bgcolor = "lightgreen">
		<center>	

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
			
			$catname=$_POST["catname"];
			$subcatname=$_POST["subcatname"];

			echo "<br /><br /><br />";
			echo "<h1>Search Results</h1>";
	
			$sql1 = "SELECT ProductName,SubcategoryName from table_productlisting where SubcategoryName in(select SubcategoryName from table_subcategory where CategoryName='$catname' and SubcategoryName='$subcatname')";
			$sql2 = "SELECT ProductName,SubcategoryName from table_productlisting where SubcategoryName in(select SubcategoryName from table_subcategory where CategoryName='$catname')";
			$sql3 = "SELECT ProductName,SubcategoryName from table_productlisting";

			if($catname!="" && $subcatname!="")
			{
				$result = $conn->query($sql1);
			}
			else if($catname!="" && empty($_POST["subcatname"]))
			{
				$result = $conn->query($sql2);
			}
			else if(empty($_POST["catname"]) && empty($_POST["subcatname"]))
			{
				$result = $conn->query($sql3);
			}
			if ($result->num_rows > 0) 
			{
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>Product Name</th>";
				echo "<th>Subcategory Name</th>";
				echo "</tr>";
				
    			// output data of each row
				while($row = $result->fetch_assoc()) 
				{
        			echo "<tr> <td>".$row["ProductName"]."</td> <td>".$row["SubcategoryName"]."</td> </tr>";
				}
				echo "</table>";
			} 
			else 
			{	
				echo "<h3><em> No matches found... </em></h3>";
			}

			if(isset($row) && $row!=null)
			{
    			mysqli_free_result($row);
 			}
			$conn->close();
		?> 
		<br /><br />
		<strong>To go Back and Search again <a href="Search.php">Click Here</a></strong> 
		<br /><br />
		</center>
	 </body>
</html>