<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Set the width of the form */
}

label {
    display: block;
    margin-bottom: 8px;
    color: #666;
}

input[type="text"],
input[type="password"] {
    width: 100%; /* Full-width input fields */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Prevents padding from affecting total width */
}

button {
    background-color: #28a745; /* Green button */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%; /* Full-width button */
}

button:hover {
    background-color: #218838; /* Darker green on hover */
}

p {
    text-align: center;
    color: #666;
}

a {
    color: #007bff; /* Link color */
    text-decoration: none;
}

a:hover {
    text-decoration: underline; /* Underline link on hover */
}

</style>
<body>
    <div>
    <h2>Sign Up</h2>
    <form action="<?= site_url('auth/register') ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Sign Up</button>
    </form>
    </div>
</body>
</html>
