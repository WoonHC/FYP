<!DOCTYPE html>
<html lang="en">
<?php
    include "librarydb.php";
    session_start();
    $current_user=$_SESSION['current_id'];
    $getusername = mysqli_query($con, "SELECT * FROM users WHERE Users_ID = '$current_user'")or die(mysqli_error($con));
    $userdetail=mysqli_fetch_array($getusername);
    $getName = $userdetail['Username'];
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Profile</title>
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
                        <h1 class="mt-4">User Profile</h1>
                        <h2 class="mt-4 text-center">Hi,<?php echo $getName ?></h2>
                        <div class="row">
                            <div class="col-xl-60 col-md-60">
                                <?php
                                $sqltran = mysqli_query($con, "SELECT * FROM seat WHERE Seater = $current_user")or die(mysqli_error($con));
                                $row = mysqli_fetch_array($sqltran);
                                echo "<table class='table table-hover table-bordered text-center'>";
                                echo "<th colspan='2' scope='col' class='bg-secondary text-white' style=''>Reserved Seat</th>";
                                do{
                                if($row==null){
                                    echo "<tr><td class='text-center'>You Haven't Reserve Any Seat Yet.</td></tr>";
                                }else{
                                    echo "<tr><td>" . $row['Seat_Num'] . "</td>";
                                    echo "<form action='' method='post'>";
                                    echo "<td style='width:10%'><input class='btn btn-success btn-sm' name='cancelNOW' type='submit' value='Cancel'/></td>";
                                    echo "</form>";
                                    echo "</tr>";
                                }
                            }while($row = mysqli_fetch_array($sqltran));
                                echo "</table>"; 

                                if(isset($_POST['cancelNOW'])){
                                    $sqltran4 = mysqli_query($con, "SELECT * FROM seat WHERE Seater = $current_user")or die(mysqli_error($con));
                                    $row3 = mysqli_fetch_array($sqltran4);
                                    $cancel = mysqli_query($con, "UPDATE seat SET Seater = NULL ,Seat_Condition='Available' WHERE Seat_ID = ". $row3['Seat_ID'] ."");
                                    echo "<script>alert('Cancel Successful!')</script>";
                                    echo "<script> location.href='userprofile.php'; </script>";
                                }
                            ?>
                            </div>
                        </div>
                        <div class="col-xl-60 col-md-60">
                        <?php
                                $sqltran2 = mysqli_query($con, "SELECT * FROM book WHERE Borrower = $current_user")or die(mysqli_error($con));
                                $row = mysqli_fetch_array($sqltran2);
                                    if($row==null){
                                        echo "<table class='table table-hover table-bordered'>";
                                        echo "<th colspan='5' class='bg-secondary text-white text-center'>Book History</th>";
                                        echo "<tr><th>No.</th><th>Book Name</th><th>Book Author</th><th>Category</th><th>Language</th></tr>";
                                        echo "<td colspan='5' class='text-center'>You Haven't Borrow Any Book Yet.</td>";
                                        echo "</table>";
                                    }else{
                                            echo "<table class='table table-hover table-bordered'>";
                                            echo "<th colspan='7' class='bg-secondary text-white text-center' style=''>Book Borrowed</th>";
                                            echo "<tr><th>No.</th><th>Book Name</th><th>Book Author</th><th>Category</th><th>Language</th><th></th><th></th></tr>";
                                            do
                                            {
                                                echo "<tr class='BookRow'>";
                                                echo "<td>" . $row['Book_ID'] . "</td>";
                                                echo "<td>" . $row['Book_Name'] . "</td>";
                                                echo "<td>" . $row['Book_Author'] . "</td>";
                                                echo "<td>" . $row['Book_Category'] . "</td>";
                                                echo "<td>" . $row['Book_Language'] . "</td>";
                                                echo "<td style='width:12%' ><input class='btn btn-success btn-sm' style='width:100%' role='button' onclick=window.location='bookdetails.php?id=".$row["Book_ID"]."&condition=".$row["Book_Condition"]."' value='View Details'/></td>";
                                                echo "<form action='' method='post'>";
                                                echo "<td style='width:8%'><input class='btn btn-success btn-sm' style='width:100%' name='returnNOW' type='submit' value='Return'/></td>";
                                                echo "</form>";
                                                echo "</tr>";
                                            }while($row = mysqli_fetch_array($sqltran2));
                                            echo "</table>";
                                        }

                                        if(isset($_POST['returnNOW'])){
                                            $sqltran3 = mysqli_query($con, "SELECT * FROM book WHERE Borrower = $current_user")or die(mysqli_error($con));
                                            $row2 = mysqli_fetch_array($sqltran3);
                                            $return = mysqli_query($con, "UPDATE book SET Borrower = NULL ,Book_Condition='Available' WHERE Book_ID = ". $row2['Book_ID'] ."");
                                            echo "<script>alert('Return Successful!')</script>";
                                            echo "<script> location.href='userprofile.php'; </script>";
                                        }
                                            
                                         ?>
                        </div>
                        <div class='col text-center'> 
                            <input class="btn btn-success btn-sm" style="width:25%" role="button" onclick=window.location='changepass.php' value="Change Password"/>
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
