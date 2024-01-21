<?php
include 'connect.php';
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary,
        .btn-danger {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            color: #0056b3;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .text-light {
            color: #fff;
        }
        .table td,
        .table th {
            text-decoration: none;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            margin-top: 20px;
        }

        tbody tr:nth-child(even) {
            background-color: rgb(121, 137, 169);
        }

        tbody tr:nth-child(odd) {
            background-color: rgb(163, 187, 227);
        }

        tbody tr:hover {
            background-color: #e0e0e0;
        }

        /* Nouvelle règle pour désactiver la soulignement des liens dans le tableau */
        td a, th a {
            text-decoration: none;
            color: inherit;
        }
    </style>

    <div class="container">
        <button class="btn btn-primary">
            <a href="user.php" class="text-light">Add user
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $mobile = $row['mobile'];
                            $password = $row['password'];

                            echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $password . '</td>
                                <td>
                                <button class="btn-primary">
                                    <a href="update.php?updateid='.$id.'" class="text-light">Update</a>
                                </button>
                                <button class="btn-danger">
                                    <a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a>
                                </button>
                            </td>
                            
                            </tr>';
                        }
                    }
                ?>
                  

            </tbody>
        </table>
    </div>
</body>
</html>