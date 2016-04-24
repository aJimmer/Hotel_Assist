<?php
//reservation.php
require_once 'global.inc.php';
?>


<html>
	<head>
		<title>See Reservation</title>
		<meta charset="utf-8">
		<link href="casita.css" rel="stylesheet">
	</head>
	<body>
<?php	if($error != "")
	{
	        echo $error."<br/>";
	}
?>
	<div id=wrapper>
	<form action="seeReservation.php" method="post">

	Guest ID: <input type="text" name="guest_id" value="<?php echo $guest_id; ?>" /><br/>
	<input type="submit" value="Submit" name="submit-res" />

	</form>
	</div>
	</body>
</html>





<?php
	$guest_id = "";
	if(isset($_POST['submit-res'])) {
	        $guest_id = $_POST['guest_id'];
		$result = mysql_query("SELECT * FROM reservation WHERE guest_id = '$guest_id'");
		$num_rows = mysql_num_rows($result);
		if(mysql_num_rows($result)>=1){
		        echo "<br/><table border=\"1\">\n";
	                echo "<tr><th bgcolor=\"#e6e6e6\">Guest ID</th>
       	               <th bgcolor=\"#e6e6e6\">Start Date</th>
      	               <th bgcolor=\"#e6e6e6\">End Date</th>
     	               <th bgcolor=\"#e6e6e6\">Room Number</th>
 		       <th bgcolor=\"#e6e6e6\">Reservation Number</th>
       	               <th bgcolor=\"#e6e6e6\">Hotel ID</th>
    	               </tr>";

	        for ($ix=0; $ix < $num_rows; $ix++) {
     		    // process results
	 	      	    $row = mysql_fetch_assoc($result);
       	    	    // output each class for the student
          	     echo "<tr>
	           <td align=\"right\">".$row["guest_id"]."</td>
        	   <td align=\"right\">".$row["start_date"]."</td>
	           <td align=\"right\">".$row["end_date"]."</td>
	           <td align=\"right\">".$row["room_no"]."</td>
		   <td align=\"right\">".$row["reservation_no"]."</td>
	           <td align=\"right\">".$row["hotel_id"]."</td>	
       		    </tr>";
        	}

		echo "</table>";			
		mysql_free_result($result);
	        }else{
       	        	$error = "Reservation not found";
       		}
}
?>
