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

	<h1>Welcome To Purple Cargo Management System. Register now!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Client Name</label> 
			<input type="text" name="clientName">
		</p>
		<p>
			<label for="firstName">Contact Person</label> 
			<input type="text" name="contactPerson">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="email">
		</p>
		<p>
			<label for="firstName">Phone</label> 
			<input type="text" name="phone">
		</p>
		<p>
			<label for="firstName">Store Address</label> 
			<input type="text" name="storeAddress">
			<input type="submit" name="insertClientBtn">
		</p>
	</form>
	<?php $getAllClients = getAllClients($pdo); ?>
	<?php foreach ($getAllClients as $row) { ?>
	<div class="container" style="width: 50%; height: 250px; margin-top: 20px;">
		<h3>Client Name: <?php echo $row['clientName']; ?></h3>
		<h3>Contact Person: <?php echo $row['contactPerson']; ?></h3>
		<h3>Email: <?php echo $row['email']; ?></h3>
		<h3>Phone: <?php echo $row['phone']; ?></h3>
		<h3>Store Address: <?php echo $row['storeAddress']; ?></h3>
		<h3>Date Registered: <?php echo $row['registrationDate']; ?></h3>


		<div class="editAndDelete" style="float: right;">
			<a href="viewShipments.php?clientID=<?php echo $row['clientID']; ?>">View Shipments</a>
			<a href="editClient.php?clientID=<?php echo $row['clientID']; ?>">Edit</a>
			<a href="deleteClient.php?clientID=<?php echo $row['clientID']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>