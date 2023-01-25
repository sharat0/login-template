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

    <link rel="stylesheet" href="style.css">

    <title>LogIn</title>
</head>

<body>
    <div id="main">
        <span class="logo"><img src="/img/logo2.png" alt=""></span>
        <div id="centerbox">
            <div class="forms">
                <span class="head">
                    LogIn
                </span>
                <form action="" method="post">
                    <span class="formtext">Username</span>
                    <i class="fas fa-user"></i>
                    <input type="text" name="user" id="user" placeholder="@username">

                    <span class="formtext">Password</span>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="********">

                    <button type="submit" name="submit" id="btn">Login</button>
                </form>
                <div class="login">
                    Dont have an account? <a href="signup.php" target="_blank">Signup here</a>
                </div>
            </div>
            </div>
            <?php
      if (isset($_POST['submit'])) {
        $conn=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($conn, 'gag_9');

        $uname=$_POST['user'];
        $pass=$_POST['password'];

        $query="SELECT * from login where uname='$uname' and pass='$pass'";
        $res=mysqli_query($conn, $query);

        if ($res) {
          if(mysqli_num_rows($res)>0)
          {
			      echo 'Login Success';
            $row = mysqli_fetch_assoc($res);
            $uid=$row['id'];
            
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['name']=$uname;
            $_SESSION['uid']=$uid;


            // REMOVE THIS COMMENT TO MAKE PAGE REDIRECT AFTER LOGIN

            // header("location:../basic.html");
          }
		    else
			      echo 'Login failed';
        }
		}
    ?>

        
    </div>
</body>

</html>