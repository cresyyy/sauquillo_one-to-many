<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial", sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 20px;
		}

		h1 {
			color: #333;
			text-align: center;
			margin-bottom: 20px;
		}

		.DevsContainer {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			width: 90%;
			max-width: 600px;
			margin: 0 auto;
		}

		.DevsContainer p {
			font-size: 1.1em;
			margin: 10px 0;
			color: #555;
		}

		input[type="submit"] {
			background-color: #e74c3c;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			font-size: 1em;
			cursor: pointer;
			transition: background-color 0.3s ease;
			margin-top: 20px;
			width: 100%;
		}

		input[type="submit"]:hover {
			background-color: #c0392b;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getDevById = getDevById($pdo, $_GET['developerID']); ?>
	<form action="core/handleForms.php?developerID=<?php echo $_GET['developerID']; ?>" method="POST">

		<div class="DevsContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getDevById['firstName']; ?></p>
			<p>Last Name: <?php echo $getDevById['lastName']; ?></p>
			<p>Email: <?php echo $getDevById['email']; ?></p>
			<p>Username: <?php echo $getDevById['username']; ?></p>
			<p>Year Graduated: <?php echo $getDevById['yearGraduated']; ?></p>
			<p>Years of Experience: <?php echo $getDevById['yearsOfExperience']; ?></p>
            <p>Skills: <?php echo $getDevById['skills']; ?></p>
            <p>Favorite Tool: <?php echo $getDevById['favoriteTool']; ?></p>
            <p>Frameworks Used: <?php echo $getDevById['frameworksUsed']; ?></p>
            <p>Projects: <?php echo $getDevById['projects']; ?></p>
            <p>Date Registered: <?php echo $getDevById['dateRegistered']; ?></p>
			<input type="submit" name="deleteBtn" value="Delete">
		</div>
	</form>
</body>
</html>