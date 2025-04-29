DROP DATABASE IF EXISTS `stayComfort`;

CREATE DATABASE `stayComfort`;

USE `stayComfort`;

CREATE TABLE
    `Roles` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(200) NOT NULL
    );

-- CREATE TABLE
--     `Modules` (
--         `Id` INT PRIMARY KEY AUTO_INCREMENT,
--         `Name` VARCHAR(200) NOT NULL
--     );
 
CREATE TABLE
    `Users` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `RoleId` INT NOT NULL,
        `Name` VARCHAR(200) NOT NULL,
        `Mobile` INT NOT NULL,
        `Email` VARCHAR(200) NOT NULL,
        `Image` VARCHAR(200) NOT NULL,
        `Address` VARCHAR(500) NOT NULL,
        `City` VARCHAR(200) NOT NULL,
        `State` VARCHAR(200) NOT NULL,
        `UserName` VARCHAR(200) NOT NULL,
        `Password` VARCHAR(200) NOT NULL,
        `Token` VARCHAR(255) NULL,
        `ResetToken` DATE NULL,

        FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`Id`)
    );


-- CREATE TABLE
--     `Permissions` (
--         `Id` INT PRIMARY KEY AUTO_INCREMENT,
--         `UserId` INT NOT NULL,
--         `ModuleId` INT NOT NULL,
--         `AddPermission` INT NOT NULL,
--         `EditPermission` INT NOT NULL,
--         `DeletePermission` INT NOT NULL,
--         `ViewPermission` INT NOT NULL,
--         FOREIGN KEY (`UserId`) REFERENCES `Users` (`Id`),
--         FOREIGN KEY (`ModuleId`) REFERENCES `Modules` (`Id`)
--     );

CREATE TABLE `RoomTypes` (
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(200) NOT NULL,
    `Price_AC` INT NOT NULL,       
    `Price_NonAC` INT NOT NULL     
);


-- CREATE TABLE
--     `Rooms` (
--         `Id` INT PRIMARY KEY AUTO_INCREMENT,
--         `RoomTypeId` INT NOT NULL,
--         `RoomNumber` INT NOT NULL,
--         `Description` VARCHAR(200) NOT NULL,
--         `Capacity` INT NOT NULL,
--         `Price` INT NOT NULL,
--         FOREIGN KEY (`RoomTypeId`) REFERENCES `RoomTypes` (`Id`)
--     );

CREATE TABLE rooms (
    `Id` INT AUTO_INCREMENT,   
    `RoomTypeId` INT NOT NULL,           
    `RoomNumber` INT NOT NULL,   
    `description` VARCHAR(255) NOT NULL, 
    `Ac-NonAc` VARCHAR(50) NOT NULL, 
    `Capacity` INT NOT NULL,                       
    `IsAvailable` BOOLEAN DEFAULT TRUE,        
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    `UpdatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`Id`), -- Primary key is now just 'Id'
    UNIQUE (`RoomNumber`), -- RoomNumber is unique
    FOREIGN KEY (`RoomTypeId`) REFERENCES `RoomTypes` (`Id`)
);


CREATE TABLE guests (
    `Id` INT AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(100) NOT NULL,
    `Mobile` VARCHAR(15) NOT NULL,
    `Email` VARCHAR(255) NOT NULL UNIQUE,
    `Address` TEXT NULL,
    `Image` VARCHAR(200) NOT NULL,
    `CheckInDate` DATE NOT NULL,
    `CheckOutDate` DATE NOT NULL,
    `TotalBill` INT NOT NULL,
    `Status` ENUM('active', 'checked out') NOT NULL,
    `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `UpdatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE `guestrooms` (
    `Id` INT AUTO_INCREMENT PRIMARY KEY,
    `GuestId` INT NOT NULL,
    `RoomNo` VARCHAR(10) NOT NULL,
    FOREIGN KEY (`GuestId`) REFERENCES `guests`(`Id`)
);



CREATE TABLE
    `Expenses` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(2000) NOT NULL,
        `Amount` INT NOT NULL
);

CREATE TABLE
    `Contact` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `Name` VARCHAR(2000) NOT NULL,
        `Mobile` INT NOT NULL,
        `Email` VARCHAR(2000) NOT NULL,
        `Message` VARCHAR(2000) NOT NULL
);

CREATE TABLE reviews (
    `Id` INT AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(100) NOT NULL,
    `Email` VARCHAR(100) NOT NULL,
    `Rating` INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    `Review` TEXT NOT NULL,
    `Created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




INSERT INTO
    Roles (Name)
VALUES
    ('super admin');

-- INSERT INTO
--     Users (
--         RoleId,
--         Name,
--         Password,
--         Salary,
--         Email,
--         Mobile,
--         Address,
--         City,
--         State,
--     )
-- VALUES
--     (
--         1,
--         'admin',
--         'admin',
--         '50000',
--         'test@gmail.com',
--         9737708721,
--         'test',
--         'jamnagar',
--         'gujrat'
--     );

-- INSERT INTO
--     Modules (Name)
-- VALUES
--     ('Roles'),
--     ('Users'),
--     ('RoomTypes'),
--     ('Rooms'),
--     ('Guests'),
--     ('Expenses');

-- INSERT INTO
--     Permissions (
--         UserId,
--         ModuleId,
--         AddPermission,
--         EditPermission,
--         DeletePermission,
--         ViewPermission
--     )
-- VALUES
--     (1, 1, 1, 1, 1, 1),
--     (1, 2, 1, 1, 1, 1),
--     (1, 3, 1, 1, 1, 1),
--     (1, 4, 1, 1, 1, 1),
--     (1, 5, 1, 1, 1, 1),
--     (1, 6, 1, 1, 1, 1);