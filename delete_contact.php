<?php
$db = new mysqli('localhost', 'your_username', 'your_password', 'phone_numbers');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the user confirmed the delete action
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        $deleteQuery = "DELETE FROM numbers WHERE id = $id";
        $db->query($deleteQuery);
    } else {
        // If not confirmed, redirect back to display_contacts.php
        header("Location: display_contacts.php");
        exit();
    }
}

$db->close();

header("Location: display_contacts.php");
?>
