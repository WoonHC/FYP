<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include "librarydb.php";
    $current_user=$_SESSION['current_id'];
    $searching=$_GET['search']??null;
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book List</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed bg-transparent" style="background:url('https://www.citeonline.com/wp-content/uploads/2019/09/iStock-969066628.jpg'); background-size:100% 100%; background: opacity 20%; background-repeat:repeat-y;">
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
                        <h1 class="mt-4">Book List</h1>
                        <div class="row">
                                <div class="col-xl-60 col-md-60">
                                        <?php
                                        echo "<form class='d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0' action='' method='post'>";
                                        echo "<div class='input-group'>";
                                        echo "<input class='form-control' type='text' placeholder='Search for...' aria-label='Search for...' aria-describedby='btnNavbarSearch' name='searching' />";
                                        echo "<button class='btn btn-primary' id='btnNavbarSearch' name='searchNOW' type='submit'><i class='fas fa-search'></i></button>";
                                        echo "</div>";
                                        echo "</form>";
                                        if($searching!=null){
                                            $sqltran = mysqli_query($con, "SELECT * FROM book WHERE Book_Name LIKE '%$searching%' OR Book_Author LIKE '%$searching%' ORDER BY Book_Name")or die(mysqli_error($con));
                                        }else{
                                            $sqltran = mysqli_query($con, "SELECT * FROM book ORDER BY Book_Name")or die(mysqli_error($con));
                                        }
                                        while ($row = mysqli_fetch_array($sqltran)) {
                                        echo "<table class='table table-hover table-bordered' id='BLIST' name='BLIST'>";
                                        echo  "<thead><tr><th scope='col1'>No.</th><th scope='col2'>Book Name</th><th scope='col3'>Book Author</th><th scope='col4'>Category</th><th scope='col5'>Language</th><th scope='col6'>Condition</th></tr></thead>";
                                        $i=1;
                                        do
                                        {
                                        echo "<tr class='BookRow' role=button onclick=window.location='bookdetails.php?id=".$row["Book_ID"]."&condition=".$row["Book_Condition"]."'>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['Book_Name'] . "</td>";
                                        echo "<td>" . $row['Book_Author'] . "</td>";
                                        echo "<td>" . $row['Book_Category'] . "</td>";
                                        echo "<td>" . $row['Book_Language'] . "</td>";
                                        echo "<td>" . $row['Book_Condition'] . "</td>";
                                        echo "</tr>";
                                        $i++;
                                        }while($row = mysqli_fetch_array($sqltran));
                                        echo "</table>";
                                        }
                                        if($current_user=='999'){
                                            echo "<div class='text-center'>";
                                            echo "<a class='btn btn-warning btn-sm' style='width:20%' href='addbook.php'>Add book</a>";
                                            echo "</div>";
                                        }
                                        if(isset($_POST['searchNOW'])){
                                            $search=$_POST['searching'];
                                            echo "<script> location.href='booklist.php?search=$search'; </script>";
                                        }
                                        mysqli_close($con);  
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
