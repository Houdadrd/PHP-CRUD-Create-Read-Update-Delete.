<?php
include 'connect.php';

// Vérifier si 'updateid' est défini dans l'URL
if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    $sql="Select * from user where id = $id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
     $name = $row['name'];
     $email = $row['email'];
     $mobile = $row['mobile'];
     $password = $row['password'];
 

    // Vérifier si le formulaire est soumis
    if(isset($_POST['submit'])){
        // Initialiser les données du formulaire
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Mettre à jour l'utilisateur dans la base de données
        $sql = "UPDATE user SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id = $id";

        $result = mysqli_query($con, $sql);

        if($result){
            //echo "Donnée modifiée avec succès";
             header('location:dispaly.php');
        } else {
            die(mysqli_error($con));
        }
    }
} else {
    echo "L'identifiant de mise à jour (updateid) n'est pas défini dans l'URL.";
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
            width: 50%;
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
                <input type="text" id="name" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name; ?> >
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter email" name="email" autocomplete="off"value=<?php echo $email; ?>>
              </div>  

              <div class="form-group">
                <label for="mbl">Mobile</label>
                <input type="text" id="mobile" placeholder="Enter your mobile number" name="mobile" autocomplete="off"value=<?php echo $mobile; ?>>
              </div>

              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" id="password" placeholder="Enter your password" name="password" autocomplete="off"value=<?php echo $password; ?>>
              </div>

            <button type="submit" class="btn btn-primary" name="submit" >Update</button>
          </form>
    </div>
</body>
</html>