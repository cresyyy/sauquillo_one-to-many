CREATE TABLE Clients(
    clientID INT PRIMARY KEY AUTO_INCREMENT,
    clientName VARCHAR(50),
    contactPerson VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(15),
    storeAddress TEXT,
    registrationDate DATE DEFAULT CURRENT_DATE
);

CREATE TABLE Shipments(
    shipmentID INT PRIMARY KEY AUTO_INCREMENT,
    clientID INT,
    shipmentWeight DECIMAL(10,2),
    shipmentMethod VARCHAR(50),
    deliveryAddress TEXT NOT NULL,
    estimatedDeliveryDate DATE,
    carrier VARCHAR(100),
    dateAdded DATE DEFAULT CURRENT_DATE
);