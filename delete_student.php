<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Details</title>
    <link rel="stylesheet" href="styles_delete_student.css"> <!-- Add your CSS file link -->
    <!-- Include the same Google Fonts link as in the main page -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
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
    <div class="container">
        <h1>Delete Student Details</h1>

        <!-- Form to input Roll No -->
        <form action="" method="post">
            <label for="roll_no_input">Enter Roll No to Delete:</label>
            <input type="text" id="roll_no_input" name="roll_no_input" required>
            <button type="submit">Delete Details</button>
        </form>

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

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rollNoInput = $_POST["roll_no_input"];

            // Delete student details for the specified roll number
            $deleteQuery = "DELETE FROM student_details WHERE rollno = '$rollNoInput'";
            $result = $conn->query($deleteQuery);

            // Display a notification based on the result
            echo '<div id="notification" class="notification">';
            if ($result) {
                if ($conn->affected_rows > 0) {
                    echo "Record deleted successfully";
                } else {
                    echo "No record found for the given Roll No";
                }
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            echo '</div>';

            // Close the connection
            $conn->close();
        }
        ?>

        <!-- Display the notification using JavaScript -->
        <script>
            // Show the notification
            document.getElementById('notification').style.display = 'block';

            // Hide the notification after 3 seconds (adjust as needed)
            setTimeout(function () {
                document.getElementById('notification').style.display = 'none';
                // Redirect to index.php after hiding the notification
                window.location.href = 'index.php';
            }, 3000);
        </script>
    </div>
</body>
</html>
