<!DOCTYPE html>
<html>
<head>
    <title>Add New Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background-color: #033b06;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #044d07;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Course</h2>
        <form method="post" action="insertCourses.php">
            <input type="hidden" name="college_id" value="<?php echo $college_id; ?>">
            <label for="course_code">Course Code:</label>
            <input type="text" name="course_code" required>
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" required>
            <label for="begins_at">Begins At:</label>
            <input type="text" name="begins_at" required>
            <label for="duration">Duration:</label>
            <input type="text" name="duration" required>
            <label for="admission_fee">Admission Fee:</label>
            <input type="text" name="admission_fee" required>
            <label for="fee_structure">Fee Structure:</label>
            <input type="text" name="fee_structure" required>
            <label for="total_seats">Total Seats:</label>
            <input type="number" name="total_seats">
            <input type="submit" name="add_course" value="Add Course">
        </form>
    </div>
</body>
</html>
   