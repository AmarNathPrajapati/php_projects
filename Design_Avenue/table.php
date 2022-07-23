<?php
  session_start();
  include("connect_db.php");
  // fetching all data from database
  $users = mysqli_query($conn, "SELECT * from user_data");
  $usersData = mysqli_fetch_all($users, MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"
        />
        <script src="sweetalert.min.js"></script>
    </head>
    <body>
        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email-Id</th>
              </tr>
            </thead>
        <?php
            for ($i = 0; $i < count($usersData); $i++){
        ?>
            <tbody>
              <tr>
                <td scope="row"><?php echo $usersData[$i]['name'];?></td>
                <td><?php echo $usersData[$i]['phone'];?></td>
                <td><?php echo $usersData[$i]['email'];?></td>
              </tr>
            </tbody>
       <?php 
        }
       ?>
          </table>
        </div>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
      ></script>
    </body>
    </html>