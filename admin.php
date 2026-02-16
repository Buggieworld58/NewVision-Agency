<?php
include 'db_connect.php';

// Simple authentication (add password protection in production)
$password = "admin123"; // Change this!

if (!isset($_SERVER['PHP_AUTH_USER']) || 
    $_SERVER['PHP_AUTH_PW'] != $password) {
    header('WWW-Authenticate: Basic realm="Admin Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    exit;
}

// Fetch all contacts
$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; padding: 20px; }
        table { width: 100%; background: white; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #0b0b0f; color: white; }
        tr:hover { background: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Contact Form Submissions</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars(substr($row['message'], 0, 50)); ?>...</td>
            <td><?php echo $row['submitted_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>