<!DOCTYPE html>
<html lang="en">
<?php
            $username='';
            $password='';
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style></style>
    </head>
    <body class="bg-transparent" style="background:url('https://images.unsplash.com/photo-1548048026-5a1a941d93d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bGlicmFyaWVzfGVufDB8fDB8fA%3D%3D&w=1000&q=80'); background-repeat:no-repeat; background-size:100% 100%; background: opacity 20%;">
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3>
                                    <h6 class="text-center font-weight-light my-4">Create your account now to explore books in Woon Library!!</h6>
                                </div>
                                    <div class="card-body">
                                        <form method="post">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="username" placeholder="Username" required />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password1" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="password2" type="password" placeholder="Confirm password" required />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0 text-center">
                                                <input class="btn btn-primary btn-block" name="registerNOW" type="submit" value="Register"></input>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Login now!</a></div>
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
            if(isset($_POST['registerNOW'])){
                $username=$_POST['username'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $getuseramount=mysqli_query($con, "SELECT * FROM users");
                $userid=mysqli_num_rows($getuseramount);
                $checkuserexist=mysqli_query($con, "SELECT * FROM users WHERE Username='$username'");
                $details=mysqli_fetch_array($checkuserexist);
                if ($password1 != $password2) {
	                echo "<script>alert('The two passwords do not match!')</script>";
                }else if(mysqli_fetch_assoc($checkuserexist) != null){
                    echo "<script>alert('This username existed!')</script>";
                }else{
                        $register = mysqli_query($con, "INSERT INTO users(`Users_ID`, `Username`, `User_Password`) VALUES ('$userid','$username',SHA('$password1'))");
                        echo "<script>alert('Register Successful!')</script>";
                        echo "<script> location.href='login.php'; </script>";
                        exit();
                    }
                }
                
                
                //echo "<script>alert('login')</script>";
                //echo "<script>alert('BUTTON WORK?')</script>";
                
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
