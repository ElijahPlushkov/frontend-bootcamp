function validateFormInput() {
    const firstName = document.getElementById("firstName");
    const lastName = document.getElementById("lastName");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");

    let isValid = true;

    if (firstName.value.trim() === "") {
        document.getElementById("firstNameError").classList.remove("d-none");
        firstName.classList.add('is-invalid');
        isValid = false;
    }

    else {
        document.getElementById("firstNameError").classList.add("d-none");
        document.getElementById("firstNameValid").classList.remove("d-none");
        firstName.classList.remove('is-invalid');
        firstName.classList.add('is-valid');
    }

    if (lastName.value.trim() === "") {
        document.getElementById("lastNameError").classList.remove("d-none");
        lastName.classList.add('is-invalid');
        isValid = false;
    }

    else {
        document.getElementById("lastNameError").classList.add("d-none");
        document.getElementById("lastNameValid").classList.remove("d-none");
        lastName.classList.remove('is-invalid');
        lastName.classList.add('is-valid');
    }

    if (email.value.trim() === "" || !(email.value.includes('@'))) {
        document.getElementById("emailError").classList.remove("d-none");
        email.classList.add('is-invalid');
        isValid = false;
    }

    else if (email.value && email.value.includes("@")) {
        document.getElementById("emailError").classList.add("d-none");
        document.getElementById("emailValid").classList.remove("d-none");
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
    }

    if (phone.value.trim() === "") {
        document.getElementById("phoneError").classList.remove("d-none");
        phone.classList.add('is-invalid');
        isValid = false;
    }

    else if (isNaN(phone.value.trim())) {
        document.getElementById("phoneError").classList.remove("d-none");
        phone.classList.add('is-invalid');
        isValid = false;
    }

    else {
        document.getElementById("phoneError").classList.add("d-none");
        document.getElementById("phoneValid").classList.remove("d-none");
        phone.classList.remove('is-invalid');
        phone.classList.add('is-valid');
    }

    return isValid;
}

const submitForm = document.getElementById("submitForm");
const enrollForm = document.getElementById("enrollForm");

submitForm.addEventListener("click", function(e) {
    e.preventDefault();

    if(validateFormInput()) {
        enrollForm.submit();
    } 
});
