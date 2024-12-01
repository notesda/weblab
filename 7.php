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

// Initialize an empty variable for results
$resultData = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the SQL query from the form
    $query = $_POST['query'];

    // Execute the query
    if ($result = $conn->query($query)) {
        // Fetch the results into an associative array
        while ($row = $result->fetch_assoc()) {
            $resultData[] = $row;
        }
        // Free result set
        $result->free();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Student Table</title>
</head>
<body>
    <h2>Execute SQL Query</h2>
    <form action="" method="post">
        <label for="query">SQL Query:</label><br>
        <textarea id="query" name="query" rows="4" cols="50" required></textarea>
        <br><br>
        <input type="submit" value="Execute">
    </form>

    <?php if (!empty($resultData)): ?>
        <h2>Results</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Age</th>
            </tr>
            <?php foreach ($resultData as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>