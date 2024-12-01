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

// Initialize variables
$bookDetails = null;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the book title from the form
    $title = $_POST['title'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM book WHERE title = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any results were returned
    if ($result->num_rows > 0) {
        // Fetch the book details
        $bookDetails = $result->fetch_assoc();
    } else {
        $bookDetails = false; // Book not found
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
    <title>Search Book</title>
</head>
<body>
    <h2>Search for a Book</h2>
    <form action="" method="post">
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        <input type="submit" value="Search">
    </form>

    <?php if ($bookDetails !== null): ?>
        <?php if ($bookDetails): ?>
            <h3>Book Details:</h3>
            <p><strong>Access Number:</strong> <?php echo htmlspecialchars($bookDetails['access_number']); ?></p>
            <p><strong>Title:</strong> <?php echo htmlspecialchars($bookDetails['title']); ?></p>
            <p><strong>Authors:</strong> <?php echo htmlspecialchars($bookDetails['authors']); ?></p>
            <p><strong>Edition:</strong> <?php echo htmlspecialchars($bookDetails['edition']); ?></p>
            <p><strong>Publication:</strong> <?php echo htmlspecialchars($bookDetails['publication']); ?></p>
        <?php else: ?>
            <p>The book does not exist in the database.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>