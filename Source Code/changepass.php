<!DOCTYPE html>
<html lang="en">
<?php
    include "librarydb.php";
    session_start();
    $current_user=$_SESSION['current_id'];
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Passwords</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand ps-3" href="index.php">Woon Library</a>
            <!-- Sidebar Toggle-->
            
            <!-- Navbar-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <ul id="userprofile"class="nav justify-content-end btn-lg">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="userprofile.php">User Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link shadow bg-white rounded" href="index.php">
                                <div class="sb-nav-link-icon"></div>
                                Main Page
                            </a>
                            <div class="sb-sidenav-menu-heading">Functions</div>
                            <a class="nav-link shadow bg-white rounded" href="booklist.php">
                                <div class="sb-nav-link-icon"></div>
                                Book List
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="trendingbook.php">
                                <div class="sb-nav-link-icon"></div>
                                Trending Books
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="newbook.php">
                                <div class="sb-nav-link-icon"></div>
                                New Book Arrived
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="seatreserve.php">
                                <div class="sb-nav-link-icon"></div>
                                Seat Reservation
                            </a>
                            
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Change Password</h1>
                        <div class="row">
                            <div class="col-xl-60 col-md-60">
                            <div class="card-body">
                                        <form method="post">
                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="inputOldPassword" name="OldPassword" type="password" placeholder="Old Password" />
                                                <label for="inputOldPassword">Old Password</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNewPassword" name="NewPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputNewPassword">New Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNewPasswordConfirm" name="ConfirmNewPassword" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm New Password</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mt-4 mb-0 text-center">
                                                <input class="btn btn-danger btn-lg" name="changeNOW" type="submit" value="Confirm"></input>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['changeNOW'])){
                                        $oldpass=$_POST['OldPassword'];
                                        $newpass=$_POST['NewPassword'];
                                        $confirm=$_POST['ConfirmNewPassword'];
                                        $checkuserexist=mysqli_query($con, "SELECT * FROM users WHERE Users_ID='$current_user'");
                                        $details=mysqli_fetch_array($checkuserexist);
                                        $checkoldpass=$details['User_Password'];
                                        if($_POST['OldPassword']==null){
                                            echo "<script>alert('Missing Old Password!')</script>";
                                        }else if($_POST['NewPassword']==null){
                                            echo "<script>alert('Missing New Password!')</script>";
                                        }else if($_POST['ConfirmNewPassword']==null){
                                            echo "<script>alert('Missing Confirm New Password!')</script>";
                                        }else if ($newpass != $confirm) {
                                            echo "<script>alert('The two new passwords do not match!')</script>";
                                        }else if(SHA1($oldpass)!=$checkoldpass){
                                            echo "<script>alert('Wrong Old Password!')</script>";
                                        }else{
                                                $changepass = mysqli_query($con, "UPDATE users SET User_Password =SHA('$newpass') WHERE Users_ID='$current_user'");
                                                echo "<script>alert('Change Password Successful!')</script>";
                                                echo "<script> location.href='userprofile.php'; </script>";
                                                exit();
                                            }
                                        }
                                        ?>
                                    </div>
                            </div>
                        </div>

                        </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Woon Library 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
