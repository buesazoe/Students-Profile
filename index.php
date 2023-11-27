<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- Include ChartJS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Include the header -->
    <?php include('templates/header.html'); ?>
    <?php include('includes/navbar.php'); ?>

    <div class="content">
        <!-- Description -->
        <div>
            <h2>Student Records Dashboard</h2>
            <p>This chart displays the number of students over the months.</p>
        </div>

    <div class="content">
        <!-- Chart container -->
        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script>
            // Dummy data for the chart (replace this with your data)
            var chartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Number of Students',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Get the chart canvas element
            var ctx = document.getElementById('myChart').getContext('2d');

            // Create the chart
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>

    <!-- Include the footer -->
    <?php include('templates/footer.html'); ?>
</body>
</html>
