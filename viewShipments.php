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
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByClientID = getAllInfoByClientID($_GET['clientID']); ?>
	<div class="client"  style="text-align: left;">
		<h1>Client Name: <?php echo $getAllInfoByClientID['clientName']; ?></h1>
		<h3 style="margin-bottom: 10px;">Add New Shipment</h3>
	
	<form action="core/handleForms.php?clientID=<?php echo $_GET['clientID']; ?>" method="POST">
		<p>
			<label for="firstName">Shipment Weight</label> 
			<input type="text" name="shipmentWeight">
		</p>
		<p>
			<label for="firstName">Shipment Method</label> 
			<input type="text" name="shipmentMethod">
		</p>
		<p>
			<label for="firstName">Delivery Address</label> 
			<input type="text" name="deliveryAddress">
		</p>
		<p>
			<label for="firstName">Delivery Date</label> 
			<input type="date" name="estimatedDeliveryDate">
		</p>
		<p>
			<label for="firstName">Carrier</label> 
			<input type="text" name="carrier">
			<input type="submit" name="insertNewShipmentBtn">
		</p>
		
	</form>
	</div>

	<table style="width:85%; margin-top: 50px;">
	  <tr>
	    <th>Shipment ID</th>
	    <th>Shipmet Weight</th>
		<th>Shipmet Method</th>
	    <th>Delivery Address</th>
		<th>Delivery Date</th>
		<th>Carrier</th>
	    <th>Shipment Owner</th>
	    <th>Shipment Date</th>
	    <th>Action</th>
	  </tr>
	  <?php $getShipmentByClient = getShipmentByClient($pdo, $_GET['clientID']); ?>
	  <?php foreach ($getShipmentByClient as $row) { ?>
	  <tr>
	  	<td><?php echo $row['shipmentID']; ?></td>	  	
	  	<td><?php echo $row['shipmentWeight']; ?></td>	  
		<td><?php echo $row['shipmentMethod']; ?></td>	 	
	  	<td><?php echo $row['deliveryAddress']; ?></td>
		<td><?php echo $row['estimatedDeliveryDate']; ?></td>	
		<td><?php echo $row['carrier']; ?></td>	  	  	
	  	<td><?php echo $row['clientName']; ?></td>	  	
	  	<td><?php echo $row['dateAdded']; ?></td>
	  	<td>
	  		<a href="editShipment.php?shipmentID=<?php echo $row['shipmentID']; ?>&clientID=<?php echo $_GET['clientID']; ?>" style="margin-right:10px; color:#03ADC5">Edit</a>

	  		<a href="deleteShipment.php?shipmentID=<?php echo $row['shipmentID']; ?>&clientID=<?php echo $_GET['clientID']; ?>"style="color:#B00020">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>