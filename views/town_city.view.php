<?php
include_once("../db.php");
include_once("../town_city.php"); // Adjust the path based on the actual location of province.php

$db = new Database();
$connection = $db->getConnection();
$townCity = new TownCity($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town/City</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <h2>Town/City</h2>
        <table class="orange-theme">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $results = $townCity->displayAll(); 
                    foreach ($results as $result) {
                ?>
                <tr>
                    <td><?php echo $result['name']; ?></td>
                    <td>
                        <a href="town_city_edit.php?id=<?php echo $result['id']; ?>">
                            <button class="edit-button" type="button">Edit</button>
                        </a>
                        |
                        <a href="town_city_delete.php?id=<?php echo $result['id']; ?>">
                            <button class="delete-button" type="button">Delete</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <a class="button-link" href="town_city_add.php">Add New Town/City</a>
    </div>

    <!-- Include the footer -->
    <?php include('../templates/footer.html'); ?>
</body>
</html>
