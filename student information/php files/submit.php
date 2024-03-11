<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            background-color: #2ecc71; /* Green background color */
            color: #fff; /* White text color */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $databaseName = "test"; // Replace with your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $databaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST["name"];
        $rollNo = $_POST["roll_no"];
        $dob = $_POST["date"];
        $class = $_POST["class"];
        $batch = $_POST["batch"];

        // Process and move uploaded photo to a folder (you need to create the folder)
        $photoPath = "photos/" . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath);

        // Insert data into the table
        $insertQuery = "INSERT INTO student_details (name, rollno, dob, class, batch, photo_path)
                        VALUES ('$name', '$rollNo', '$dob', '$class', '$batch', '$photoPath')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<div class="notification">
                    Record added successfully
                  </div>';
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
    ?>

</body>
</html>
