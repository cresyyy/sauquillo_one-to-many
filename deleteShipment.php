<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getShipmentByID = getShipmentByID($pdo, $_GET['shipmentID']); ?>
	<h1>Are you sure you wish to permanently delete this shipment?</h1>
	<div class="container" style="border-style: solid; height: 320px;">
		<h2>Shipment Weight: <?php echo $getShipmentByID['shipmentWeight'] ?></h2>
		<h2>Shipment Method: <?php echo $getShipmentByID['shipmentMethod'] ?></h2>
		<h2>Delivery Address: <?php echo $getShipmentByID['deliveryAddress'] ?></h2>
		<h2>Estimated Delivery Date: <?php echo $getShipmentByID['estimatedDeliveryDate'] ?></h2>
		<h2>Carrier: <?php echo $getShipmentByID['carrier'] ?></h2>
		<h2>Client Name: <?php echo $getShipmentByID['clientName'] ?></h2>
		<h2>Shipment Date: <?php echo $getShipmentByID['dateAdded'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form class="delete" action="core/handleForms.php?shipmentID=<?php echo $_GET['shipmentID']; ?>&clientID=<?php echo $_GET['clientID']; ?>" method="POST">
				<input type="submit" name="deleteShipmentBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>