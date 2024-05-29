var GoogleDonutBasic = function() {
    // Setup module components
    var _googleDonutBasic = function() {
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
                fetchDataAndDrawDonut();

                // Resize on sidebar width change
                var sidebarToggle = document.querySelectorAll('.sidebar-control');
                if (sidebarToggle) {
                    sidebarToggle.forEach(function(togglers) {
                        togglers.addEventListener('click', fetchDataAndDrawDonut);
                    });
                }

                // Resize on window resize
                var resizeDonutBasic;
                window.addEventListener('resize', function() {
                    clearTimeout(resizeDonutBasic);
                    resizeDonutBasic = setTimeout(function () {
                        fetchDataAndDrawDonut();
                    }, 200);
                });

                // Redraw chart when color theme is changed
                document.querySelectorAll('[name="main-theme"]').forEach(function(radio) {
                    radio.addEventListener('change', fetchDataAndDrawDonut);
                });
            },
            packages: ['corechart']
        });

        // Fetch data from backend and draw the donut chart
        function fetchDataAndDrawDonut() {
            $.ajax({
                url: '/surveys/stats',
                method: 'GET',
                success: function(response) {
                    drawDonut(response.surveyCount);
                    document.getElementById('survey-count').innerText = response.surveyCount;

                    if (response.surveyCount === 0) {
                        displayNoDataMessage();
                    } else {
                        drawDonut(response.surveyCount, response.responseCount);
                    }
                },
                error: function() {
                    console.error('Failed to fetch survey stats.');
                }
            });
        }

        // Display message when no data is available
        function displayNoDataMessage() {
            var donut_chart_element = document.getElementById('google-donut');
            donut_chart_element.innerHTML = '<div class="text-center text-muted">Cannot Display chart because there is no survey and responses created</div>';
        }

        // Chart settings
        function drawDonut(surveyCount) {
            // Define charts element
            var donut_chart_element = document.getElementById('google-donut');

            // Data
            var data = google.visualization.arrayToDataTable([
                ['SandF', 'Number per Day'],
                ['SURVEYS', surveyCount],
                ['RESPONSES', 0]  // Assuming you want to add responses later
            ]);

            // Options
            var options_donut = {
                fontName: 'var(--body-font-family)',
                pieHole: 0.55,
                height: 250,
                width: 500,
                backgroundColor: 'transparent',
                pieSliceBorderColor: color_theme('#2c2d32', '#fff'),
                colors: [
                    '#0275d8', '#5cb85c'
                ],
                legend: {
                    textStyle: {
                        color: color_theme('#fff', '#333')
                    }
                },
                chartArea: {
                    left: 50,
                    width: '90%',
                    height: '90%'
                }
            };

            // Instantiate and draw our chart, passing in some options.
            var donut = new google.visualization.PieChart(donut_chart_element);
            donut.draw(data, options_donut);
        }
    };

    // Return objects assigned to module
    return {
        init: function() {
            _googleDonutBasic();
        }
    }
}();

// Initialize module
GoogleDonutBasic.init();
