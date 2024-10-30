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
	<h1>Do you really want to delete this user?</h1>
	<?php $getClientByID = getClientByID($pdo, $_GET['clientID']); ?>
	<div class="container" style="border-style: solid; height: 300px;">
		<h2>Client Name: <?php echo $getClientByID['clientName']; ?></h2>
		<h2>Contact Person: <?php echo $getClientByID['contactPerson']; ?></h2>
		<h2>Email: <?php echo $getClientByID['email']; ?></h2>
		<h2>Phone: <?php echo $getClientByID['phone']; ?></h2>
		<h2>Store Address: <?php echo $getClientByID['storeAddress']; ?></h2>
		<h2>Date Added: <?php echo $getClientByID['registrationDate']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form class="delete" action="core/handleForms.php?clientID=<?php echo $_GET['clientID']; ?>" method="POST">
				<input type="submit" name="deleteClientBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>