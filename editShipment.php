<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewShipments.php?clientID=<?php echo $_GET['clientID']; ?>">
	View Shipment Records</a>
	<h1>"Change Shipment Information</h1>
	<?php $getShipmentByID = getShipmentByID($pdo, $_GET['shipmentID']); ?>
	<form action="core/handleForms.php?shipmentID=<?php echo $_GET['shipmentID']; ?>
	&clientID=<?php echo $_GET['clientID']; ?>" method="POST">
		<p>
			<label for="firstName">Shipment Weight</label> 
			<input type="text" name="shipmentWeight" 
			value="<?php echo $getShipmentByID['shipmentWeight']; ?>">
		</p>
		<p>
			<label for="firstName">Shipment Method</label> 
			<input type="text" name="shipmentMethod" 
			value="<?php echo $getShipmentByID['shipmentMethod']; ?>">
		</p>
		<p>
			<label for="firstName">Delivery Address</label> 
			<input type="text" name="deliveryAddress" 
			value="<?php echo $getShipmentByID['deliveryAddress']; ?>">
		</p>
		<p>
			<label for="firstName">Delivery Date</label> 
			<input type="text" name="estimatedDeliveryDate" 
			value="<?php echo $getShipmentByID['estimatedDeliveryDate']; ?>">
		</p>
		<p>
			<label for="firstName">Carrier</label> 
			<input type="text" name="carrier" 
			value="<?php echo $getShipmentByID['carrier']; ?>">
			<input type="submit" name="editShipmentBtn">
		</p>

	</form>
</body>
</html>