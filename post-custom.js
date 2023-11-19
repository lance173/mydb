
var myModal = new bootstrap.Modal(document.getElementById('InputTimeModal'), {})

var currentUrl = window.location.href;

// Create a URLSearchParams object
var urlParams = new URLSearchParams(currentUrl);

// Get the value of the "employeeID" parameter
var employeeID = urlParams.get('employeeID');

// Check if the parameter exists
if (employeeID !== null) {
myModal.toggle()
} else {
    
}




