const calendarTable = document.getElementById('calendarBody');
        const currentMonthYear = document.getElementById('currentMonthYear');
        const currentDateDisplay = document.getElementById('current-date');
        
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let currentYear = 2024;
        let currentMonth = 0; // January is 0
        
        // Display current date
        const today = new Date();
        currentDateDisplay.textContent = today.toLocaleDateString();

        // Render the calendar
        function renderCalendar() {
            calendarTable.innerHTML = '';
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            currentMonthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            let row = document.createElement('tr');
            // Fill the first row with blank spaces for the previous month's days
            for (let i = 0; i < firstDayOfMonth; i++) {
                let blankCell = document.createElement('td');
                row.appendChild(blankCell);
            }

            // Fill in the actual days
            for (let day = 1; day <= daysInMonth; day++) {
                let cell = document.createElement('td');
                cell.textContent = day;
                row.appendChild(cell);

                if ((firstDayOfMonth + day) % 7 === 0) {
                    calendarTable.appendChild(row);
                    row = document.createElement('tr');
                }
            }
            // Append the remaining row
            calendarTable.appendChild(row);
        }

        // Navigation
        document.getElementById('prevMonth').addEventListener('click', () => {
            if (currentMonth === 0) {
                currentMonth = 11;
                currentYear--;
            } else {
                currentMonth--;
            }
            renderCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            if (currentMonth === 11) {
                currentMonth = 0;
                currentYear++;
            } else {
                currentMonth++;
            }
            renderCalendar();
        });

        // Initial render
        renderCalendar();

        // Button interactions
        document.getElementById("addAppointmentBtn").addEventListener("click", function() {
            alert("Add Appointment functionality will go here!");
        });

        document.getElementById("needHelpBtn").addEventListener("click", function() {
            alert("Need Help functionality will go here!");
        });

        document.getElementById("featureRequestBtn").addEventListener("click", function() {
            alert("Feature Request functionality will go here!");
        });

        // Views switching
        const monthViewBtn = document.getElementById("monthView");
        const weekViewBtn = document.getElementById("weekView");
        const dayViewBtn = document.getElementById("dayView");

        monthViewBtn.addEventListener("click", function() {
            monthViewBtn.classList.add("active");
            weekViewBtn.classList.remove("active");
            dayViewBtn.classList.remove("active");
            alert("Month view selected.");
        });

        weekViewBtn.addEventListener("click", function() {
            weekViewBtn.classList.add("active");
            monthViewBtn.classList.remove("active");
            dayViewBtn.classList.remove("active");
            alert("Week view selected.");
        });

        dayViewBtn.addEventListener("click", function() {
            dayViewBtn.classList.add("active");
            monthViewBtn.classList.remove("active");
            weekViewBtn.classList.remove("active");
            alert("Day view selected.");
        });