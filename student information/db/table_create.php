<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create student details table
$tableQuery = "CREATE TABLE IF NOT EXISTS student_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rollno VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    class VARCHAR(50) NOT NULL,
    batch VARCHAR(9) NOT NULL,
    photo_path VARCHAR(255) NOT NULL
)";

$message = "";

if ($conn->query($tableQuery) === TRUE) {
    $message = "Student details table created successfully";
} else {
    $message = "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add styles for the notification */
        .notification {
            display: none;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px;
            z-index: 1;
        }
    </style>
</head>
<body>

    <!-- Display the notification using JavaScript -->
    <div id="notification" class="notification">
        <?php echo $message; ?>
    </div>

    <script>
        // Show the notification
        document.getElementById('notification').style.display = 'block';

        // Hide the notification after 3 seconds (adjust as needed)
        setTimeout(function(){
            document.getElementById('notification').style.display = 'none';
        }, 3000);
    </script>

</body>
</html>
