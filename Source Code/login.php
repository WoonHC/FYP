<!DOCTYPE html>
<html lang="en">
<?php
            $username='';
            $password='';
            session_start();
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script>
                if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                }
        </script>
        <style></style>
    </head>
    <body class="bg-transparent" style="background:url('https://images.unsplash.com/photo-1548048026-5a1a941d93d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bGlicmFyaWVzfGVufDB8fDB8fA%3D%3D&w=1000&q=80'); background-repeat:no-repeat; background-size:100% 100%; background: opacity 20%;">
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <br>
                    <br>
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3>
                                    <h6 class="text-center font-weight-light my-4">Log in now to explore books in Woon Library!!</h6>
                                </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="username" placeholder="Username" required />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" placeholder="Password" input type="password" required />
                                                <label for="inputPassword">Password</label>          
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input class="btn btn-success" name="loginNOW" type="submit" value="Log in"></input>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Woon Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <?php
            include "librarydb.php";
            if(isset($_POST['loginNOW'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                if(isset($_POST['username'])&&(isset($_POST['password']))){
                    $getlogin = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND User_Password=SHA('$password')");
                    if(mysqli_fetch_assoc($getlogin) != null){
                        $fetchid = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND User_Password=SHA('$password')");
                        $getuserid=mysqli_fetch_array($fetchid);
                        $userid=$getuserid['Users_ID'];
                        $_SESSION['current_id']=$userid;
                        echo "<script>alert('Log In Successful!')</script>";
                        echo "<script> location.href='index.php'; </script>";
                    }else{
                        echo "<script>alert('Wrong Username Or Password!')</script>";
                        echo "<script> location.href='login.php'; </script>";
                    }
                }
                
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
