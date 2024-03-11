<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
    <link rel="stylesheet" href="styles_view_students.css">
    <!-- Include the same Google Fonts link as in the main page -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <div class="container">
        <h1>View Student Details</h1>

        <!-- Form to input Roll No -->
        <form action="view_details.php" method="post">
            <label for="roll_no_input">Enter Roll No:</label>
            <input type="text" id="roll_no_input" name="roll_no_input" required>
            <button type="submit">View Details</button>
        </form>
    </div>
</body>
</html>
