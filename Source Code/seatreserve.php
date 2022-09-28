<!DOCTYPE html>
<html lang="en">
<?php
    include "librarydb.php";
    session_start();
    $current_user=$_SESSION['current_id'];
    $getreservation = mysqli_query($con, "SELECT * FROM seat WHERE Seater = '$current_user'")or die(mysqli_error($con));
    $reserved = mysqli_num_rows($getreservation);
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Seat Reservation</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed"style="background:url('https://www.citeonline.com/wp-content/uploads/2019/09/iStock-969066628.jpg'); background-size:100% 100%;">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand ps-3" href="index.php">Woon Library</a>
            <!-- Sidebar Toggle-->
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
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
                        <h1 class="mt-4">Seat Reservation</h1>
                        <div class="row">
                            <div class="col-xl-60 col-md-60">
                            <?php
                                $sqltran = mysqli_query($con, "SELECT * FROM seat")or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($sqltran)) {
                                echo "<table class='table table-hover table-bordered text-center' id='SLIST' name='SLIST'>";
                                echo  "<thead class='bg-secondary text-white'><tr><th scope='col1'>No.</th><th scope='col2'>Seat Number</th><th scope='col3'>Seat Condition</th><th scope='col4'></th></tr></thead>";
                                do
                                {
                                echo "<tr class='SeatRow'>";
                                echo "<td>". $row['Seat_ID'] ."</td>";
                                echo "<td>" . $row['Seat_Num'] . "</td>";
                                echo "<td>" . $row['Seat_Condition'] . "</td>";
                                if( $row['Seat_Condition']=='Not Available'||$row['Seat_Condition']=='Sanitizing'||$row['Seat_Condition']=='Reserved'){
                                echo "<td><input class='btn btn-success' name='reserveNOW' type='submit' value='Reserve' disabled/></td>";
                                }else{
                                    echo "<form action='' method='post'>";
                                    echo "<input type='hidden' value=".$row['Seat_ID']." name='seatID' >";
                                    echo "<td><input class='btn btn-success' name='reserveNOW' type='submit' value='Reserve'/></td>";
                                    echo "</form>";
                                }
                                echo "</tr>";
                                }while($row = mysqli_fetch_array($sqltran));
                                echo "</table>";
                                } 
                                if(isset($_POST['reserveNOW']))
                                    {
                                        if($reserved<1){
                                        $current=$_POST['seatID'];
                                        $reserve = mysqli_query($con, "UPDATE seat SET Seater = '$current_user', Seat_Condition='Reserved' WHERE Seat_ID ='$current'");
                                        echo "<script>alert('Reserved Successful!')</script>";
                                        echo "<script> location.href='seatreserve.php'; </script>";
                                        }else{
                                            echo "<script>alert('You Have Reserved Another Seat! Please Cancel Your Current Reservation To Reserve Another Seat!')</script>";
                                            echo "<script> location.href='userprofile.php'; </script>";
                                        }
                                    }
                                
                            ?>
                                    
                                        

                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
