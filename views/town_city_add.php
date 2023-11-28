<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the TownCity class file

$result = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name']
        // Add other fields as needed
    ];

    $db = new Database();
    $townCity = new TownCity($db);

    // Call the create method to add a new town/city record
    if ($townCity->create($data)) {
        echo "Record added successfully.";
    } else {
        echo "Failed to add the record.";
    }

    // You may also redirect to a different page after adding the record if needed
    // header("Location: index.php");
    // exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Add New Town/City</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h2>Add New Town/City</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">

            <input type="submit" value="Add">
        </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
