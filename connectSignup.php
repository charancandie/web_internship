<?php 
    error_reporting(0);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $checkbox = $_POST['checkbox'];

    //database connection
    $conn = new mysqli('localhost','root','','form');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(firstName, lastName, dob, gender,
        email, contact, password, confirm_password, checkbox) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssississs",$firstName,$lastName,$dob,$gender,$email,$contact,$password,$confirm_password,$checkbox);
        $stmt->execute();
        echo "Registered Successfully..";
        $stmt->close();
        $conn->close();
    }
?>