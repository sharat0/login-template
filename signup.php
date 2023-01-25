<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- FONT CSS-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">

    <!-- FONT CSS ENDS HERE -->

    <link rel="stylesheet" href="signup.css">

    <title>Signup</title>
</head>

<body>
    <div id="main">
        <span class="logo"><img src="/img/logo2.png" alt=""></span>
        <div id="centerbox">
            <div class="forms">
                <span class="head">
                    Sign Up
                </span>
                <form action="" method="post">
                    <span class="formtext">Username</span>
                    <i class="fas fa-user"></i>
                    <input type="text" name="user" id="user" placeholder="@username">

                    <span class="formtext">Password</span>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="********">

                    <span class="formtext">Confirm Password</span>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="cpassword" id="cpassword" placeholder="********">
                    <button type="submit" name="submit" id="btn">Create Account</button>
                </form>
                <div class="login">
                    Already have an account? <a href="index.php">Login here</a>
                </div>
            </div>
        </div>
        <?php
      if (isset($_POST['submit'])) {
        $conn=mysqli_connect("localhost", "root", "");
        $db=mysqli_select_db($conn, 'gag_9');

        $uname=$_POST['user'];
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];


        $query="SELECT * from login where uname='$uname'";
        $res=mysqli_query($conn, $query);

        if ($res) {
          if(mysqli_num_rows($res)>0)
          {
            echo '<script>alert("Username already exists")';
            
            }
            elseif($pass <> $cpass){
                echo '<script>alert("Password and Confirm Password does not match!")';

            }
            else{
                $sql="INSERT INTO login (uname, pass) values ('$uname', '$pass')";
                $res=mysqli_query($conn, $sql);

                if ($res) {
                    header("location:index.php");
                }
                else {
                    echo '<script>alert("Unable to create account!")';
                }
            }

        }
		}
    ?>
    </div>
</body>

</html>