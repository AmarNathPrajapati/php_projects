<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
   <?php
        include('./components/header_file.php');
   ?>
</head>
<body>
    <!-- Navbar -->
   <?php
        include('./components/navbar.php');
   ?>
    <!-- login system backend -->
    <?php
   include('./backend/config.php');
   if($_SERVER['REQUEST_METHOD']=='POST'){
       if($_POST['name'] != null && $_POST['pass'] !=null){
           $name  = $_POST['name'];
           $pass = $_POST['pass'];
           $sql = "SELECT * FROM `user_data` where name = '$name';";
           $result = mysqli_query($conn, $sql);
           $nums = mysqli_num_rows($result);
           if($nums){
            while( $rows = mysqli_fetch_assoc($result)){
               if(password_verify($pass, $rows['password'])){
                    header("location:welcome.php");
               }
            }
            }
        }
    }
   ?>
   <!-- login section frontend -->
   <div class="container">
       <h1 class="my-5 text-center">login</h1>
       <form action="./login.php" class="d-flex flex-column" method="post">
            <input class="my-2 py-2" type="text" name="name" placeholder="Enter The Name">
            <input class="my-2 py-2" type="password" name="pass" placeholder="Enter the password">
            <button type="submit" class="btn btn-outline-primary d-grid">LOGIN</button>
       </form>
   </div>
</body>
</html>