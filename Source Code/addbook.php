<!DOCTYPE html>
<html lang="en">
<?php
            session_start();
            $current_user=$_SESSION['current_id'];
?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - Add Book</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script>
                if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                }
        </script>
        <style></style>
    </head>
    <body>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Book</h3>
                                </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookID" name="BookID" placeholder="Book ID" required />
                                                <label for="inputBookID">Book ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookName" name="BookName" placeholder="Book Name" required />
                                                <label for="inputBookName">Book Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookAuthor" name="BookAuthor" placeholder="Book Author" />
                                                <label for="inputBookAuthor">Book Author</label>
                                            </div>
                                            <select class="form-select" name="BookCategory" required>
                                                <option selected>-Select Category-</option>
                                                <option>Fiction</option>
                                                <option>Non-Fiction</option>
                                            </select>
                                            <br>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookCondition" name="BookCondition" placeholder="Book Condition" required />
                                                <label for="inputBookCondition">Book Condition</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookDescription" name="BookDescription" placeholder="Book Description" />
                                                <label for="inputBookDescription">Book Description</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="BookLanguage" name="BookLanguage" placeholder="Book Language" required />
                                                <label for="inputBookLanguage">Book Language</label>
                                            </div>
                                            <div class="text-center">
                                                <input class="btn btn-success" name="addNOW" type="submit" value="Add into Database"></input>
                                            </div>
                                        </form>
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
            if(isset($_POST['addNOW'])){
                $newid=$_POST['BookID'];
                $newname=$_POST['BookName'];
                $checkedname=str_replace("'","''",$newname);
                $newauthor=$_POST['BookAuthor'];
                $newcategory=$_POST['BookCategory'];
                $newcondition=$_POST['BookCondition'];
                $newdescription=$_POST['BookDescription'];
                $newlanguage=$_POST['BookLanguage'];
                $newtime=mysqli_query($con, "SELECT NOW()");
                $getdate=mysqli_fetch_array($newtime);
                $newdate=$getdate['NOW()'];
                if($current_user=='999'){
                    $checkid = mysqli_query($con, "SELECT * FROM book WHERE Book_ID = $newid");
                    if(mysqli_fetch_assoc($checkid) == null){
                        $addbook = mysqli_query($con, "INSERT INTO `book`(`Book_ID`, `Book_Name`, `Book_Author`, `Book_Category`, `Book_Condition`, `Book_Description`, `Book_Language`, `Times_Arrived`) VALUES ('$newid','$checkedname','$newauthor','$newcategory','$newcondition','$newdescription','$newlanguage','$newdate')");
                        echo "<script>alert('Add Book Successful!')</script>";
                        echo "<script> location.href='booklist.php'; </script>";
                    }else{
                        echo "<script>alert('Book ID existed')</script>";
                        echo "<script> location.href='addbook.php'; </script>";
                    }
                    
            }else{
                echo "<script>alert('This page is NOT FOR YOU!')</script>";
                echo "<script> location.href='index.php'; </script>";
            }
                
                

                
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
