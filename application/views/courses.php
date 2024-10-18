<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<style>
    .success {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        max-width: 500px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    p {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333;
        line-height: 1.5;
    }
    p:first-of-type {
        font-weight: bold;
        color: #2c3e50;
    }

    form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    form input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    form button:hover {
        background-color: #0056b3;
    }

    form input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>

<body>
    <div class="success">
        <p>Your bio data and certificates have been submitted.</p>
        <p>Choose a course based on your preferences.</p>

    </div>

    <div>
        <form action="<?= site_url('student/submit_application') ?>" method="post" enctype="multipart/form-data">
          
            <input type="hidden" name="student_id" value="<?php echo $student_id ?? 'd'; ?>" readonly>

            <label for="specialization">Your specialization:</label>
            <input type="text" name="specialization" value="<?php echo $course_name ?>" readonly>

            <label for="selectedCourse">Select a Course:</label>
            <select name="selectedCourse" id="selectedCourse">
                <?php if (!empty($course_list)): ?>
                    <ul>
                        <?php foreach ($course_list as $course): ?>
                            <?php echo $course;?>
                            <option value=<?php echo $course; ?>><?php echo $course; ?></option>
                           
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No courses available.</p>
                <?php endif; ?>

            </select>
            <button type="submit">Submit</button>
        </form>
    </div>




</body>

</html>