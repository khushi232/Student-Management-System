<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$studentid = "";
$course = "";
$phone = "";
$address = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header("location: /management/index.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM mystudent WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /management/index.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $studentid = $row["studentid"];
    $course = $row["course"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $studentid = $_POST["studentid"];
    $course = $_POST["course"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($studentid) || empty($course) || empty($phone)  || empty($address)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE mystudent " .
            "SET `name` ='$name', `email` ='$email', `studentid` ='$studentid',`course` ='$course', `phone` ='$phone', `address` ='$address' " .
            "WHERE id= $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $name = "";
        $email = "";
        $studentid = "";
        $course = "";
        $phone = "";
        $address = "";
        $successMessage = "client updated successfully";
        header("location: /management/index.php");
        exit;
    } while (false);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container my-5">
        <h2>New Student</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type=' button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div> ";
        }

        ?>
        <form method="post">
            <input text="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">

                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">

                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Student Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="studentid" value="<?php echo $studentid; ?>">

                </div>
            </div>
            <div class=" row mb-3">
                <label class="col-sm-3 col-form-label">Course</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="course" value="<?php echo $course; ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">

                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                 <div class='offset-sm-3 col-sm-6'>
                         <div class='alert alert-success alert-dismissible fade show' role='alert'>
                             <strong>$successMessage</strong>
                             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                             </div>
            </div>
            </div>
             ";
            }

            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid"><a class="btn btn-outline-primary" href="/management/index.php" role="button">Cancel</a></div>
            </div>
        </form>
    </div>
</body>

</html>