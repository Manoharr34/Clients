<?php
$servername="localhost";
$username="root";
$password="";
$database="clients";

//create connection
$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']=='GET'){
//Get method shows the data of client
if(!isset($_GET["id"])){
    header('location: /clients/index.php');
    exit;
}
$id = $_GET["id"];

// read the selected data from the database
$sql = "select * from clients where id =$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if(!$row){
    header("location: clients/index.php");
    exit;
}

$name = $row["name"];
$email = $row["email"];
$phone = $row["phone"];
$address = $row["address"];
}

else{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do{
        if(empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "update clients set name = '$name', email = '$email', phone = '$phone', address = '$address' where id = $id";
        

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query". $connection->error;
            break;
        }

        $successMessage = "Updated successfuly";
        header("location: /clients/index.php");
        exit;

    } while(true);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
 <div class="container my-5">
    <h2>Edit Client</h2>
    <?php
    if(!empty($errorMessage)){
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong> $errorMessage </strong>
        <button class='btn-close' type='button' data-bs-dismiss='alert' arial-label='Close'></button>
        </div>
        ";

    }
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="name" value="<?php echo $name;?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="email" value="<?php echo $email;?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="phone" value="<?php echo $phone;?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="address" value="<?php echo $address;?>">
            </div>
        </div>
        <?php
        if(!empty($successMessage)){
        echo"
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong> $successMessage </strong>
        <button class='btn-close' type='button' data-bs-dismiss='alert' arial-label='Close'>
        </div>
        ";

    }
    ?>
        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/clients/index.php">Cancel</a>
            </div>

        </div>

    </form>
 </div>
</body>
</html>