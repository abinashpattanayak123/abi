<?php
require_once "connection.php";
if (!isset($_GET['id'])) {
    header('Location: display_data.php');
    exit;
}
$email = $_GET['id'];

if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $mobile = $_POST['mobile'];
    $dob    = $_POST['dob'];

    if (!empty($_FILES['profile']['name'])) {
        $filename = $_FILES['profile']['name'];
        $tempname = $_FILES['profile']['tmp_name'];
        $folder   = "uploads/" . $filename;
        move_uploaded_file($tempname, $folder);
        $updateQuery = "UPDATE employee SET name='$name', mobile='$mobile', dob='$dob', profile='$filename' WHERE email='$email'";

    } else {
        $updateQuery = "UPDATE employee SET name='$name', mobile='$mobile', dob='$dob' WHERE email='$email'";
    }

    if ($conn->query($updateQuery)) {
        header("Location: display_data.php?status=updated");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$qry = "SELECT name, mobile, dob, profile FROM employee WHERE email='$email'";
$res = $conn->query($qry);

if ($res->num_rows == 0) {
    echo "No record found.";
    exit;
}

$emp = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $emp['name']; ?>" required><br><br>

        <label>Mobile:</label><br>
        <input type="text" name="mobile" value="<?php echo $emp['mobile']; ?>" required pattern="[0-9]{10}"><br><br>

        <label>Date of Birth:</label><br>
        <input type="date" name="dob" value="<?php echo $emp['dob']; ?>" required><br><br>

        <label>Profile Picture:</label><br>
        <input type="file" name="profile"><br>
        <?php if (!empty($emp['profile'])): ?>
            <img src="uploads/<?php echo $emp['profile']; ?>" alt="Current Profile" width="80" height="80"><br>
        <?php endif; ?>
        <br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
