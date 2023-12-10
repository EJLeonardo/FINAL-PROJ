<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$l_name = $f_name = $m_i = $stud_id = $program = $year = $email = $phone_num = "";
$lname = $fname = $mi = $studid = $_program = $_year = $e_mail = $phonenum = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate last name
    $lname = trim($_POST["last_name"]);
    if (empty($input_name)) {
        $lname_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $lname_err = "Please enter a valid name.";
    } else {
        $l_name = $lname;
    }

    // Validate first name
    $fname = trim($_POST["first_name"]);
    if (empty($input_dateHired)) {
        $fname_err = "Please enter a date.";
    } else {
        $f_name = $fname;
    }

    // Validate middle name
    $mi = trim($_POST["middle_initial"]);
    if (empty($mi)) {
        $mi_err = "Please enter a role.";
    } else {
        $m_i = $mi;
    }

    // Validate student id
    $studid = trim($_POST["student_no"]);
    if (empty($studid)) {
        $studid_err = "Please enter an address.";
    } else {
        $stud_id = $studid;
    }

    // Validate program
    $input_program = trim($_POST["salary"]);
    if (empty($input_program)) {
        $_program_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_program)) {
        $_program_err = "Please enter a positive integer value.";
    } else {
        $program = $_program;
    }

    
    // Validate name
    $input_year = trim($_POST["year"]);
    if (empty($input_name)) {
        $year_err = "Please enter a name.";
    } elseif (!filter_var($input_year, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $year_err = "Please enter a valid name.";
    } else {
        $year = $input_year;
    }
    

    
        // Validate name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        } else {
            $name = $input_name;
        }
    

    
        // Validate name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        } else {
            $name = $input_name;
        }
    
    
        // Validate name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        } else {
            $name = $input_name;
        }
    

    // Check input errors before inserting in database
    if (empty($name_err) && empty($dateHired_err) && empty($role_err) && empty($address_err) && empty($salary_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, dateHired, role, address, salary) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_name, $param_dateHired, $param_role, $param_address, $param_salary);

            // Set parameters
            $param_lname = $lname;
            $param_fname = $fname;
            $param_role = $role;
            $param_address = $address;
            $param_salary = $salary;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();}