<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_device'])) {
    // Check if form data is set
    if (isset($_POST['device_name'], $_POST['device_price'], $_POST['device_quantity'])) {
        // Initialize the devices array if it doesn't exist in the session
        if (!isset($_SESSION['devices'])) {
            $_SESSION['devices'] = [];
        }

        // Retrieve form data
        $device_name = $_POST['device_name'];
        $device_price = $_POST['device_price'];
        $device_quantity = $_POST['device_quantity'];

        // Create a new device object
        $new_device = [
            'name' => $device_name,
            'price' => $device_price,
            'quantity' => $device_quantity
        ];

        // Add the new device to the devices array in the session
        $_SESSION['devices'][] = $new_device;

        // Redirect to view_devices.php after adding the device
        header("Location: view_devices.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomaquin - Garcia Electronic Device Store</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include styles.css -->
</head>
<body>
    <?php include('header.html'); ?> <!-- Include the header to maintain consistency -->

    <!-- Content specific to add_device.php -->
    <div class="content">
        <div class="title">Add Device</div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="add-group">
                <input type="text" id="device_name" name="device_name" placeholder="Device name" required>
            </div>
            <div class="add-group">
                <input type="text" id="device_price" name="device_price" placeholder="Price" required pattern="\d+">
            </div>
            <div class="add-group">
                <input type="text" id="device_quantity" name="device_quantity" placeholder="Quantity" required pattern="\d+">
            </div>
            <div class="add-group">
                <button type="submit" name="add_device" class="add-button">Add Device</button>
            </div>
        </form>
    </div>
</body>
</html>
