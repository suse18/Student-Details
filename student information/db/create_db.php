<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a new database
$databaseName = "test";
$sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
if ($conn->query($sql) === TRUE) {
    $message = "Database created successfully";
} else {
    $message = "Error creating database: " . $conn->error;
}

// Close the connection to the initial database
$conn->close();

// Connect to the new database
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection to the new database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $message .= "<br>Connected to the database successfully";
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
