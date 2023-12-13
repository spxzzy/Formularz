<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

$conn = new mysqli('localhost', 'root', '', 'formularz');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$province = $_POST['province'];
$gender = $_POST['gender'];
$newsletter = isset($_POST['newsletter']) ? 1 : 0;

$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = mysqli_real_escape_string($conn, $lastName);
$dob = mysqli_real_escape_string($conn, $dob);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$province = mysqli_real_escape_string($conn, $province);
$gender = mysqli_real_escape_string($conn, $gender);

$sql = "INSERT INTO users (firstName, lastName, dob, email, phone, province, gender, newsletter)
        VALUES ('$firstName', '$lastName', '$dob', '$email', '$phone', '$province', '$gender', '$newsletter')";

if ($conn->query($sql) === TRUE) {
    echo "Dane zostały zapisane poprawnie";
} else {
    echo "Błąd podczas zapisywania danych: " . $conn->error;
}

$conn->close();
?>