<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
   <?php
    include('./components/header_file.php')
   ?>
</head>
<body>
   <?php
    include('./components/navbar.php');
    ?>
    <?php
    include('./backend/config.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){//imp
        if($_POST['name'] !=null && $_POST['pass'] !=null && $_POST['cpass'] !=null ){
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            if($pass == $cpass){
                $hashpass = password_hash($pass,PASSWORD_DEFAULT);//imp
                $sql = "INSERT INTO `user_data` (`name`, `password`) VALUES ('$name', '$hashpass');";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    die("data was not inserted successfully due to ".mysqli_errno($conn));
                }
            }else{
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Password does not match!</strong> Please enter the correct passoward.
            </div>
                ';
            }
        }
    }
?>
    <h1 class="text-center">SignUp form</h1>
    <div class="container">
        <form action="./" class="d-flex flex-column" method="post">
            <input class="p-2 m-2" type="text" name="name" id="" placeholder="Write your Name">
            <input class="p-2 m-2" type="password" name="pass" id="" placeholder="Write your Password">
            <input class="p-2 m-2" type="password" name="cpass" id="" placeholder="Confirm your password">
            <button type="submit" class="btn btn-outline-primary d-grid">Submit</button>
        </form>
    </div>
</body>
</html>