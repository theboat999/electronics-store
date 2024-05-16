<?php
session_start();

if (isset($_GET['id'])) {
    $deviceId = $_GET['id'];
    if (isset($_SESSION['devices'][$deviceId])) {
        unset($_SESSION['devices'][$deviceId]);
        header('Location: view_devices.php');
        exit;
    } else {
        echo "Device not found.";
        exit;
    }
} else {
    echo "No device ID specified.";
    exit;
}
?>
