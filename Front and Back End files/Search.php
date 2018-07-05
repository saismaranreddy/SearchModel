<!DOCTYPE html>

<html>
    <head>
        <title>Select Product Category</title>
        <style type="text/css">
            select,input
            {
                width: 140px;
                height: 30px;
                margin: 10px;
            }
            input
            {
                font-weight:bold;
            }
        </style>
    </head>
    <body bgcolor = "lightskyblue">
    <center>
        <br /><br />
        <h1>Search Model</h1>
        <?php
            //Details to connect Database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "searchproject";

			// Create connection and select database
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) 
			{
    			die("Connection failed: " . $conn->connect_error);
			} 
            //echo "Database Connected successfully";

            $sql1 = "SELECT DISTINCT CategoryName from table_subcategory";
        
            $result1 = $conn->query($sql1); //Execute sql Statement

            //Creating the Form required to search
            if ($result1->num_rows > 0)
            {
                    echo "<form action='Search_Result.php' method='POST'>";
                    echo "<br>Select Category<select name='catname' class='category'><br>";
                    echo "<option value=''>None</option>";
                    while($row1 = $result1->fetch_assoc())
                    { 
                        echo "<option value=". $row1["CategoryName"] .">". $row1["CategoryName"] ."</option>"; 
                    }
                    echo "</select>";
                    echo "<br><br>Select Subcategory<select name='subcatname' class='subcategory'>";
                    echo "<option value=''>None</option>";
                    echo "</select>*";
                    echo "<br><br><input type='submit' value='search'>";
                    echo "<br /><br />* To select Subcategory select Category First";
                    echo "</form>";
            }

            $conn->close(); //Close connection with mysql server       
        ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function()
                {
                    $(".category").change(function()
                    {
                        var CategoryName=$(this).val();
                        var post_cname ='cname='+ CategoryName;

                        $.ajax(
                        {
                            type: "POST",
                            url: "ajax.php",
                            data: post_cname,
                            cache: false,
                            success: function(subcatnames)
                            {
                                $(".subcategory").html(subcatnames);
                            } 
                        });
                    });
                });
            </script>
    </center>                
    </body>
</html>