<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL

    // Instantiate the Database and Student classes
    $db = new Database();
    $student = new Student($db);

    // Call the delete method to delete the student record
    if ($student->delete($id)) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete the record.";
    }
}
?>
