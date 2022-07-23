<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>SignUp</title>
  <style>
    .form-group {
      padding-right: 250px;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php
    include("_nav.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      include "_connect_database.php";
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      if ($username != NULL && $password != NULL && $cpassword != NULL) {
        $sql = "SELECT * from `user_data` where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
          echo "username already exist";
        } else {
          if (($password == $cpassword)) {
            $hashpass =password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user_data` (`username`, `password`) VALUES ('$username', '$hashpass')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              echo "Your account is connected successfully.Now you can login";
            }
          } else {
            echo "password is not match";
          }
        }
      }else{
        echo "Your data is incomplete";
      }
    }

    ?>
  </div>
  <h1 style="text-align:center">Signup to our websites</h1>
  <form action="/login_sys/signup.php" method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the username" name="username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword2">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm the Password" name="cpassword">
    </div>
    <button type="submit" class="btn btn-primary">Signup</button>
  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>