<?php
include_once("../db.php"); // Include the Database class file
include_once("../province.php"); // Include the Province class file

$result = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'name' => $_POST['name'],
        // Add other fields as needed
    ];

    $db = new Database();
    $province = new Province($db);

    // Call the create method to add a new province record
    if ($province->create($data)) {
        echo "Province record added successfully.";
    } else {
        echo "Failed to add the province record.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Add Province</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h2>Add Province Information</h2>
        <form action="" method="post">
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="">
            

            <input type="submit" value="Add">
        </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
