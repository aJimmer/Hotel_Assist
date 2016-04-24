<?php

require_once 'global.inc.php';

        $result = mysql_query("SELECT * FROM room WHERE status = 'available'");


	echo $guestID;
	echo "Available Rooms";
        echo "<br/><table border=\"1\">\n";
                echo "<tr><th bgcolor=\"#e6e6e6\">Room No</th>
                      <th bgcolor=\"#e6e6e6\">Type</th>
                      <th bgcolor=\"#e6e6e6\">Status</th>
                      <th bgcolor=\"#e6e6e6\">Price</th>
		      <th bgcolor=\"#e6e6e6\">Hotel ID</th>
                      </tr>";



        // 3. Use returned result
        // Get the number of rows returned by the query
                $num_results = mysql_num_rows($result);


        for ($ix=0; $ix < $num_results; $ix++) {
        // process results
           $row = mysql_fetch_assoc($result);

        // output each class for the student
           echo "<tr>
           <td align=\"right\">".$row["room_no"]."</td>
           <td align=\"right\">".$row["type"]."</td>
           <td align=\"right\">".$row["status"]."</td>
           <td align=\"right\">".$row["price"]."</td>
	   <td align=\"right\">".$row["hotel_id"]."</td>

           </tr>";
        }


        echo "</table>";

        // 4. Release returned result
           mysql_free_result($result);

        // 5. Close the database connection
//           mysql_close($connection);


//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>
<html>
<head>
<title>Available Rooms</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
</head>
	
	<body>
		<?php echo ($error != "") ? $error : ""; ?>
		<div id="wrapper">
	
		</form>
		</div>
	</body>
</html>
