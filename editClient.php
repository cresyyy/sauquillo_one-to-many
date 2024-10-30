<?php require_once 'core/handleForms.php'; ?>
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
	<?php $getClientByID = getClientByID($pdo, $_GET['clientID']); ?>
	<h1>Update User Information</h1>
	<form action="core/handleForms.php?clientID=<?php echo $_GET['clientID']; ?>" method="POST">
		<p>
			<label for="firstName">Contact Person</label> 
			<input type="text" name="contactPerson" value="<?php echo $getClientByID['contactPerson']; ?>">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="email" value="<?php echo $getClientByID['email']; ?>">
		</p>
		<p>
			<label for="firstName">Phone</label> 
			<input type="text" name="phone" value="<?php echo $getClientByID['phone']; ?>">
		</p>
		<p>
			<label for="firstName">Store Address</label> 
			<input type="text" name="storeAddress" value="<?php echo $getClientByID['storeAddress']; ?>">
			<input type="submit" name="editClientBtn">
		</p>
	</form>
</body>
</html>