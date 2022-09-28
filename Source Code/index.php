<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Library With Multilingual Chatbot</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger
        intent="WELCOME"
        chat-title="Library Bot"
        agent-id="c422364f-21c3-4ddf-9fb1-d0d826142b57"
        language-code="en"
        ></df-messenger>
    </head>
    <body class="sb-nav-fixed shadow p-3 mb-5 bg-white rounded" style="background:url('https://www.citeonline.com/wp-content/uploads/2019/09/iStock-969066628.jpg'); background-size:100% 100%; background: opacity 20%;">
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
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Welcome to Woon Library. Come and Explore Your The Book Inside Here!</h4>
                        <div id="woon" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#woon" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#woon" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#woon" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img height="150px" class="d-block w-100" src="https://img.jakpost.net/c/2019/03/02/2019_03_02_66706_1551461528._large.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img height="150px" class="d-block w-100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Open_book_nae_02.svg/2560px-Open_book_nae_02.svg.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img height="150px" class="d-block w-100" src="https://furstorii.windmiles.com.my/wp-content/uploads/2016/03/book-4.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#woon" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#woon" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                            <div class="row">
                            <div class="col-xl-3 col-md-6" >
                                    <div class="card bg-danger text-white mb-4 card text-center">
                                        <div class="card-body" role="button" onClick="window.location='booklist.php'">Book List</div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4 card text-center">
                                        <div class="card-body" role="button" onClick="window.location='trendingbook.php'">Trending Books</div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4 card text-center">
                                        <div class="card-body" role="button" onClick="window.location='newbook.php'">New Book Arrived</div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4 card text-center">
                                        <div class="card-body" role="button" onClick="window.location='seatreserve.php'">Reserve Seat</div>
                                    </div>
                                </div>
                                <table class="table table-bordered text-center shadow p-3 mb-5 bg-white rounded align-bottom table-hover" style="width: 1600px">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3" class="bg-secondary text-white">Annoucement</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="width: 15%">#</th>
                                            <th scope="col" style="width: 55%">Title</th>
                                            <th scope="col" style="width: 30%">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td role="button" onClick="window.location='example.php'">3/2/2022 Maintenance</td>
                                        <td>27/1/2022</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>20/1/2022 Maintenance</td>
                                        <td>13/1/2022</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>10/1/2022 Maintenance</td>
                                        <td>3/1/2022</td>
                                        </tr>
                                    </tbody>
                                    </table>

                                    <table class="table table-bordered text-center shadow p-3 mb-5 bg-white rounded align-bottom table-hover" style="width: 1600px">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3" class="bg-secondary text-white">Recommended Articles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td role="button" onclick="window.location='https:www.healthline.com/health/benefits-of-reading-books#what-to-read'">Benefits of Reading Books: How It Can Positively Affect Your Life by Rebecca Joy Stanborough</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td role="button" onClick="window.location='https:www.understood.org/articles/en/6-essential-skills-needed-for-reading-comprehension'">6 essential skills for reading comprehension by Andrew M.I. Lee, JD</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td role="button" onClick="window.location='https:www.indeed.com/career-advice/career-development/how-to-improve-reading-skills'">How to Improve Your Reading Skills by Indeed Editorial Team</td>
                                        </tr>
                                    </tbody>
                                    </table>
                        </div>
                        </div>
                        </div>
                    </div>
                </main>
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
