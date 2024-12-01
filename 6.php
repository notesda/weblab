<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve name and age from the form
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student (name, age) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $age);  // "si" indicates the data types (string, integer)

    // Execute the query
    if ($stmt->execute()) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>
<body>
    <h2>Enter Student Details</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>