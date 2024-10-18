<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<style>
   
    h2 {
        font-family: Arial, sans-serif;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    h6 {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #7f8c8d;
        font-weight: normal;
        text-align: center;
        margin-bottom: 30px;
    }


    .submission-message {
        max-width: 600px;
        margin: 250px auto;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

</style>

<body>
   
    <div class="submission-message">
        <h2 class="text-success">Submitted</h2>
        <h6>Your application has been submitted successfully, we will get back to you shortly</h6>
        <h6 class="nav-link"><a href="<?= base_url('student/bio_data'); ?>"> HOME</a></h6>
    </div>

</body>

</html>