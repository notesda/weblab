<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "books";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve book details from the form
    $access_number = $_POST['access_number'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publication = $_POST['publication'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO book (access_number, title, authors, edition, publication) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issis", $access_number, $title, $authors, $edition, $publication);  // "issis" indicates the data types (int, string, string, int, string)

    // Execute the query
    if ($stmt->execute()) {
        echo "<p>New book record created successfully</p>";
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
    <title>Insert Book</title>
</head>
<body>
    <h2>Enter Book Details</h2>
    <form action="" method="post">
        <label for="access_number">Access Number:</label>
        <input type="number" id="access_number" name="access_number" required>
        <br><br>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        
        <label for="authors">Authors:</label>
        <input type="text" id="authors" name="authors" required>
        <br><br>
        
        <label for="edition">Edition:</label>
        <input type="number" id="edition" name="edition" required>
        <br><br>
        
        <label for="publication">Publication:</label>
        <input type="text" id="publication" name="publication" required>
        <br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>