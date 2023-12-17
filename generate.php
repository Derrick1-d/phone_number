<?php
$db = new mysqli('localhost', 'your_username', 'your_password', 'phone_numbers');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$countryCode = '+233';
$phoneNumber = $countryCode . rand(1000000000, 9999999999);

$checkQuery = "SELECT COUNT(*) AS count FROM numbers WHERE phone_number = '$phoneNumber'";
$result = $db->query($checkQuery);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    echo "Phone number already exists!";
} else {
    $insertQuery = "INSERT INTO numbers (phone_number) VALUES ('$phoneNumber')";
    $db->query($insertQuery);

    header("Location: success.html?phone=$phoneNumber");
}

$db->close();
?>
