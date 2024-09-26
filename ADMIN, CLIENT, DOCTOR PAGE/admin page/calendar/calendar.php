<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Calendar';
    $calendar_page = 'active';
    require_once('../../include/head.php');
?>
<body>
    <?php
        require_once('../../include/header.admin.php')
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../include/sidepanel.php')
                ?>
                <main>
                <div class="content">
        <div class="calendar-header">
            <h2>Calendar</h2>
            <div class="date-info">Today's Date: <span id="current-date"></span></div>
            <div class="buttons">
                <button id="addAppointmentBtn">Add Appointment</button>
                <button id="needHelpBtn">Need Help?</button>
                <button id="featureRequestBtn">Feature Request</button>
            </div>
        </div>

        <div class="calendar-container">
            <div class="calendar-nav">
                <button id="prevMonth">&lt;</button>
                <h3 id="currentMonthYear">January 2024</h3>
                <button id="nextMonth">&gt;</button>
            </div>
            
            <div class="view-buttons">
                <button id="monthView" class="active">Month</button>
                <button id="weekView">Week</button>
                <button id="dayView">Day</button>
            </div>
            
            <table id="calendarTable">
                <thead>
                    <tr>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                </thead>
                <tbody id="calendarBody">
                    <!-- Calendar Days will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
    </div>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }
        
        .sidebar {
            background-color: #fff;
            padding: 20px;
            width: 250px;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar ul {
            list-style: none;
        }
        
        .sidebar ul li {
            margin: 15px 0;
        }
        
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        
        .sidebar ul li a:hover {
            color: #007bff;
        }
        
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .calendar-header h2 {
            margin-bottom: 10px;
        }
        
        .date-info {
            font-size: 18px;
            font-weight: bold;
        }
        
        .buttons {
            display: flex;
            gap: 10px;
        }
        
        .buttons button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        
        .buttons button:hover {
            background-color: #0056b3;
        }
        
        .calendar-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .calendar-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .calendar-nav button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
        
        .view-buttons {
            display: flex;
            gap: 10px;
        }
        
        .view-buttons button {
            padding: 5px 10px;
            border: 1px solid #007bff;
            background-color: transparent;
            color: #007bff;
            cursor: pointer;
            border-radius: 5px;
        }
        
        .view-buttons button.active {
            background-color: #007bff;
            color: white;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f1f1f1;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .content {
                margin-left: 0;
            }
        }
    </style>
</main>
                <?php
        require_once('../../include/js.php')
    ?>
    <script src="calendar.js"></script>
</body>
</html>