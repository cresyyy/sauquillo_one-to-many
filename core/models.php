<?php  

function insertClient($pdo, $clientName, $contactPerson, $email, 
	$phone, $storeAddress) {

	$sql = "INSERT INTO Clients (clientName, contactPerson, email, 
		phone, storeAddress) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$clientName, $contactPerson, $email, 
	$phone, $storeAddress]);

	if ($executeQuery) {
		return true;
	}
}



function updateClient($pdo, $contactPerson, $email, 
	$phone, $storeAddress, $clientID) {

	$sql = "UPDATE Clients
				SET contactPerson = ?,
					email = ?,
					phone = ?, 
					storeAddress = ?
				WHERE clientID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$contactPerson, $email, 
	$phone, $storeAddress, $clientID]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteClient($pdo, $clientID) {
	$deleteShipment = "DELETE FROM Shipments WHERE clientID = ?";
	$deleteStmt = $pdo->prepare($deleteShipment);
	$executeDeleteQuery = $deleteStmt->execute([$clientID]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM Clients WHERE clientID = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$clientID]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllClients($pdo) {
	$sql = "SELECT * FROM Clients";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getClientByID($pdo, $clientID) {
	$sql = "SELECT * FROM Clients WHERE clientID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$clientID]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getShipmentByClient($pdo, $clientID) {
	
	$sql = "SELECT 
				Shipments.shipmentID AS shipmentID,
				Shipments.shipmentWeight AS shipmentWeight,
				Shipments.shipmentMethod AS shipmentMethod,
				Shipments.deliveryAddress AS deliveryAddress,
				Shipments.estimatedDeliveryDate AS estimatedDeliveryDate,
				Shipments.carrier AS carrier,
				Shipments.dateAdded AS dateAdded,
				Clients.clientName AS clientName
			FROM Shipments
			JOIN Clients ON Shipments.clientID = Clients.clientID
			WHERE Shipments.clientID = ? 
			GROUP BY Shipments.shipmentWeight;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$clientID]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertShipment($pdo, $shipmentWeight, $shipmentMethod, $deliveryAddress, $estimatedDeliveryDate, $carrier, $clientID) {
	$sql = "INSERT INTO Shipments (shipmentWeight, shipmentMethod, deliveryAddress, estimatedDeliveryDate, carrier, clientID) VALUES (?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$shipmentWeight, $shipmentMethod, $deliveryAddress, $estimatedDeliveryDate, $carrier, $clientID]);
	if ($executeQuery) {
		return true;
	}

}

function getShipmentByID($pdo, $shipmentID) {
	$sql = "SELECT 
				Shipments.shipmentID AS shipmentID,
				Shipments.shipmentWeight AS shipmentWeight,
				Shipments.shipmentMethod AS shipmentMethod,
				Shipments.deliveryAddress AS deliveryAddress,
				Shipments.estimatedDeliveryDate AS estimatedDeliveryDate,
				Shipments.carrier AS carrier,
				Shipments.dateAdded AS dateAdded,
				Clients.clientName AS clientName
			FROM Shipments
			JOIN Clients ON Shipments.clientID = Clients.clientID
			WHERE Shipments.shipmentID  = ? 
			GROUP BY Shipments.shipmentWeight";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$shipmentID]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateShipment($pdo, $shipmentWeight, $shipmentMethod, $deliveryAddress, $estimatedDeliveryDate, $carrier, $shipmentID) {
	$sql = "UPDATE Shipments
			SET shipmentWeight = ?,
				shipmentMethod = ?,
				deliveryAddress = ?,
				estimatedDeliveryDate = ?,
				carrier = ?
			WHERE shipmentID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$shipmentWeight, $shipmentMethod, $deliveryAddress, $estimatedDeliveryDate, $carrier, $shipmentID]);

	if ($executeQuery) {
		return true;
	}
}

function deleteShipment($pdo, $shipmentID) {
	$sql = "DELETE FROM Shipments WHERE shipmentID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$shipmentID]);
	if ($executeQuery) {
		return true;
	}
}


function getAllInfoByClientID($clientID) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE clientID = :clientID");
    $stmt->execute(['clientID' => $clientID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>