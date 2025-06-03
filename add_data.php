<?php
if (isset($_POST['submit'])) {
    require_once "connection.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $profileName = $_FILES['profile']['name'];
    $profileTmp = $_FILES['profile']['tmp_name'];
    $uploadPath = "uploads/" . $profileName;
    move_uploaded_file($profileTmp, $uploadPath);

    $qry = "INSERT INTO employee(name, email, mobile, dob, profile) 
            VALUES('$name', '$email', '$mobile', '$dob', '$profileName')";
    $res = $conn->query($qry);
    if ($res) {
        header("Location: Register_form.php?msg=success");
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
