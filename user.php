<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO user (name, email, mobile, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $mobile, $password);

    if($stmt->execute()){
        // Data inserted successfully
        header('location:dispaly.php');
    } else {
        die($stmt->error);
    }
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
</head>
<body>
<style>
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        label {
            display: block;
            margin-bottom: 5px;
        }
    
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    
        button {
            padding: 10px 20px;
            background-color: #2859c2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        button:hover {
            background-color: #412b94;
        }
    </style>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name" name="name" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter email" name="email" autocomplete="off">
              </div>  

              <div class="form-group">
                <label for="mbl">Mobile</label>
                <input type="text" id="mobile" placeholder="Enter your mobile number" name="mobile" autocomplete="off">
              </div>

              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" id="password" placeholder="Enter your password" name="password" autocomplete="off">
              </div>

            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
          </form>
    </div>
</body>
</html>