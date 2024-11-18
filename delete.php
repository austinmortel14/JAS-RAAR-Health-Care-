<?php
include 'dbconfig.php';
include 'models.php';
$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode([
        "message" => "Invalid Applicant ID",
        "statusCode" => 400
    ]);
    exit;
}
$response = deleteApplicant($conn, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete Applicant</title>
</head>
<body>
    <div class="container">
        <h1>Delete Applicant</h1>

        <?php if ($response['statusCode'] === 200): ?>
            <p class="success-message"><?= $response['message'] ?></p>
        <?php else: ?>
            <p class="error-message"><?= $response['message'] ?></p>
        <?php endif; ?>

        <a href="index.php" class="back-button">Back to Homepage</a>
    </div>
</body>
</html>
