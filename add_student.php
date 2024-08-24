<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $class = $_POST['class'] ?? null;
    $phone_number = $_POST['phone'] ?? null;
    $email = $_POST['email'] ?? null;

    // Debugging: Check if form data is correctly retrieved
    echo "ID: " . $id . "<br>";
    echo "Name: " . $name . "<br>";
    echo "Class: " . $class . "<br>";
    echo "Phone Number: " . $phone_number . "<br>";
    echo "Email: " . $email . "<br>";

    // Only proceed if all fields are filled
    if ($id && $name && $class && $phone_number && $email) {
        $stmt = $conn->prepare("INSERT INTO crud_student_details (id, name, class, phone_number, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id, $name, $class, $phone_number, $email);

        if ($stmt->execute()) {
            // Redirect to the same page to avoid form resubmission
            header("Location: " . "index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

mysqli_close($conn);





















// include("connection.php");


// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $class = $_POST['class'];
//     $phone_number = $_POST['phone_number'];
//     $email = $_POST['email'];

//     $stmt = $conn->prepare("INSERT INTO crud_student_details (id, name, class, phone_number, email) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $id, $name, $class, $phone_number, $email);

//     if ($stmt->execute()){
//         header("Location: " . $_SERVER['PHP_SELF']);
//         exit();
//     }
//     else{
//         echo 'error' . $stmt->error;
// }
// $stmt->close();
// }

// mysqli_close($conn);
