<?php
include_once("../db.php");
include_once("../student.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Student Records</h2>
    <table class="orange-theme">
        <thead>
            <tr>
                <th>Student Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $results = $student->displayAll(); 
            foreach ($results as $result) {
            ?>
            <tr id="row_<?php echo $result['id']; ?>">
                <td><?php echo $result['student_number']; ?></td>
                <td><?php echo $result['first_name']; ?></td>
                <td><?php echo $result['middle_name']; ?></td>
                <td><?php echo $result['last_name']; ?></td>
                <td><?php echo $result['formatted_gender']; ?></td>
                <td><?php echo $result['formatted_birthday']; ?></td>
                <td>
                    <a href="student_edit.php?id=<?php echo $result['id']; ?>">
                        <button class="edit-button" type="button">Edit</button>
                    </a>
                    |
                    <button class="delete-button" type="button" data-id="<?php echo $result['id']; ?>">
                        Delete
                    </button>
                </td>
            </tr>
        <?php } ?>

           
        </tbody>
    </table>
        
    <a class="button-link" href="student_add.php">Add New Record</a>

        </div>
        
        <!-- Include the header -->
  
    <?php include('../templates/footer.html'); ?>


    <p></p>

    <script>
    $(document).ready(function() {
        // Attach a click event handler to all delete buttons
        $('.delete-button').click(function() {
            // Get the record id from the button's data-id attribute
            var recordId = $(this).data('id');

            // Make an AJAX request to delete the record
            $.get('student_delete.php?id=' + recordId, function(response) {
                // Check the response from the server
                if (response === 'success') {
                    // Remove the corresponding table row
                    $('#row_' + recordId).remove();
                } else {
                    // Handle error if needed
                    alert('Failed to delete the record.');
                }
            });
        });
    });
</script>
</body>
</html>
