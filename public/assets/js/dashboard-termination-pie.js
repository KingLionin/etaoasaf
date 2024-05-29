var GooglePieBasic = function() {
    // Setup module components
    var _googlePieBasic = function() {
        if (typeof google == 'undefined') {
            console.warn('Warning - Google Charts library is not loaded.');
            return;
        }

        // Switch colors in dark and light themes
        function color_theme(darkColor, lightColor) {
            return document.documentElement.getAttribute('data-color-theme') == 'dark' ? darkColor : lightColor;
        }

        // Initialize chart
        google.charts.load('current', {
            callback: function () {
                // Fetch data and draw chart
                fetchDataAndDrawPie();

                // Resize on sidebar width change
                var sidebarToggle = document.querySelectorAll('.sidebar-control');
                if (sidebarToggle) {
                    sidebarToggle.forEach(function(togglers) {
                        togglers.addEventListener('click', fetchDataAndDrawPie);
                    });
                }

                // Resize on window resize
                var resizePieBasic;
                window.addEventListener('resize', function() {
                    clearTimeout(resizePieBasic);
                    resizePieBasic = setTimeout(function () {
                        fetchDataAndDrawPie();
                    }, 200);
                });

                // Redraw chart when color theme is changed
                document.querySelectorAll('[name="main-theme"]').forEach(function(radio) {
                    radio.addEventListener('change', fetchDataAndDrawPie);
                });
            },
            packages: ['corechart']
        });

        // Fetch data from backend and draw the pie chart
        function fetchDataAndDrawPie() {
            var offcount = 0;
            var emplcount = 0;
            var dataFetched = 0;

            function checkAndDrawPie() {
                if (dataFetched === 2) {
                    if (emplcount === 0 && offcount === 0) {
                        displayNoDataMessage();
                    } else {
                        drawPie(offcount, emplcount);
                    }
                }
            }

            $.ajax({
                url: '/stats/offboard', // Assuming this is the correct endpoint
                method: 'GET',
                success: function(response) {
                    drawPie(response.offcount);
                    document.getElementById('off-count').innerText = response.offcount;
                    offcount = response.offcount || 0;
                    dataFetched++;
                    checkAndDrawPie();
                },
                error: function() {
                    console.error('Failed to fetch offboard stats.');
                    dataFetched++;
                    checkAndDrawPie();
                }
            });

            $.ajax({
                url: '/stats/employees', // Assuming this is the correct endpoint
                method: 'GET',
                success: function(response) {
                    emplcount = response.emplcount || 0;
                    dataFetched++;
                    checkAndDrawPie();
                },
                error: function() {
                    console.error('Failed to fetch employee stats.');
                    dataFetched++;
                    checkAndDrawPie();
                }
            });
        }

        // Display message when no data is available
        function displayNoDataMessage() {
            var pie_chart_element = document.getElementById('google-pie');
            pie_chart_element.innerHTML = '<div class="text-center text-muted">Cannot display chart because there are no offboarded or terminated employees.</div>';
        }

        // Chart settings    
        function drawPie(offcount, emplcount) {
            // Define charts element
            var pie_chart_element = document.getElementById('google-pie');

            // Data
            var data = google.visualization.arrayToDataTable([
                ['TandO', 'Numbers'],
                ['OFFBOARD', offcount],
                ['TERMINATED', 0], // If you want to add terminated count, you can fetch and add it here
                ['EMPLOYEES', emplcount]
            ]);

            // Options
            var options_pie = {
                fontName: 'var(--body-font-family)',
                height: 250,
                width: 500,
                backgroundColor: 'transparent',
                pieSliceBorderColor: color_theme('#2c2d32', '#fff'),
                colors: [
                    '#ffc107','#dc3545','#0d6efd'
                ],
                legend: {
                    textStyle: {
                        color: color_theme('#fff', '#333')
                    }
                },
                chartArea: {
                    left: 50,
                    width: '100%',
                    height: '100%'
                }
            };

            // Instantiate and draw our chart, passing in some options.
            var pie = new google.visualization.PieChart(pie_chart_element);
            pie.draw(data, options_pie);
        }
    };

    // Return objects assigned to module
    return {
        init: function() {
            _googlePieBasic();
        }
    }
}();

// Initialize module
GooglePieBasic.init();
