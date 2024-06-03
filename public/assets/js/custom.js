
function validateCiscoForm() {
    // Get the form elements
    const model = document.getElementById('model').value;
    const serialNumber = document.getElementById('serial_number').value;
    const macAddress = document.getElementById('mac_address').value;
    const dateAdded = document.getElementById('date_added').value;

    // Regular expression for MAC address validation
    const macPattern = /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;

    // Validate model (non-empty)
    if (model.trim() === "") {
        alert("Model is required.");
        return false;
    }

    // Validate serial number (non-empty)
    if (serialNumber.trim() === "") {
        alert("Serial Number is required.");
        return false;
    }

    // Validate MAC address (non-empty and matches pattern)
    if (macAddress.trim() === "") {
        alert("MAC Address is required.");
        return false;
    } else if (!macAddress.match(macPattern)) {
        alert("Please enter a valid MAC Address.");
        return false;
    }

    // Validate date added (non-empty and valid date)
    if (dateAdded.trim() === "") {
        alert("Date Added is required.");
        return false;
    }

    // If all validations pass
    return true;
}

function validateForm() {
    // Get the form elements
    const model = document.getElementById('model').value.trim();
    const serialNumber = document.getElementById('serial_number').value.trim();
    const macAddress = document.getElementById('mac_address').value.trim();
    const dateAdded = document.getElementById('date_added').value.trim();

    // Regular expression for MAC address validation
    const macPattern = /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;

    // Flags to check validation status
    let isValid = true;

    // Validate model
    if (model === "") {
        showError('model', 'Model is required.');
        isValid = false;
    } else {
        hideError('model');
    }

    // Validate serial number
    if (serialNumber === "") {
        showError('serial_number', 'Serial Number is required.');
        isValid = false;
    } else {
        hideError('serial_number');
    }

    // Validate MAC address
    if (macAddress === "") {
        showError('mac_address', 'MAC Address is required.');
        isValid = false;
    } else if (!macPattern.test(macAddress)) {
        showError('mac_address', 'Please enter a valid MAC Address.');
        isValid = false;
    } else {
        hideError('mac_address');
    }

    // Validate date added
    if (dateAdded === "") {
        showError('date_added', 'Date Added is required.');
        isValid = false;
    } else {
        hideError('date_added');
    }

    // If all validations pass
    return isValid;
}

function showError(elementId, errorMessage) {
    const errorElement = document.getElementById(elementId + 'Error');
    const inputElement = document.getElementById(elementId);
    errorElement.textContent = errorMessage;
    errorElement.style.display = 'inline';
    inputElement.classList.add('invalid');
}

function hideError(elementId) {
    const errorElement = document.getElementById(elementId + 'Error');
    const inputElement = document.getElementById(elementId);
    errorElement.style.display = 'none';
    inputElement.classList.remove('invalid');
}

function validateProvince() {
    // Get the form elements
    const province = document.getElementById('province_name').value;
    const result = true;

    var digit = /\d/;

    if( digit.exec(province) > 0){
        alert("Province Name must be Text.");
        return false;
    }else if(province == ""){
        alert("Province Name is required.");
        return false;
    }else{

    }
    return result;
}

function validateUserAddedForm() {
    // Get the form elements
    const name = document.getElementById('name').value;
    const username = document.getElementById('username').value;
    const phone_number = document.getElementById('phone_number').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Regular expressions for validation
    const phonePattern = /^\d{10}$/;  // Assuming phone number is 10 digits
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    // Validate Name (non-empty)
    if (name.trim() === "") {
        alert("Name is required.");
        return false;
    }
    // Validate UserName (non-empty)
    if (username.trim() === "") {
        alert("UserName is required.");
        return false;
    }
    // Validate Phone Number
    if (phone_number.trim() === "") {
        alert("PhoneNumber is required.");
        return false;
    }else if (!phonePattern.test(phone_number)){
        alert("Please Enter a valid Phone Number.");
        return false;
    }
    // Validate Email
    if (email.trim() === "") {
        alert("Eamil is required.");
        return false;
    }else if (!emailPattern.test(email)){
        alert("Please Enter a valid Email Address.");
        return false;
    }
    // Validate Password
    if (password.trim() === "") {
        alert("password is required.");
        return false;
    }else if (password.length < 3){
        alert("Password must be at least 3 characters long.");
        return false;
    }

    // If all validations pass
    return true;
}


