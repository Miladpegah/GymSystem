
function validateSignIn() {
    var x = document.forms["signin"]["username"].value;
    var y = document.forms["signin"]["password"].value;
    if (x == null || x == "" || y == null || y == "")
    {
        alert("Both fields name must be filled out!");
        return false;
    }
}


function validateLogin() {
    var x = document.forms["login"]["username"].value;
    var y = document.forms["login"]["password"].value;
    if (x == null || x == "" || y == null || y == "")
    {
        alert("Please fill out the both fields!");
        return false;
    }
}

function validatePostcode(postcode) {
    //(RegEx supplied by the UK Government)
    var regExp = /^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/i;
    return regExp.test(postcode);
}

function validateEmail(email) {
    // As recommended by IETF (rfc5322#section-3.4)
    var regExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i;
    return regExp.test(email);
}




function validateSignUp() {
    document.getElementById("jsErrors").style.display = 'block';
    document.getElementById("jsErrors").innerHTML = "";
    var username = document.forms["signup"]["username"].value;
    var password = document.forms["signup"]["password"].value;
    var firstname = document.forms["signup"]["firstname"].value;
    var lastname = document.forms["signup"]["lastname"].value;
    var dob = document.forms["signup"]["dob"].value;
    var address = document.forms["signup"]["address"].value;
    var city = document.forms["signup"]["city"].value;
    var postcode = document.forms["signup"]["postcode"].value;
    var email = document.forms["signup"]["email"].value;
    var mobile = document.forms["signup"]["mobile"].value;


    // Write to the error div (id = jsErrors)
    var error = document.getElementById("jsErrors");
    error.innerHTML += '<big><b>Please correct the following fields:</b></big></br></br>';

    var anyErrors = false;

    // Username validatiopn
    if (username == null || username == "")
    {
        error.innerHTML += '&bull; Username field must be filled out!</br>';
        var anyErrors = true;
    }

    // Username validation
    if (password == null || password == "")
    {
        error.innerHTML += '&bull; Password field must be filled out!</br>';
        var anyErrors = true;
    }

    // First Name validation
    if (firstname == null || firstname == "")
    {
        error.innerHTML += '&bull; First Name field must be filled out!</br>';
        var anyErrors = true;
    }

    // Last Name validation
    if (lastname == null || lastname == "")
    {
        error.innerHTML += '&bull; Last Name field must be filled out!</br>';
        var anyErrors = true;
    }

    // DoB validation
    if (dob == null || dob == "")
    {
        error.innerHTML += '&bull; Date of Birth field must be filled out!</br>';
        var anyErrors = true;
    }

    // Address validation
    if (address == null || address == "")
    {
        error.innerHTML += '&bull; Address field must be filled out!</br>';
        var anyErrors = true;
    }

    // City validation
    if (city == null || city == "")
    {
        error.innerHTML += '&bull; City field must be filled out!</br>';
        var anyErrors = true;
    }

    // Postcode validation
    if (validatePostcode(postcode) == false)
    {
        error.innerHTML += '&bull; The postcode entered is invalid or empty!</br>';
        var anyErrors = true;
    }

    // Postcode validation
    if (validateEmail(email) == false)
    {
        error.innerHTML += '&bull; Email field entered is invalid or empty!</br>';
        var anyErrors = true;
    }

    // Mobile validation
    if (mobile == null || mobile == "")
    {
        error.innerHTML += '&bull; Mobile field must be filled out!</br>';
        var anyErrors = true;
    }

    // Validate whole form submission
    if (anyErrors == false)
    {
        return true; // No errors > submit the form
    } else
    {
        return false; // There were errors - stay on the page.
    }
}