<?php
session_start();

if (!isset($_SESSION['purchase_history']) || empty($_SESSION['purchase_history'])) {
    echo "No purchase history available.";
    exit;
}

$purchaseHistory = $_SESSION['purchase_history'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase History</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="content">
        <h1>Purchase History</h1>
        <table>
            <tr>
                <th>Device Name</th>
                <th>Quantity</th>
                <th>Date Purchased</th>
            </tr>
            <?php foreach ($purchaseHistory as $purchase): ?>
                <tr>
                    <td><?php echo htmlspecialchars($purchase['name']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($purchase['timestamp']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
