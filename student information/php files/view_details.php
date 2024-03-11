<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="">
    <!-- Include the same Google Fonts link as in the main page -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            background-color: #00FFFF;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #FFF8DC;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #DC143C;
            transition: color 0.3s; /* Smooth color transition on hover */
        }

        h1:hover {
            color: #0000CD; /* New color on hover */
        }

        .student-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
       	    font-size: 20px; 
        }

        .student-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .details-container {
            text-align: left;
        }

        .detail-list {
            list-style-type: none;
            padding: 0;
        }

        .detail-item {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            background-color: #E9967A;
            padding: 10px;
            border-radius: 8px;
        }

        .label {
            font-weight: bold;
            color: #000;
            width: 100px;
        }

        .colon {
            margin: 0 5px;
        }

        .value {
            color: #000;
            font-weight: bold;
       	    font-size: 20px; 
        }
    </style>
</head>
</head>
<body>
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

            // Fetch student details for the specified roll number
            $selectQuery = "SELECT * FROM student_details WHERE rollno = '$rollNoInput'";
            $result = $conn->query($selectQuery);

            // Display the student details
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='container'>";
		    echo "<h1>Student Details</h1>";
		    echo "<div class='student-details'>";
		    echo "<img src='photos/" . basename($row["photo_path"]) . "' 			    alt='Student Photo' class='student-photo'>";
		    echo "<div class='details-container'>";
		    echo "<ul class='detail-list'>";
		    echo "<li class='detail-item'><span class='label'>Name:</span><span 		    class='value'>" . $row["name"] . "</span></li>";
		    echo "<li class='detail-item'><span class='label'>Roll No:</span><span 		    class='value'>" . $row["rollno"] . "</span></li>";
                    // Format the Date of Birth
                    $dob = date("d F Y", strtotime($row["dob"]));
                    echo "<li class='detail-item'><span class='label'>DOB:</span><span class='value'>" . $dob . "</span></li>";
		    echo "<li class='detail-item'><span class='label'>Class:</span><span 		    class='value'>" . $row["class"] . "</span></li>";
		    echo "<li class='detail-item'><span class='label'>Batch:</span><span   		    class='value'>" . $row["batch"] . "</span></li>";
		    echo "</ul>";
		    echo "</div>";
		    echo "</div>";
		    echo "</div>";
                }
            } else {
                echo "<div class='container'>";
                echo "<h1>Student Details</h1>";
                echo "<p>No student records found for Roll No: $rollNoInput</p>";
                echo "</div>";
            }
        }

        // Close the connection
        $conn->close();
    ?>
</body>
</html>
