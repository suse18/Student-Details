<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Details</title>
    <link rel="stylesheet" href="styles_add_student.css">
    <!-- Include the same Google Fonts link as in the main page -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <div class="container">
        <h1>Add Student Details</h1>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <!-- Name Input -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Roll No Input -->
            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" id="roll_no" name="roll_no" required>
            </div>

            <!-- Date Input -->
            <div class="form-group">
                <label for="date">Date of Birth:</label>
                <input type="date" id="date" name="date" required>
            </div>

            <!-- Class Input -->
            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" id="class" name="class" required>
            </div>

            <!-- Batch Input (Academic Year) -->
            <div class="form-group">
                <label for="batch">Batch:</label>
                <select id="batch" name="batch" required>
                    <?php
                    // Generate options starting from 2001 with a gap of two years, up to the year 2100
                    $startYear = 2000;
                    $endYear = 2100;
                    for ($year = $startYear; $year <= $endYear; $year +=1) {
                        $nextYear = $year + 2;
                        echo "<option value='$year-$nextYear'>$year - $nextYear</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Photo Input -->
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
