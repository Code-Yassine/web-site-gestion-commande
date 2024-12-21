// Get the notification element
const notification = document.getElementById('notification');
// Show the notification
notification.style.display = 'block';

// Automatically hide the notification after 5 seconds (5000 milliseconds)
setTimeout(function() {
  notification.style.display = 'none';
}, 3000);