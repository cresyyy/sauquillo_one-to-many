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

		h3 {
			color: #333;
			margin-bottom: 20px;
			text-align: center;
		}

	
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			width: 60%;
			max-width: 800px;
			margin: 0 auto;
			margin-top: 30px;
		}

		form input[type="text"],
		form input[type="email"] {
			width: 100%;
			padding: 12px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-size: 1em;
			transition: border 0.3s ease;
		}

		form input[type="text"]:focus,
		form input[type="email"]:focus {
			border-color: #007BFF;
			outline: none;
		}

		form label {
			margin-bottom: 8px;
			display: block;
			font-size: 0.9em;
			color: #333;
		}

		form input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			font-size: 1em;
			cursor: pointer;
			transition: background-color 0.3s ease;
			width: 100%;
		}

		form input[type="submit"]:hover {
			background-color: #45a049;
		}


		table {
			width: 80%;
			margin: 50px auto;
			border-collapse: collapse;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
			overflow: hidden;
		}

		table th, table td {
			padding: 12px 20px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		table th {
			background-color: #007BFF;
			color: white;
			font-size: 0.9em;
			text-transform: uppercase;
		}

		table tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		table tr:hover {
			background-color: #f1f1f1;
		}

		a {
			text-decoration: none;
			color: #4CAF50;
			font-weight: bold;
		}

		a:hover {
			color: #45a049;
		}
	</style>
</head>
<body>
	<?php $getDevById = getDevById($pdo, $_GET['developerID']); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="developerID"></label> 
			<input type="hidden" name="developerID" value="<?php echo $_GET['developerID']; ?>">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getDevById['firstName']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getDevById['lastName']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getDevById['email']; ?>">
		</p>
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" value="<?php echo $getDevById['username']; ?>">
		</p>
		<p>
			<label for="yearGraduated">Year Graduated</label>
			<input type="text" name="yearGraduated" value="<?php echo $getDevById['yearGraduated']; ?>"></p>
		<p>
			<label for="yearsOfExperience">Years of Experience</label>
			<input type="text" name="yearsOfExperience" value="<?php echo $getDevById['yearsOfExperience']; ?>"></p>
        <p>
			<label for="skills">Skills</label>
			<input type="text" name="skills" value="<?php echo $getDevById['skills']; ?>"></p>
        <p>
			<label for="favoriteTool">Favorite Tool</label>
			<input type="text" name="favoriteTool" value="<?php echo $getDevById['favoriteTool']; ?>"></p>
        <p>
			<label for="frameworksUsed">Frameworks Used</label>
			<input type="text" name="frameworksUsed" value="<?php echo $getDevById['frameworksUsed']; ?>"></p>
        <p>
			<label for="projects">Projects</label>
			<input type="text" name="projects" value="<?php echo $getDevById['projects']; ?>"></p>
        <p>
			<label for="dateRegistered">Date Registered</label>
			<input type="text" name="dateRegistered" value="<?php echo $getDevById['dateRegistered']; ?>">
			<input type="submit" name="editBtn">
        </p>
	</form>
</body>
</html>