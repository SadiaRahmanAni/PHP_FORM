<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "summer2023";
$conn = mysqli_connect($servername, $username, $password, $dbname);



if (!$conn) {
  die("ERROR:Colud not connect " . mysqli_connect_error());
} else {
  echo "connected succesfully.";
  echo "<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ipAddress = $_POST['ip_address'];
    $webUrl = $_POST['web_url'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $briefInfo = $_POST['brief_info'];

    $errors = [];
 
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match('/^[a-zA-Z]+(?: [a-zA-Z]+){0,2}$/', $name)) {
        $errors[] = "Name should have a first name and last name. Middle name is optional.";
    }
 
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
 
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}$/', $password)) {
        $errors[] = "Password must contain an uppercase, a lowercase, a number, and no special characters.";
    }

   
    if (empty($ipAddress)) {
        $errors[] = "IP Address is required.";
    } elseif (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
        $errors[] = "Invalid IP address.";
    }

     
    if (empty($webUrl)) {
        $errors[] = "Personal Web URL is required.";
    } elseif (!filter_var($webUrl, FILTER_VALIDATE_URL)) {
        $errors[] = "Invalid web URL.";
    }
 
    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    } elseif (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $dob)) {
        $errors[] = "Invalid date of birth format. Use DD-MM-YYYY format.";
    }

 
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

   
    if (empty($mobile)) {
        $errors[] = "Mobile Number is required.";
    } elseif (!preg_match('/^(?:\+?88)?01[13-9]\d{8}$/', $mobile)) {
        $errors[] = "Invalid mobile number. Must be a valid Bangladeshi number.";
    }
 
    if (empty($briefInfo)) {
        $errors[] = "Brief Info is required.";
    } elseif (str_word_count($briefInfo) > 50 || !preg_match('/^[a-zA-Z0-9\s]+$/', $briefInfo)) {
        $errors[] = "Brief info should not contain more than 50 words and must contain only alphanumeric characters.";
    }
 
    if (!empty($errors)) {
        echo "<div class='error'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    } else {
         
        echo "Form submitted successfully!";
    }
 $sql = "INSERT INTO user (name, email, password, ip, url, dob, gender, mobile, info)
            VALUES ('$name', '$email', '$password', '$ipAddress', '$webUrl', '$dob', '$gender', '$mobile', '$briefInfo')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


$conn->close();