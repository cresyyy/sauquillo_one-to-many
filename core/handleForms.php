<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $yearGraduated = trim($_POST['yearGraduated']);
    $yearsOfExperience = trim($_POST['yearsOfExperience']);
    $skills = trim($_POST['skills']);
    $favTool = trim($_POST['favoriteTool']);
    $frameworks = trim($_POST['frameworksUsed']);
    $projects = trim($_POST['projects']);
    $dateRegistered = date("Y-m-d H:i:s");

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username)  && !empty($yearGraduated)  && !empty($yearsOfExperience) && !empty($skills) && !empty($favTool) && !empty($frameworks) && !empty($projects) && !empty($dateRegistered)) {

            $query = insertIntoDeveloperRecords($pdo, $firstName, $lastName, $email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered);

        if ($query) {
            header("Location: ../index.php");
        }

        else {
            echo "Insertion failed";
        }
    }

    else {
        echo "Make sure that no fields are empty";
    }
   
}


if (isset($_POST['editBtn'])) {
    $developerID = isset($_POST['developerID']) ? $_POST['developerID'] : '';
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $yearGraduated = trim($_POST['yearGraduated']);
    $yearsOfExperience = trim($_POST['yearsOfExperience']);
    $skills = trim($_POST['skills']);
    $favTool = trim($_POST['favoriteTool']);
    $frameworks = trim($_POST['frameworksUsed']);
    $projects = trim($_POST['projects']);
    $dateRegistered = date("Y-m-d H:i:s");

    var_dump($_POST);
    
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username)  && !empty($yearGraduated)  && !empty($yearsOfExperience) && !empty($skills) && !empty($favTool) && !empty($frameworks) && !empty($projects) && !empty($dateRegistered)) {
        
        $query = updateADev($pdo, $developerID, $firstName, $lastName, $email, $username, $yearGraduated, $yearsOfExperience, $skills, $favTool, $frameworks, $projects, $dateRegistered);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Update failed";
        }

    }

    else {
        echo "Make sure that no fields are empty";
    }

}





if (isset($_POST['deleteBtn'])) {

    $query = deleteADev($pdo, $_GET['developerID']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Deletion failed";
    }
}

?>
