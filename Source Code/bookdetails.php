<!DOCTYPE html>
<html lang="en">
<?php
    include "librarydb.php";
    session_start();
    $current_user=$_SESSION['current_id'];
    $bookid=$_GET['id'];
    $condition=$_GET['condition'];
    $getbookdetails = mysqli_query($con, "SELECT * FROM book WHERE Book_ID = '$bookid'")or die(mysqli_error($con));
    $details=mysqli_fetch_array($getbookdetails);
    $getBookID=$details['Book_ID'];
    $getBookName = $details['Book_Name'];
    $getBookAuthor = $details['Book_Author'];
    $getBookCategory = $details['Book_Category'];
    $getBookLanguage = $details['Book_Language'];
    $getBookCondition = $details['Book_Condition'];
    $getBookDescription = $details['Book_Description'];
    $getBookBorrowed = $details['Times_Borrowed'];
    $getborrowed = mysqli_query($con, "SELECT * FROM book WHERE Borrower = '$current_user'")or die(mysqli_error($con));
    $borrowedbook = mysqli_num_rows($getborrowed);
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Book Details</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed bg-image">
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
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Main Page
                            </a>
                            <div class="sb-sidenav-menu-heading">Functions</div>
                            <a class="nav-link shadow bg-white rounded" href="booklist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Book List
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="trendingbook.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trending Books
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="newbook.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                New Book Arrived
                            </a>
                            <a class="nav-link shadow bg-white rounded" href="seatreserve.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Seat Reservation
                            </a>
                            
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-white">Book Details</h1>
                        <br>
                        <div class="row">
                            <div class="text-white text-justify">
                                <h7>Book ID: </h7><?php echo "$getBookID"; ?>
                                <br>
                                <br>
                                <h7>Book Name: </h7><?php echo "$getBookName"; ?>
                                <br>
                                <br>
                                <h7>Book Author: </h7><?php echo $getBookAuthor ?>
                                <br>
                                <br>
                                <h7>Book Category: </h7><?php echo $getBookCategory ?>
                                <br>
                                <br>
                                <h7>Language: </h7><?php echo $getBookLanguage ?>
                                <br>
                                <br>
                                <h7>Book Condition: </h7><?php echo $getBookCondition ?>
                                <br><br>
                                <h7>Book Description: </h7><?php echo $getBookDescription ?>
                                <br><br><br>
                                </div>
                                
                                <form action="" method="post">
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <div class="col text-center">
                                    <input class="btn btn-success" type="submit" name="borrowNOW" value="Borrow This Book" <?php if ($condition == 'Sanitizing'||$condition=='Unavailable'){ ?> disabled <?php   } ?>/>
                                </div>
                                </div>
                                <?php
                                    if($current_user=='999'){
                                        echo "<br>";
                                        echo "<div class='text-center'>";
                                        echo "<a class='btn btn-warning' style='width:15%' href='modifybook.php?id=$bookid'>Modify This Book</a>";
                                        echo "\t\t";
                                        echo "<form action='' method='post'>";
                                        echo "<input class='btn btn-warning' style='width:15%' name='deleteNOW' type='submit' value='Delete This Book' />";
                                        echo "</form>";
                                        echo "</div>";
                                        if(isset($_POST['deleteNOW'])){
                                            $delete=mysqli_query($con, "DELETE FROM book WHERE Book_ID='$bookid'");
                                            echo "<script>alert('Delete Successful!')</script>";
                                            echo "<script> location.href='booklist.php'; </script>";
                                        }
                                    }

                                    
                                    ?>
                                </form>
                                </div>
                                </div>
                        </div>
                        </div>
                    </div>
                </main>
                <?php
                    include "librarydb.php";
                    if(isset($_POST['borrowNOW'])){
                        if($getBookCondition=='Unavailable'||$getBookCondition=='Sanitizing'){
                            echo "<script>alert('Error!! Book Currently Unvailable!!')</script>";
                        }else if($borrowedbook<2){
                            if($getBookBorrowed==null){  
                            $borrow = mysqli_query($con, "UPDATE book SET Borrower = '$current_user' ,Book_Condition='Unavailable' ,Times_Borrowed = '1' WHERE Book_ID = '$bookid'");
                            echo "<script> location.href='userprofile.php'; </script>";
                        }else{
                            $borrow = mysqli_query($con, "UPDATE book SET Borrower = '$current_user' ,Book_Condition='Unavailable' ,Times_Borrowed = Times_Borrowed+1 WHERE Book_ID = '$bookid'");
                            echo "<script> location.href='userprofile.php'; </script>";
                        }
                        }else{
                            echo "<script>alert('You Have Borrowed 2 Books! You Have To Return One Of Them To Borrow Another Book.')</script>";
                            echo "<script> location.href='userprofile.php'; </script>";
                        }
                        }
                        
                ?>
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
