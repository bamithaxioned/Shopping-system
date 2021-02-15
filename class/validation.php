<?php
#CLASS FOR VALIDATING SIGN UP FORM
class Validation
{

    #REGULAR EXPRESSIONS.
    public $nameRegex = "/^[a-zA-z\s]*$/";
    public $emailRegex = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    public $contactRegex = "/^[0-9]+$/";
    public $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})/";

    public function assignValue($name, $email, $password, $cnfPassword, $contact)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->cnfPassword = $cnfPassword;
        $this->contact = $contact;
    }

    #FUNCTION FOR VALIDATING NAME STARTS HERE.
    public function validateName()
    {

        if (empty($this->name)) {
            $this->nameErr = "Name cannot be empty.";
        } elseif (strlen($this->name) < 2 || strlen($this->name) > 30) {
            $this->nameErr = "First Name should be between 2 - 30 characters";
        } elseif (!preg_match($this->nameRegex, $this->name)) {
            $this->nameErr = "First Name should not contain any special character, whitespace or numbers.";
        } else {
            $this->nameErr = "";
        }
    }

    #FUNCTION FOR VALIDATING EMAIL STARTS HERE.
    public function validateEmail()
    {

        if (empty($this->email)) {
            $this->emailErr = "Email cannot be empty.";
        } elseif (!preg_match($this->emailRegex, $this->email)) {
            $this->emailErr = "Please enter a valid email. Eg. email@email.com.";
        } else {
            $this->emailErr = "";
        }
    }

    #FUNCTION FOR VALIDATING PASSWORD STARTS HERE.
    public function validatePassword()
    {
        if (empty($this->password)) {
            $this->passwordErr = "Password cannot be empty.";
        } elseif (!preg_match($this->passwordRegex, $this->password)) {
            $this->passwordErr = "Your password must be 8 - 20 characters long, must contain at least one number, one special character(!@#$%^&*), one uppercase and lowercase letters";
        } else {
            $this->passwordErr = "";
        }
    }

    #FUNCTION FOR VALIDATING CONFIRM PASSWORD STARTS HERE.
    public function validateConfirmPassword()
    {
        if ($this->password == '') {
            $this->cnfPasswordErr = "Please fill password section first.";
        } elseif (empty($this->cnfPassword)) {
            $this->cnfPasswordErr = "Confirm password cannot be empty.";
        } elseif ($this->cnfPassword !== $this->password) {
            $this->cnfPasswordErr = "Password does not match.";
        } else {
            $this->cnfPasswordErr = "";
        }
    }

    #FUNCTION FOR VALIDATING CONTACT STARTS HERE.
    public function validateContact()
    {
        if (empty($this->contact)) {
            $this->contactErr = "Phone Number cannot be empty.";
        } elseif (!preg_match($this->contactRegex, $this->contact)) {
            $this->contactErr = "Phone Number cannot contain special character, whitespace or aplhabets.";
        } elseif (strlen($this->contact) < 10 || strlen($this->contact) > 10) {
            $this->contactErr = "Phone Number should be of 10 digits.";
        } else {
            $this->contactErr = "";
        }
    }
}
