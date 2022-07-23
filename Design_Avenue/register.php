<?php
    session_start();
    include("connect_db.php");
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];

    //if user already exists
    $sql2 = "SELECT * FROM user_data where email = '$email' and phone = '$phone'";
    $result2 = mysqli_query($conn, $sql2);
    $num = mysqli_num_rows($result2);
    if($num>0){
        echo '
        <script src="sweetalert.min.js"></script>
        <body>
            <script>
                swal("User Already Exist with given Email-Id and Phone Number!","Try again", "error"); 
            </script>
        </body>';
    include "index.html";
    }else{
        // successful registration
        $stmt = $conn->prepare("INSERT INTO `user_data` (`name`, `email`, `phone`) VALUES (?,?,?)");
        $stmt->bind_param('ssi',$name, $email, $phone);
        $result =$stmt->execute();
        echo $result;
        if($result){
            echo ' <script src="sweetalert.min.js"></script>
                    <body>
                        <script>
                            swal("your record has been submitted Succesfully!", "Table has been updated", "success"); 
                        </script>
                    </body>';
            include("index.html");
        }
    }
?>