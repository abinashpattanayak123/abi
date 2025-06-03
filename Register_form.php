<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      cursor: pointer;
      border: none;
      margin-top: 5px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .secondary-btn {
      background-color: #2196F3;
      color: white;
      font-size: 16px;
      border: none;
      padding: 12px;
      border-radius: 6px;
      width: 100%;
      cursor: pointer;
    }

    .secondary-btn:hover {
      background-color: #1e88e5;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form action="add_data.php" method="POST" enctype="multipart/form-data">
      <label for="name">Name *</label>
      <input type="text" id="name" name="name" required />

      <label for="email">Email *</label>
      <input type="email" id="email" name="email" required />

      <label for="mobile">Mobile Number *</label>
      <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required placeholder="10 digit number" />

      <label for="dob">Date of Birth *</label>
      <input type="date" id="dob" name="dob" required />

      <label for="profile">Upload Profile Picture *</label>
      <input type="file" name="profile" id="profile" accept="image/*" required />

      <input type="submit" name="submit" value="Register" />
    </form>

    <form action="display_data.php" method="get">
       <button type="submit"  name="display" class="secondary-btn">See All Registered Names</button>
    </form>


    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
      <div class="success"> <br>One record inserted successfully without any error.</div>
    <?php endif; ?>
    
  </div>
</body>
</html>
