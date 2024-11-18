<?php
include 'dbconfig.php';
include 'models.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchResults = searchApplicants($conn, $_POST['search']);
} else {
    $searchResults = getAllApplicants($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Job Application System</title>
</head>
<body>
    <h1>The Mount Sinai Hospital New York City</h1>

    <form method="POST">
        <input type="text" name="search" placeholder="Search by name, email, phone, address, or position">
        <button type="submit">Search</button>
    </form>

    <a href="insert.php">Add New Applicant</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Position</th>
                <th>Date Applied</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($searchResults['statusCode'] === 200) {
                foreach ($searchResults['querySet'] as $row) {
                    echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['position_applied']}</td>
                        <td>{$row['date_applied']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
