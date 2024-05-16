<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_device'])) {
        $_SESSION['user_action'] = 'add_device';
        header('Location: add_device.php'); // Redirect to add_device.php after setting session
        exit;
    } elseif (isset($_POST['view_devices'])) {
        $_SESSION['user_action'] = 'view_devices';
        header('Location: view_devices.php');
        exit;
    } elseif (isset($_POST['view_history'])) {
        $_SESSION['user_action'] = 'view_history';
        header('Location: view_history.php');
    }

    // Redirect back to the main page or wherever you want after setting the session
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomaquin - Garcia Electronic Device Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('header.html'); ?>

    <div class="content">
        <div class="title">Tomaquin Garcia</div>
        <div class="subtitle">Electronic Devices Store</div>
        <p class="description">Tech That Connects” – Your plug into the future! 🌟</p>
        <button class="order-button">Click Here to Buy!</button>
    </div>

</body>
</html>
