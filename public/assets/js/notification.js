/************************************************************************************************************************/

/* 
 *
 * Notification Number
 * 
 */

// For the notification count
function fetchNotificationCount() {
    // Make an AJAX request to fetch count
    $.get('/api/offboarding/requests/count', function (data) {
        // Check if count is greater than zero
        if (data.count > 0) {
            // Update the count in the badge
            $('#notification-badge').text(data.count);
        } else {
            // Hide the badge if count is zero
            $('#notification-badge').text('').hide();
        }
    });
}

// Call the function on page load
$(document).ready(function () {
    fetchNotificationCount();
});

