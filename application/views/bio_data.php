<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio Data</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<style>
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

    form input[type="text"],
    form input[type="date"],
    form input[type="number"],
    form input[type="file"] {
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

    h2 {
        text-align: center;
    }
</style>

<body>
    <div>
        <h2>Bio Data</h2>
        <form action="<?= site_url('student/upload_certificates') ?>" method="post" enctype="multipart/form-data">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required>

            <label for="specialization">Select a specialization:</label>

            <select name="specialization" id="specialization">

                <?php if (!empty($courses)): ?>
                    <ul>
                        <?php foreach ($courses as $course): ?>
                            <option value=<?php echo $course['course_name']; ?>><?php echo $course['course_name']; ?></option>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No courses available.</p>
                <?php endif; ?>
                
            </select>

            <label for="marks_10">10th Marks:</label>
            <input type="number" name="marks_10" required>

            <label for="marks_12">12th Marks:</label>
            <input type="number" name="marks_12" required>

            <label for="certificate_10">10th Certificate:</label>
            <input type="file" name="certificate_10" required>

            <label for="certificate_12">12th Certificate:</label>
            <input type="file" name="certificate_12" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>