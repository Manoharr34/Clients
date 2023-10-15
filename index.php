<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/clients/create.php">New Client</a>
        <br>
        <table class="table">
            <tr>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created_At</th>
                    <th>Action</th>
                </thead>
            </tr>
            <tr>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "clients";
                    //Create connection
                    $connection = new mysqli($servername, $username, $password, $database);
                    if($connection->connect_error){
                        die("Connection Error".$connection->connect_error);
                    }
                    //read data from database
                    $sql = "select * from clients";
                    $result = $connection->query($sql);
                    if(!$result){
                        die("Invalid Query".$connection->error);
                    }
                    //retrieve data from database
                   while($row = $result->fetch_assoc() ){
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/clients/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/clients/delete.php?id=$row[id]'>Danger</a>
                    </td>
                    </tr>
                    ";
                   }
                    
                    
                    ?>
                </tbody>
            </tr>
        </table>
    </div>
    
</body>
</html>