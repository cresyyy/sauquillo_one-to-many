<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertClientBtn'])) {

	$query = insertClient($pdo, $_POST['clientName'], $_POST['contactPerson'], $_POST['email'], $_POST['phone'], $_POST['storeAddress']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editClientBtn'])) {
	$query = updateClient($pdo, $_POST['contactPerson'], $_POST['email'], $_POST['phone'], $_POST['storeAddress'], $_GET['clientID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteClientBtn'])) {
	$query = deleteClient($pdo, $_GET['clientID']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewShipmentBtn'])) {
	$query = insertShipment($pdo, $_POST['shipmentWeight'], $_POST['shipmentMethod'], $_POST['deliveryAddress'], $_POST['estimatedDeliveryDate'], $_POST['carrier'], $_GET['clientID']);

	if ($query) {
		header("Location: ../viewShipments.php?clientID=" .$_GET['clientID']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editShipmentBtn'])) {
	$query = updateShipment($pdo, $_POST['shipmentWeight'], $_POST['shipmentMethod'], $_POST['deliveryAddress'], $_POST['estimatedDeliveryDate'], $_POST['carrier'], $_GET['shipmentID']);

	if ($query) {
		header("Location: ../viewShipments.php?clientID=" .$_GET['clientID']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteShipmentBtn'])) {
	$query = deleteShipment($pdo, $_GET['shipmentID']);

	if ($query) {
		header("Location: ../viewShipments.php?clientID=" .$_GET['clientID']);
	}
	else {
		echo "Deletion failed";
	}
}




?>