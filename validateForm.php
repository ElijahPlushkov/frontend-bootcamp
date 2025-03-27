<?php

function validateFirstName($firstName) {
    if (empty($firstName)) {
        return "Please enter your first name.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $firstName)) {
        return "First name should only contain letters and spaces.";
    }
    return null;
}

function validateLastName($lastName) {
    if (empty($lastName)) {
        return "Please enter your last name.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $lastName)) {
        return "Last name should only contain letters and spaces.";
    }
    return null;
}

function validateEmail($email) {
    if (empty($email)) {
        return "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }
    return null;
}

function validatePhone($phone) {
    if (empty($phone)) {
        return "Please enter your phone number.";
    } elseif (!preg_match("/^[0-9\+\-\(\) ]+$/", $phone)) {
        return "Phone number should only contain numbers, +, -, (, ) and spaces.";
    }
    return null;
}

function validateForm($data) {
    $errors = [];
    $errors['firstName'] = validateFirstName($data['firstName']);
    $errors['lastName'] = validateLastName($data['lastName']);
    $errors['email'] = validateEmail($data['email']);
    $errors['phone'] = validatePhone($data['phone']);
    return $errors;
}