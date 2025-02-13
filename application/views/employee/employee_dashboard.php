<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Vehicle Rental</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="<?=base_url()?>/vehicle">Vehicles</a></li>
                <li><a href="#">Rentals</a></li>
                <li><a href="#">Customers</a></li>
                
            </ul>
        </div>

        <!-- Main content area -->
        <div class="main-content">
            <header>
                <h1>Employee Dashboard</h1>
            </header>

            <section class="dashboard-summary">
                <div class="summary-box">
                    <h3>Total Rentals</h3>
                    <p>50</p>
                </div>
                <div class="summary-box">
                    <h3>Available Vehicles</h3>
                    <p>10</p>
                </div>
                <div class="summary-box">
                    <h3>Total Revenue</h3>
                    <p>$5000</p>
                </div>
                <div class="summary-box">
                    <h3>Upcoming Reservations</h3>
                    <p>5</p>
                </div>
            </section>

            <section class="recent-rentals">
                <h2>Recent Rentals</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Vehicle</th>
                            <th>Rental Duration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Honda Accord</td>
                            <td>3 Days</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Toyota Corolla</td>
                            <td>1 Day</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <style>
        /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
}

/* Dashboard container */
.dashboard-container {
    display: flex;
    height: 100vh;
}

/* Sidebar styles */
.sidebar {
    width: 250px;
    background-color:#1085eebd;
    color: white;
    padding-top: 20px;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar h2 {
    font-size: 24px;
    margin: 0;
    color: #f1f1f1;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
}

.sidebar-menu li {
    padding: 15px;
    text-align: center;
}

.sidebar-menu li a {
    color: white;
    text-decoration: none;
    display: block;
    font-size: 18px;
    transition: background-color 0.3s;
}

.sidebar-menu li a:hover {
    background-color: #444;
}

/* Main content area */
.main-content {
    flex-grow: 1;
    padding: 30px;
}

header {
    text-align: center;
    margin-bottom: 30px;
}

header h1 {
    font-size: 32px;
    color: #333;
}

/* Dashboard summary section */
.dashboard-summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.summary-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(24, 24, 217, 0.81);
    text-align: center;
}

.summary-box h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.summary-box p {
    font-size: 24px;
    font-weight: bold;
    color: #28a745;
}

/* Recent rentals section */
.recent-rentals h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

table th, table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #007bff;
    color: white;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

    </style>
</body>
</html>
