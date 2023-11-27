<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the TownCity class file

$result = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch town/city data by ID from the database
    $db = new Database();
    $townCity = new TownCity($db);
    $townCityData = $townCity->read($id); // Implement the read method in the TownCity class

    if (!$townCityData) {
        echo "Town/City not found.";
        exit; // Exit to stop further execution
    }
} else {
    echo "Town/City ID not provided.";
    exit; // Exit to stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        // Add other fields as needed
    ];

    $db = new Database();
    $townCity = new TownCity($db);

    // Call the update method to update the town/city data
    if ($townCity->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }

    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Town/City</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h2>Edit Town/City Information</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $townCityData['id']; ?>">
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $townCityData['name']; ?>">
            
            <!-- Add other fields as needed -->

            <input type="submit" value="Update">
        </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
