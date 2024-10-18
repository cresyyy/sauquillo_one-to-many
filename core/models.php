<?php 

require_once 'dbConfig.php';

function insertIntoDeveloperRecords($pdo,$firstName, $lastName, $email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered) {

	$sql = "INSERT INTO FrontEndDevs (firstName, lastName, email, username, yearGraduated, yearsOfExperience, skills, favoriteTool, frameworksUsed, projects, dateRegistered) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$firstName, $lastName, $email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllDevsRecords($pdo) {
	$sql = "SELECT * FROM FrontEndDevs";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getDevById($pdo, $developerID) {
	$sql = "SELECT * FROM FrontEndDevs WHERE developerID = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$developerID])) {
		return $stmt->fetch();
	}
}

function updateADev($pdo, $developerID, $firstName, $lastName, 
$email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered) {

	$sql = "UPDATE FrontEndDevs 
				SET firstName = ?, 
					lastName = ?, 
					email = ?, 
					username = ?, 
					yearGraduated = ?, 
					yearsOfExperience = ?,
                    skills = ?,
                    favoriteTool = ?,
                    frameworksUsed = ?,
                    projects = ?,
                    dateRegistered = ?
			WHERE developerID = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$firstName, $lastName, $email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered, $developerID]);

	if ($executeQuery) {
		return true;
	}
}



function deleteADev($pdo, $developerID) {

	$sql = "DELETE FROM FrontEndDevs WHERE developerID = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$developerID]);

	if ($executeQuery) {
		return true;
	}

}


?>