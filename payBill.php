<?php

require_once 'global.inc.php';

$reservation_no = "";
$name = "";
$credit_card = "";
$expiration_date = "";

if(isset($_POST['submit-form'])) {

	//retrieve the $_POST variables
	$reservation_no = $_POST['reservation_no'];
	$name = $_POST['name'];
	$credit_card = $_POST['credit_card'];
	$expiration_date= $_POST['expiration_date'];
	$result = mysql_query("SELECT * FROM bill WHERE reservation_no = '$reservation_no'");

	if (! $result) {
		print("Failed to pay bill.");
	}
	else{
		if (mysql_num_rows($result) >= 1) {
			 mysql_query("UPDATE bill SET amount = 0.00 WHERE reservation_no = '$reservation_no'");
			header("Location: guest.php");
		}
		else {
			print("Reservation number not found.");
		}	
	}

}
?>


<html>
<head>
<title>Pay Bill</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
</head>

<body>
<?php echo ($error != "") ? $error : ""; ?>
                <form action="payBill.php" method="post">
                <div id="wrapper">
                        Reservation Number: <input type = "text" value="<?php echo $reservation_no; ?>" name= "reservation_no" /><br/>
                        Name              : <input type="text" value="<?php echo $name; ?>" name="name" /><br/>
                        Credit Card       : <input type="text" value="<?php echo $credit_card; ?>" name="credit_card" /><br/>
                        Expiration Date   : <input type="text" value="<?php echo $expiration_date; ?>" name="expiration_date" /><br/>
                <input type="submit" value="Pay" name="submit-form" />
                </form>
                </div>
        </body>
</html>

