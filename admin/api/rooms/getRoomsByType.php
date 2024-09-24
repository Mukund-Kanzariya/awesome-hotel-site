<?php

// Include initialization and database connection
require '../../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the room type ID is passed
    if (isset($_POST['roomtype'])) {
        $roomTypeId = $_POST['roomtype'];

        // Prepare query to fetch rooms based on the selected room type
        $query = "SELECT RoomNumber FROM rooms WHERE RoomTypeId = ? AND IsAvailable = TRUE ";
        $params = [$roomTypeId];

        // Fetch rooms from the database
        $rooms = select($query, $params);

        if ($rooms) {
            // Return the rooms as a JSON response
            echo json_encode($rooms);
        } else {
            // No rooms found, return an empty array
            echo json_encode([]);
        }
    } else {
        // Room type not provided
        http_response_code(400);
        echo json_encode(['error' => 'Room type ID is required.']);
    }
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}

?>
