<?php

// Include initialization and database connection
require '../../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the room type ID and AC/Non-AC selection are passed
    if (isset($_POST['roomtype']) && isset($_POST['acNonAc'])) {
        $roomTypeId = $_POST['roomtype'];
        $acNonAc = $_POST['acNonAc'];

        // Prepare query to fetch rooms based on the selected room type and AC/Non-AC status
        $query = "SELECT RoomNumber FROM rooms WHERE RoomTypeId = ? AND AcNonAc = ? AND IsAvailable = TRUE";
        $params = [$roomTypeId, $acNonAc];

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
        // Room type or AC/Non-AC not provided
        http_response_code(400);
        echo json_encode(['error' => 'Room type and AC/Non-AC selection are required.']);
    }
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode(['error' => 'Invalid request method.']);
}

?>