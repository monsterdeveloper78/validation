

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
          crossorigin="anonymous"
    >
    <!-- Optional theme -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
          integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ"
          crossorigin="anonymous"
    >
    <title>validation page</title>
</head>
<body>
<?php
$nameERR = $emailERR = $mobileERR = $genderERR = $agreeERR = "";
$name = $email = $mobile = $gender = $agree = "";
function input_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameERR = "name is required";
    } else {
        $name = input_data($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameERR = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailERR = "email is required";
    } else {
        $email = input_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailERR = "Invalid email format";
        }
    }
    if (empty($_POST["mobile"])) {
        $mobileERR = "mobile is required";
    } else {
        $mobile = input_data($_POST["email"]);
        if (preg_match("/^[0-9]*$/", $mobile)) {
            $mobileERR = "Invalid mobile number ";
        }
        if (strlen($mobile) <= 10) {
            $mobileERR = "phone number must be 10 digits";
        }
    }
    if (empty($_POST["gender"])) {
        $genderERR = "gender is required";
    } else {
        $gender = input_data($_POST["gender"]);

    }
    if (empty($_POST["agree"])) {
        $agreeERR = "agree is required";
    } else {
        $agree = input_data($_POST["agree"]);

    }

}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>registration form</h2>
            <form action="index.php" method="post">
                <label for="name">NAME : </label>
                <input type="text" name="name">
                <span class="error text-danger">* <?php echo $nameERR ?></span>
                <br>
                <label for="email">EMAIL : </label>
                <input type="text" name="email">
                <span class="error text-danger">* <?php echo $emailERR ?></span>
                <br>

                <label for="mobile"> MOBILE : </label>
                <input type="text" name="mobile">
                <span class="error text-danger">* <?php echo $mobileERR ?></span>
                <br>

                <label for="">GENDER :</label>
                <input type="radio" name="gender" value="male"> male
                <input type="radio" name="gender" value="female"> female
                <span class="error text-danger">* <?php echo $genderERR ?></span>
                <br>

                <label for="">Agree to terms of services :</label>
                <input type="checkbox" name="agree">
                <span class="error text-danger">* <?php echo $agreeERR ?></span>
                <br>

                <input type="submit" class="btn btn-success " name="submit">

            </form>
            <?php
            if(isset($_POST['submit'])){
                if ($nameERR == '' && $emailERR == '' && $mobileERR == '' && $genderERR == '' && $agreeERR == '' ) {

                    echo "<h2 class='text-success' >Registration Successful</h2>";
                }
                else {

                    echo "<h2 class='text-danger' >Registration Failed</h2>";
                }

            }
            ?>
        </div>
    </div>
</div>


<!-- Latest compiled and minified JavaScript -->
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"
></script>
</body>
</html>
