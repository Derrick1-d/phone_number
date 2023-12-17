<?php
$db = new mysqli('localhost', 'your_username', 'your_password', 'phone_numbers');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$query = "SELECT id, phone_number FROM numbers";
$result = $db->query($query);

if (!$result) {
    die('Query failed: ' . $db->error);
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Contact Management System</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Country Code</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <?php
                    // Separate country code and phone number
                    $countryCode = substr($row['phone_number'], 0, 3);
                    $phoneNumber = substr($row['phone_number'], 3);
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $countryCode; ?></td>
                    <td><?php echo $phoneNumber; ?></td>
                    <td><a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            var confirmDelete = confirm("Are you sure you want to delete this contact?");
            if (confirmDelete) {
                window.location.href = "delete_contact.php?id=" + id + "&confirm=true";
            }
        }
    </script>
</body>
</html>
