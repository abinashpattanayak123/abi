<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
<?php
    require_once "connection.php";
    $qry = "SELECT name, email, mobile, dob, profile FROM employee"; 
    $res = $conn->query($qry);
?>
<table border="1" cellpadding="8">
<tr>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>MOBILE</th>
    <th>DOB</th>
    <th>PROFILE</th>
    <th>ACTION</th>
</tr>
<?php
while($emp = $res->fetch_assoc()){
?>
<tr>
    <td><?php echo $emp['name'] ?></td>
    <td><?php echo $emp['email'] ?></td>
    <td><?php echo $emp['mobile'] ?></td>
    <td><?php echo $emp['dob'] ?></td>
    <td>
        <img src="uploads/<?php echo $emp['profile']; ?>" alt="Profile" width="70" height="70" >
    </td>
    <td>
        <a href="edit_data.php?id=<?php echo $emp['email']; ?>">Edit</a> |
        <a href="delete_data.php?id=<?php echo $emp['email']; ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
<?php $conn->close(); ?>
</body>
</html>
